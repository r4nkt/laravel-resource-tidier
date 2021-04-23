<?php

namespace R4nkt\ResourceTidier\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \R4nkt\ResourceTidier\ResourceTidier
 */
class ResourceTidier extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'resource-tidier';
    }
}
