<?php

namespace R4nkt\ResourceTidier\Support\Factories;

use R4nkt\ResourceTidier\Concerns\UsesResourceTidierConfig;
use R4nkt\ResourceTidier\Contracts\TidiesResources;
use R4nkt\ResourceTidier\Exceptions\InvalidConfiguration;
use R4nkt\ResourceTidier\Tidier;

class TidierFactory
{
    use UsesResourceTidierConfig;

    public static function make(string $name): TidiesResources
    {
        if (! $config = self::tidier($name)) {
            InvalidConfiguration::missingTidier($name);
        }

        // Use app service container to allow for mocking...
        /** @todo Is there a better way...? */
        return app(Tidier::class)
            ->setParams($config);
    }
}
