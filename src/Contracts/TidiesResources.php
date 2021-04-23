<?php

namespace R4nkt\ResourceTidier\Contracts;

interface TidiesResources
{
    public function setParams(array $params = []): mixed;

    public function cull(): int;

    public function handle(): int;
}
