<?php

namespace R4nkt\ResourceTidier\Actions;

use Illuminate\Support\Enumerable;
use Illuminate\Support\LazyCollection;
use R4nkt\ResourceTidier\Actions\Contracts\FindsResources;
use R4nkt\ResourceTidier\Concerns\HasParams;

class NullFinder implements FindsResources
{
    use HasParams;

    public function find(): Enumerable
    {
        return LazyCollection::empty();
    }
}
