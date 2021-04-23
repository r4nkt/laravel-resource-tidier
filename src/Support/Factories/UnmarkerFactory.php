<?php

namespace R4nkt\ResourceTidier\Support\Factories;

use R4nkt\ResourceTidier\Actions\Contracts\UnmarksResource;
use R4nkt\ResourceTidier\Concerns\UsesResourceTidierConfig;
use R4nkt\ResourceTidier\Exceptions\InvalidConfiguration;

class UnmarkerFactory
{
    use UsesResourceTidierConfig;

    public static function make(string $name): UnmarksResource
    {
        if (! $config = self::unmarker($name)) {
            InvalidConfiguration::missingUnmarker($name);
        }

        $class = $config['class'];

        return (new $class)
            ->setParams($config['params'] ?? []);
    }
}
