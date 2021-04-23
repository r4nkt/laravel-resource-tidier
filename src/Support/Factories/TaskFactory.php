<?php

namespace R4nkt\ResourceTidier\Support\Factories;

use R4nkt\ResourceTidier\Actions\Contracts\ExecutesResourceTask;
use R4nkt\ResourceTidier\Concerns\UsesResourceTidierConfig;
use R4nkt\ResourceTidier\Exceptions\InvalidConfiguration;

class TaskFactory
{
    use UsesResourceTidierConfig;

    public static function make(string $name): ExecutesResourceTask
    {
        if (! $config = self::task($name)) {
            InvalidConfiguration::missingTask($name);
        }

        $class = $config['class'];

        return (new $class)
            ->setParams($config['params'] ?? []);
    }
}
