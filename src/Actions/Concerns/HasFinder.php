<?php

namespace R4nkt\ResourceTidier\Actions\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\FindsResources;
use R4nkt\ResourceTidier\Support\Factories\FinderFactory;

trait HasFinder
{
    protected FindsResources $finder;

    public function finder(): FindsResources
    {
        if (! $this->finder) {
            $this->finder = FinderFactory::make($this->requiredParam('finder'));
        }

        return $this->finder;
    }
}
