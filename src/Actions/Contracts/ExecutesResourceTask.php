<?php

namespace R4nkt\ResourceTidier\Actions\Contracts;

interface ExecutesResourceTask
{
    public function setParams(array $params = []): mixed;

    public function execute(mixed $resource): bool;
}
