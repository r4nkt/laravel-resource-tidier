<?php

namespace R4nkt\ResourceTidier\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\UnmarksResource;
use R4nkt\ResourceTidier\Support\Factories\UnmarkerFactory;

trait HasUnmarker
{
    protected ?UnmarksResource $unmarker = null;

    public function unmarker(): UnmarksResource
    {
        if (! $this->unmarker) {
            $this->unmarker = UnmarkerFactory::make($this->requiredParam('unmarker'));
        }

        return $this->unmarker;
    }
}
