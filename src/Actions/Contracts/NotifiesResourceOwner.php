<?php

namespace R4nkt\ResourceTidier\Actions\Contracts;

interface NotifiesResourceOwner
{
    public function setParams(array $params = []): mixed;

    public function notify(mixed $resource): void;
}
