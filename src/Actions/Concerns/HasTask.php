<?php

namespace R4nkt\ResourceTidier\Actions\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\ExecutesResourceTask;
use R4nkt\ResourceTidier\Support\Factories\TaskFactory;

trait HasTask
{
    protected function task(): ExecutesResourceTask
    {
        return TaskFactory::make($this->requiredParam('task'));
    }
}
