<?php

namespace R4nkt\ResourceTidier;

use R4nkt\ResourceTidier\Support\Factories\TidierFactory;

class ResourceTidier
{
    public function tidier(string $name)
    {
        return TidierFactory::make($name);
    }
}
