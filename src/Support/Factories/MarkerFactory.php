<?php

namespace R4nkt\ResourceTidier\Support\Factories;

use R4nkt\ResourceTidier\Actions\Contracts\MarksResource;
use R4nkt\ResourceTidier\Concerns\UsesResourceTidierConfig;
use R4nkt\ResourceTidier\Exceptions\InvalidConfiguration;

class MarkerFactory
{
    use UsesResourceTidierConfig;

    public static function make(string $name): MarksResource
    {
        if (! $config = self::marker($name)) {
            InvalidConfiguration::missingMarker($name);
        }

        $class = $config['class'];

        return (new $class)
            ->setParams($config['params'] ?? []);
    }
}
