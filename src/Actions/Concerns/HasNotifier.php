<?php

namespace R4nkt\ResourceTidier\Actions\Concerns;

use R4nkt\ResourceTidier\Actions\Contracts\NotifiesResourceOwner;
use R4nkt\ResourceTidier\Support\Factories\NotifierFactory;

trait HasNotifier
{
    protected function notifier(): NotifiesResourceOwner
    {
        return NotifierFactory::make($this->requiredParam('notifier'));
    }
}
