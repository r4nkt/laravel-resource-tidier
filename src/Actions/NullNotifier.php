<?php

namespace R4nkt\ResourceTidier\Actions;

use R4nkt\ResourceTidier\Concerns\HasParams;
use R4nkt\ResourceTidier\Actions\Contracts\NotifiesResourceOwner;

class NullNotifier implements NotifiesResourceOwner
{
    use HasParams;

    public function notify(mixed $resource): void
    {
        return;
    }
}
