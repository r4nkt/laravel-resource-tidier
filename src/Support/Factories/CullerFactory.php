<?php

namespace R4nkt\ResourceTidier\Support\Factories;

use R4nkt\ResourceTidier\Actions\Contracts\CullsResources;
use R4nkt\ResourceTidier\Actions\CullResources;
use R4nkt\ResourceTidier\Concerns\UsesResourceTidierConfig;
use R4nkt\ResourceTidier\Exceptions\InvalidConfiguration;

class CullerFactory
{
    use UsesResourceTidierConfig;

    public static function make(string $name): CullsResources
    {
        if (! $config = self::culler($name)) {
            InvalidConfiguration::missingCuller($name);
        }

        $class = $config['class'] ?? CullResources::class;

        return (new $class)
            ->setParams($config['params'] ?? []);
    }
}
