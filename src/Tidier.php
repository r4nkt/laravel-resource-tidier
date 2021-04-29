<?php

namespace R4nkt\ResourceTidier;

use R4nkt\ResourceTidier\Concerns\HasCuller;
use R4nkt\ResourceTidier\Concerns\HasHandler;
use R4nkt\ResourceTidier\Concerns\HasParams;
use R4nkt\ResourceTidier\Concerns\HasUnmarker;
use R4nkt\ResourceTidier\Contracts\TidiesResources;

class Tidier implements TidiesResources
{
    use HasParams;
    use HasCuller;
    use HasUnmarker;
    use HasHandler;

    public function cull(): int
    {
        return $this->culler()->cull();
    }

    public function unmark(mixed $resource): void
    {
        $this->unmarker()->unmark();
    }

    public function handle(): int
    {
        return $this->handler()->execute();
    }
}
