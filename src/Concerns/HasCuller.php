<?php

namespace R4nkt\ResourceTidier\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\CullsResources;
use R4nkt\ResourceTidier\Support\Factories\CullerFactory;

trait HasCuller
{
    protected CullsResources $culler;

    public function culler(): CullsResources
    {
        if (! $this->culler) {
            $this->culler = CullerFactory::make($this->requiredParam('culler'));
        }

        return $this->culler;
    }
}
