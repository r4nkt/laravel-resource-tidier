<?php

namespace R4nkt\ResourceTidier\Actions;

use R4nkt\ResourceTidier\Actions\Contracts\CullsResources;
use R4nkt\ResourceTidier\Concerns\HasParams;

class CullResources implements CullsResources
{
    use Concerns\HasFinder;
    use Concerns\HasMarker;
    use Concerns\HasNotifier;
    use HasParams;

    public function cull(): int
    {
        $culled = 0;

        $marker = $this->marker();
        $notifier = $this->notifier();

        $this->finder()
            ->find()
            ->each(function ($resource) use (&$culled, $marker, $notifier) {
                $marker->mark($resource);

                $notifier->notify($resource);

                $culled++;
            });

        return $culled;
    }
}
