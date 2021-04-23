<?php

namespace R4nkt\ResourceTidier\Actions\Contracts;

interface UnmarksResource
{
    public function setParams(array $params = []): mixed;

    public function unmark(mixed $resource): void;
}
