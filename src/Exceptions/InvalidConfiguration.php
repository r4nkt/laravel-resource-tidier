<?php

namespace R4nkt\ResourceTidier\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{
    public static function missingTidier(string $name)
    {
        throw new self("Tidier with name, {$name}, was not found.");
    }

    public static function missingCuller(string $name)
    {
        throw new self("Culler with name, {$name}, was not found.");
    }

    public static function missingHandler(string $name)
    {
        throw new self("Handler with name, {$name}, was not found.");
    }

    public static function missingFinder(string $name)
    {
        throw new self("Finder with name, {$name}, was not found.");
    }

    public static function missingMarker(string $name)
    {
        throw new self("Marker with name, {$name}, was not found.");
    }

    public static function missingNotifier(string $name)
    {
        throw new self("Notifier with name, {$name}, was not found.");
    }

    public static function missingTask(string $name)
    {
        throw new self("Task with name, {$name}, was not found.");
    }

    public static function missingRequiredParam(string $key)
    {
        throw new self("Required parameter with key, {$key}, was not found.");
    }

    public static function missingUnmarker(string $name)
    {
        throw new self("Unmarker with name, {$name}, was not found.");
    }
}
