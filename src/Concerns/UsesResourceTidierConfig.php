<?php

namespace R4nkt\ResourceTidier\Concerns;

trait UsesResourceTidierConfig
{
    public static function culler(string $name): ?array
    {
        return self::typeConfig('cullers', $name);
    }

    public static function finder(string $name): ?array
    {
        return self::typeConfig('finders', $name);
    }

    public static function handler(string $name): ?array
    {
        return self::typeConfig('handlers', $name);
    }

    public static function marker(string $name): ?array
    {
        return self::typeConfig('markers', $name);
    }

    public static function notifier(string $name): ?array
    {
        return self::typeConfig('notifiers', $name);
    }

    public static function task(string $name): ?array
    {
        return self::typeConfig('tasks', $name);
    }

    public static function tidier(string $name): ?array
    {
        return self::typeConfig('tidiers', $name);
    }

    public static function unmarker(string $name): ?array
    {
        return self::typeConfig('unmarkers', $name);
    }

    protected static function typeConfig(string $type, string $name): ?array
    {
        return config("resource-tidier.{$type}.{$name}");
    }
}
