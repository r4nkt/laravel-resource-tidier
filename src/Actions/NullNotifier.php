<?php

namespace R4nkt\ResourceTidier\Actions;

use R4nkt\ResourceTidier\Actions\Contracts\NotifiesResourceOwner;
use R4nkt\ResourceTidier\Concerns\HasParams;

class NullNotifier implements NotifiesResourceOwner
{
    use HasParams;

    public function notify(mixed $resource): void
    {
        return;
    }
}
