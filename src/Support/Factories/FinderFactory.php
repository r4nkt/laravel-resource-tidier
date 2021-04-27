<?php

namespace R4nkt\ResourceTidier\Support\Factories;

use R4nkt\ResourceTidier\Actions\Contracts\FindsResources;
use R4nkt\ResourceTidier\Concerns\UsesResourceTidierConfig;
use R4nkt\ResourceTidier\Exceptions\InvalidConfiguration;

class FinderFactory
{
    use UsesResourceTidierConfig;

    public static function make(string $name): FindsResources
    {
        if (! $config = self::finder($name)) {
            InvalidConfiguration::missingFinder($name);
        }

        $class = $config['class'];

        if (! class_exists($class)) {
            InvalidConfiguration::nonexistentClass($class);
        }

        return (new $class)
            ->setParams($config['params'] ?? []);
    }
}
