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
