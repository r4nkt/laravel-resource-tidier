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
     * Parameters:
     *  - culler: finds specific resources and marks them for tidying up at
     *    some later point in time. Also notifies the resource owners.
     *  - handler: finds resources marked for tidying and carries out the
     *    specified tidying task on them.
     */
    'tidiers' => [
        'null-resource-tidier' => [
            'culler' => 'null-resource-culler',
            'handler' => 'null-resource-handler',
        ],
    ],

    /**
     * Cullers find specific resources, mark them, and notify their owners of
     * some impending handler(s).
     *
     * Required:
     *  - class
     *  - params:
     *     - finder
     *     - marker
     *     - notifier
     *     - unmarker
     */
    'cullers' => [
        'null-resource-culler' => [
            'class' => CullResources::class,
            'params' => [
                'finder' => 'null-resource-finder',
                'marker' => 'null-resource-marker',
                'notifier' => 'null-resource-notifier',
                'unmarker' => 'null-resource-unmarker',
            ],
        ],
    ],

    /**
     * Handlers, when executed, find resources having certain attributes and
     * then perform some sort of task on/with them.
     *
     * Required:
     *  - class
     *  - params:
     *     - finder
     *     - task
     */
    'handlers' => [
        'null-resource-handler' => [
            'class' => HandleResources::class,
            'params' => [
                'finder' => 'null-resource-finder',
                'task' => 'null-resource-task',
            ],
        ],
    ],

    'finders' => [
        'null-resource-finder' => [
            'class' => NullFinder::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

    'markers' => [
        'null-resource-marker' => [
            'class' => NullMarker::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

    'notifiers' => [
        'null-resource-notifier' => [
            'class' => NullNotifier::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

    'tasks' => [
        'null-resource-task' => [
            'class' => NullTask::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

    'unmarkers' => [
        'null-resource-unmarker' => [
            'class' => NullUnmarker::class,
            'params' => [
                'foo' => 'bar',
            ],
        ],
    ],

];
