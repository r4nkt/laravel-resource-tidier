<?php

namespace R4nkt\ResourceTidier\Actions\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\NotifiesResourceOwner;
use R4nkt\ResourceTidier\Support\Factories\NotifierFactory;

trait HasNotifier
{
    protected NotifiesResourceOwner $notifier;

    public function notifier(): NotifiesResourceOwner
    {
        if (! $this->notifier) {
            $this->notifier = NotifierFactory::make($this->requiredParam('notifier'));
        }

        return $this->notifier;
    }
}
