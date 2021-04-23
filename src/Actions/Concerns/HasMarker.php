<?php

namespace R4nkt\ResourceTidier\Actions\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\MarksResource;
use R4nkt\ResourceTidier\Support\Factories\MarkerFactory;

trait HasMarker
{
    protected function marker(): MarksResource
    {
        return MarkerFactory::make($this->requiredParam('marker'));
    }
}
