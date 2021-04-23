<?php

namespace R4nkt\ResourceTidier\Tests\Commands;

use R4nkt\ResourceTidier\Commands\Tidy;
use R4nkt\ResourceTidier\Tests\TestCase;
use R4nkt\ResourceTidier\Tidier;

class TidyTest extends TestCase
{
    /** @test */
    public function it_tidies_nothing()
    {
        $this->mock(Tidier::class)
            ->shouldReceive('setParams')
            ->andReturnSelf()
            ->shouldReceive('cull')
            ->once()
            ->andReturn(0)
            ->shouldReceive('handle')
            ->once()
            ->andReturn(0);

        $this->artisan(Tidy::class, ['tidier' => 'null-resource-tidier']);
    }
}
