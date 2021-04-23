<?php

namespace R4nkt\ResourceTidier\Actions\Contracts;

interface CullsResources
{
    public function setParams(array $params = []): mixed;

    public function cull(): int;
}
