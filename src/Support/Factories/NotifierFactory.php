<?php

namespace R4nkt\ResourceTidier\Support\Factories;

use R4nkt\ResourceTidier\Actions\Contracts\NotifiesResourceOwner;
use R4nkt\ResourceTidier\Concerns\UsesResourceTidierConfig;
use R4nkt\ResourceTidier\Exceptions\InvalidConfiguration;

class NotifierFactory
{
    use UsesResourceTidierConfig;

    public static function make(string $name): NotifiesResourceOwner
    {
        if (! $config = self::notifier($name)) {
            InvalidConfiguration::missingNotifier($name);
        }

        $class = $config['class'];

        if (! class_exists($class)) {
            InvalidConfiguration::nonexistentClass($class);
        }

        return (new $class)
            ->setParams($config['params'] ?? []);
    }
}
