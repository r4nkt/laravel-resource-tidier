<?php

namespace R4nkt\ResourceTidier\Actions\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\FindsResources;
use R4nkt\ResourceTidier\Support\Factories\FinderFactory;

trait HasFinder
{
    protected function finder(): FindsResources
    {
        return FinderFactory::make($this->requiredParam('finder'));
    }
}
