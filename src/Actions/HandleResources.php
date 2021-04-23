<?php

namespace R4nkt\ResourceTidier\Actions;

use R4nkt\ResourceTidier\Actions\Contracts\HandlesResources;
use R4nkt\ResourceTidier\Concerns\HasParams;

class HandleResources implements HandlesResources
{
    use Concerns\HasTask;
    use Concerns\HasFinder;
    use HasParams;

    public function execute(): int
    {
        $handled = 0;

        $task = $this->task();

        $this->finder()
            ->find()
            ->each(function ($resource) use (&$handled, $task) {
                if (! $task->execute($resource)) {
                    return;
                }

                $handled++;
            });

        return $handled;
    }
}
