<?php

namespace R4nkt\ResourceTidier;

use R4nkt\ResourceTidier\Actions\Concerns\HasCuller;
use R4nkt\ResourceTidier\Actions\Concerns\HasHandler;
use R4nkt\ResourceTidier\Concerns\HasParams;
use R4nkt\ResourceTidier\Contracts\TidiesResources;

class Tidier implements TidiesResources
{
    use HasParams;
    use HasCuller;
    use HasHandler;

    public function cull(): int
    {
        return $this->culler()->cull();
    }

    public function handle(): int
    {
        return $this->handler()->execute();
    }
}
