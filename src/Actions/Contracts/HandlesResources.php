<?php

namespace R4nkt\ResourceTidier\Actions\Contracts;

interface HandlesResources
{
    public function setParams(array $params = []): mixed;

    public function execute(): int;
}
