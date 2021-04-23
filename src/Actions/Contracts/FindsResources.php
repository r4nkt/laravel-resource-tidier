<?php

namespace R4nkt\ResourceTidier\Actions\Contracts;

use Illuminate\Support\Enumerable;

interface FindsResources
{
    public function setParams(array $params = []): mixed;

    public function find(): Enumerable;
}
