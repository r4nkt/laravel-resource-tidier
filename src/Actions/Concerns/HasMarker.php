<?php

namespace R4nkt\ResourceTidier\Actions\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\MarksResource;
use R4nkt\ResourceTidier\Support\Factories\MarkerFactory;

trait HasMarker
{
    protected ?MarksResource $marker = null;

    public function marker(): MarksResource
    {
        if (! $this->marker) {
            $this->marker = MarkerFactory::make($this->requiredParam('marker'));
        }

        return $this->marker;
    }
}
