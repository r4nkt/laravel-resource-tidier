<?php

namespace R4nkt\ResourceTidier\Tests;

use R4nkt\ResourceTidier\Support\Factories\TidierFactory;
use R4nkt\ResourceTidier\Tidier;

class TidierTest extends TestCase
{
    public Tidier $tidier;

    public function setUp(): void
    {
        parent::setUp();

        $this->tidier = TidierFactory::make('null-resource-tidier');
    }

    /** @test */
    public function it_can_access_all_action_oriented_objects()
    {
        $this->assertNotNull($this->tidier->culler());
        $this->assertNotNull($this->tidier->culler()->finder());
        $this->assertNotNull($this->tidier->culler()->marker());
        $this->assertNotNull($this->tidier->culler()->notifier());
        $this->assertNotNull($this->tidier->unmarker());
        $this->assertNotNull($this->tidier->handler());
        $this->assertNotNull($this->tidier->handler()->finder());
        $this->assertNotNull($this->tidier->handler()->task());
    }
}
