# R4nkt's Laravel Resource Tidier

[![Latest Version on Packagist](https://img.shields.io/packagist/v/r4nkt/laravel-resource-tidier.svg?style=flat-square)](https://packagist.org/packages/r4nkt/laravel-resource-tidier)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/r4nkt/laravel-resource-tidier/run-tests?label=tests)](https://github.com/r4nkt/laravel-resource-tidier/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/r4nkt/laravel-resource-tidier/Check%20&%20fix%20styling?label=code%20style)](https://github.com/r4nkt/laravel-resource-tidier/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/r4nkt/laravel-resource-tidier.svg?style=flat-square)](https://packagist.org/packages/r4nkt/laravel-resource-tidier)

A simple-but-opinionated set of classes that allows for configurable tidying of various user resources. It allows you to configure "tidiers", which find resources that need to be tidied up, culling them, notifying resource owners, and eventually performing the tidying-up task. It also allows for "unmarking" resources if/when the circumstances demand it.

This package was developed to scratch an itch, but it was also inspired by [Freek](https://twitter.com/freekmurze) and his [blog post](https://freek.dev/1940-why-and-how-you-should-remove-inactive-users-and-teams) about removing inactive users and teams.

It should also be noted that it's the foundation for another [r4nkt](https://twitter.com/r4nkt) [package](https://github.com/r4nkt/laravel-saasparilla), which may be useful in your own projects or as an example on how to use `laravel-resource-tidier`.

Finally, it's important to point out that this package benefitted from [Spatie's](https://spatie.be) [Laravel package skeleton package](https://github.com/spatie/package-skeleton-laravel).

## Installation

You can install the package via composer:

```bash
composer require r4nkt/laravel-resource-tidier
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="R4nkt\ResourceTidier\ResourceTidierServiceProvider" --tag="laravel-resource-tidier-config"
```

This is the contents of the published config file:

```php
<?php

use R4nkt\ResourceTidier\Actions\CullResources;
use R4nkt\ResourceTidier\Actions\HandleResources;
use R4nkt\ResourceTidier\Actions\NullFinder;
use R4nkt\ResourceTidier\Actions\NullMarker;
use R4nkt\ResourceTidier\Actions\NullNotifier;
use R4nkt\ResourceTidier\Actions\NullTask;
use R4nkt\ResourceTidier\Actions\NullUnmarker;

return [

    /**
     * Tidiers: A tidier is a simple class that tidies a given resource in two
     * steps:
     *  - First, it culls resources by finding those that match specific
     *    criteria, marking them, and notifying the resource owner of some
     *    impending action(s).
     *  - Second, it performs whatever tidying handler has been defined on the
     *    marked resources.
     *
     * Required parameters:
     *  - culler
     *  - handler
     */
    'tidiers' => [
        'null-resource-tidier' => [
            'culler' => 'null-resource-culler',
            'unmarker' => 'null-resource-unmarker',
            'handler' => 'null-resource-handler',
        ],
    ],

    /**
     * Cullers find specific resources, mark them, and notify their owners of
     * some impending handler(s).
     *
     * Required parameters:
     *  - class
     *  - params:
     *     - finder
     *     - marker
     *     - notifier
     *     - unmarker
     */
    'cullers' => [
        'null-resource-culler' => [
            'class' => CullResources::class, /** @todo Make optional...? */
            'params' => [
                'finder' => 'null-resource-finder',
                'marker' => 'null-resource-marker',
                'notifier' => 'null-resource-notifier',
            ],
        ],
    ],

    /**
     * Handlers, when executed, find resources having certain attributes and
     * then perform some sort of task on/with them.
     *
     * Required parameters:
     *  - class
     *  - params:
     *     - finder
     *     - task
     */
    'handlers' => [
        'null-resource-handler' => [
            'class' => HandleResources::class, /** @todo Make optional...? */
            'params' => [
                'finder' => 'null-resource-finder',
                'task' => 'null-resource-task',
            ],
        ],
    ],

    /**
     * Finders find resources that meet certain criteria, either for culling or
     * for handling.
     *
     * Required parameters:
     *  - class
     *
     * Optional parameters:
     *  - params
     *     - <custom param 1>
     *     - <custom param 2>
     *     - <custom param ...>
     *     - <custom param n>
     */
    'finders' => [
        'null-resource-finder' => [
            'class' => NullFinder::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

    /**
     * Markers mark a given resource as having been culled. The idea is that
     * enough information is stored to allow the handler's finder to
     * successfully find any marked resources.
     *
     * Required parameters:
     *  - class
     *
     * Optional parameters:
     *  - params
     *     - <custom param 1>
     *     - <custom param 2>
     *     - <custom param ...>
     *     - <custom param n>
     */
    'markers' => [
        'null-resource-marker' => [
            'class' => NullMarker::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

    /**
     * Notifiers are used to notify a resource owner that the resource has been
     * culled and that some action will take place.
     *
     * Required parameters:
     *  - class
     *
     * Optional parameters:
     *  - params
     *     - <custom param 1>
     *     - <custom param 2>
     *     - <custom param ...>
     *     - <custom param n>
     */
    'notifiers' => [
        'null-resource-notifier' => [
            'class' => NullNotifier::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

    /**
     * Tasks are executed for each culled resource during the handling stage of
     * the tidying process.
     *
     * Required parameters:
     *  - class
     *
     * Optional parameters:
     *  - params
     *     - <custom param 1>
     *     - <custom param 2>
     *     - <custom param ...>
     *     - <custom param n>
     */
    'tasks' => [
        'null-resource-task' => [
            'class' => NullTask::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

    /**
     * Unmarkers are meant to undo whatever the related marker has done,
     * effectively removing a given resource from the group of culled
     * resources.
     *
     * Required parameters:
     *  - class
     *
     * Optional parameters:
     *  - params
     *     - <custom param 1>
     *     - <custom param 2>
     *     - <custom param ...>
     *     - <custom param n>
     */
    'unmarkers' => [
        'null-resource-unmarker' => [
            'class' => NullUnmarker::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

];
```

## Usage

To get a registered tidier, you can simply use the tidier factory like so:

```php
use R4nkt\ResourceTidier\Support\Factories\TidierFactory;

$tidier = TidierFactory::make('my-resource-tidier');
```

You can then cull the tidier-specific resources by calling `cull()`:

```php
$tidier->cull();
```

You can also tidy up the culled resources by calling `handle()`:

```php
$tidier->handle();
```

Finally, you can unmark a culled resource by calling `unmark()` and passing in the individual resource:

```php
$tidier->unmark($culledResource);
```

## What does it do?

The tidier is a simple class that provides a way to tidy up resources:
* First, it culls any resources that meet specific requirements. Each culled resource is marked for tidying up and the resource owner is notified.
* Second, it allows individual resources that have been culled to be unmarked.
* Finally, it performs the actual tidying up.

An example tidier might be for registered users that have not verified their email addresses. Culling will identify these users and mark them for deletion. Notifications will be sent to the resource owners, which are the users themselves, to let them know that their accounts will be deleted because the emails associated with their accounts haven't been verified. If they happen to verify their email addresses before being deleted, then they will be "unmarked". If nothing is done in time, however, then the unverified user accounts will be deleted.

### Tidiers

Tidiers can be registered by name in the configuration file and must identify three items:
* `culler`
* `unmarker`
* `handler`

### Cullers

A culler's job is to find resources that meet some criteria, mark them as culled, and notify the individual resource owners.

Cullers can be registered by name in the configuration file and must identifiy three parameters:
* `finder`
* `marker`
* `notifier`

Optionally, a `class` that implements `R4nkt\ResourceTidier\Actions\Contracts\CullsResources` can be provided.

### Unmarkers

An unmarker's job is to unmark an individual resource that has been previously marked.

Unmarkers can be registered by name in the configuration file and must identifiy a `class` that implements `R4nkt\ResourceTidier\Actions\Contracts\UnmarksResource`.

Optionally, any `params` that the unmarkers require can be provided.

### Handlers

A handler's job is to handle the tidying up of any culled resources.

Handlers can be registered by name in the configuration file and must identifiy the following parameters:
* `finder`
* `task`

Optionally, a `class` that implements `R4nkt\ResourceTidier\Actions\Contracts\HandlesResources` can be provided.

### Finders

A finder's job is to find resources. They are used by cullers and handlers, but they perform the same general function. For cullers, they are to find resources that should be culled. For handlers, they are to find culled resources that should be tidied up.

Finders can be registered by name in the configuration file and must identifiy a `class` that implements `R4nkt\ResourceTidier\Actions\Contracts\FindsResources`.

Optionally, any `params` that the finders require can be provided.

### Markers

A marker's job is to mark individual resources as having been culled.

Markers can be registered by name in the configuration file and must identifiy a `class` that implements `R4nkt\ResourceTidier\Actions\Contracts\MarksResources`.

Optionally, any `params` that the markers require can be provided.

### Notifiers

A notifier's job is to notify individual resource owners that their resources have been culled and some sort of impending action is likely to take place.

Notifiers can be registered by name in the configuration file and must identifiy a `class` that implements `R4nkt\ResourceTidier\Actions\Contracts\NotifiesResourceOwner`.

Optionally, any `params` that the notifiers require can be provided.

### Tasks

A task's job is to tidy up an individual resource.

Tasks can be registered by name in the configuration file and must identifiy a `class` that implements `R4nkt\ResourceTidier\Actions\Contracts\ExecutesResourceTask`.

Optionally, any `params` that the notifiers require can be provided.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Travis Elkins](https://github.com/telkins)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
