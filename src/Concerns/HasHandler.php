<?php

namespace R4nkt\ResourceTidier\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\HandlesResources;
use R4nkt\ResourceTidier\Support\Factories\HandlerFactory;

trait HasHandler
{
    protected HandlesResources $handler;

    public function handler(): HandlesResources
    {
        if (! $this->handler) {
            $this->handler = HandlerFactory::make($this->requiredParam('handler'));
        }

        return $this->handler;
    }
}
