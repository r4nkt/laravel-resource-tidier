<?php

namespace R4nkt\ResourceTidier\Actions\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\HandlesResources;
use R4nkt\ResourceTidier\Support\Factories\HandlerFactory;

trait HasHandler
{
    protected function handler(): HandlesResources
    {
        return HandlerFactory::make($this->requiredParam('handler'));
    }
}
