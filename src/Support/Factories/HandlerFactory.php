<?php

namespace R4nkt\ResourceTidier\Support\Factories;

use R4nkt\ResourceTidier\Actions\Contracts\HandlesResources;
use R4nkt\ResourceTidier\Actions\HandleResources;
use R4nkt\ResourceTidier\Concerns\UsesResourceTidierConfig;
use R4nkt\ResourceTidier\Exceptions\InvalidConfiguration;

class HandlerFactory
{
    use UsesResourceTidierConfig;

    public static function make(string $name): HandlesResources
    {
        if (! $config = self::handler($name)) {
            InvalidConfiguration::missingHandler($name);
        }

        $class = $config['class'] ?? HandleResources::class;

        return (new $class)
            ->setParams($config['params'] ?? []);
    }
}
