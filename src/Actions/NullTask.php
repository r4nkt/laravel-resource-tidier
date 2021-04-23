<?php

namespace R4nkt\ResourceTidier\Actions;

use R4nkt\ResourceTidier\Actions\Contracts\ExecutesResourceTask;
use R4nkt\ResourceTidier\Concerns\HasParams;

class NullTask implements ExecutesResourceTask
{
    use HasParams;

    public function execute(mixed $resource): bool
    {
        return false;
    }
}
