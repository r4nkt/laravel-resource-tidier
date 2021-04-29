<?php

namespace R4nkt\ResourceTidier\Actions\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\ExecutesResourceTask;
use R4nkt\ResourceTidier\Support\Factories\TaskFactory;

trait HasTask
{
    protected ?ExecutesResourceTask $task = null;

    public function task(): ExecutesResourceTask
    {
        if (! $this->task) {
            $this->task = TaskFactory::make($this->requiredParam('task'));
        }

        return $this->task;
    }
}
