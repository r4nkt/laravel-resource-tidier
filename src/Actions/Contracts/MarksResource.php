<?php

namespace R4nkt\ResourceTidier\Actions\Contracts;

interface MarksResource
{
    public function setParams(array $params = []): mixed;

    public function mark(mixed $resource): void;
}
