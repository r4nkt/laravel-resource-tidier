<?php

namespace R4nkt\ResourceTidier\Actions;

use R4nkt\ResourceTidier\Actions\Contracts\UnmarksResource;
use R4nkt\ResourceTidier\Concerns\HasParams;

class NullUnmarker implements UnmarksResource
{
    use HasParams;

    public function unmark(mixed $resource): void
    {
        return;
    }
}
