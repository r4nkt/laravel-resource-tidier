<?php

namespace R4nkt\ResourceTidier\Actions;

use R4nkt\ResourceTidier\Actions\Contracts\MarksResource;
use R4nkt\ResourceTidier\Concerns\HasParams;

class NullMarker implements MarksResource
{
    use HasParams;

    public function mark(mixed $resource): void
    {
        return;
    }
}
