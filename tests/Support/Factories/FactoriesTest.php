<?php

namespace R4nkt\ResourceTidier\Tests\Support\Factories;

use R4nkt\ResourceTidier\Exceptions\InvalidConfiguration;
use R4nkt\ResourceTidier\Support\Factories\CullerFactory;
use R4nkt\ResourceTidier\Support\Factories\FinderFactory;
use R4nkt\ResourceTidier\Support\Factories\HandlerFactory;
use R4nkt\ResourceTidier\Support\Factories\MarkerFactory;
use R4nkt\ResourceTidier\Support\Factories\NotifierFactory;
use R4nkt\ResourceTidier\Support\Factories\TaskFactory;
use R4nkt\ResourceTidier\Support\Factories\TidierFactory;
use R4nkt\ResourceTidier\Support\Factories\UnmarkerFactory;
use R4nkt\ResourceTidier\Tests\TestCase;

class FactoriesTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideValidFactoryComponentScenarios
     */
    public function it_successfully_uses_factories_to_build_valid_components($factoryClass, $componentName)
    {
        $this->assertNotNull($factoryClass::make($componentName));
    }

    public function provideValidFactoryComponentScenarios()
    {
        return [
            [TidierFactory::class, 'null-resource-tidier'],
            [CullerFactory::class, 'null-resource-culler'],
            [HandlerFactory::class, 'null-resource-handler'],
            [FinderFactory::class, 'null-resource-finder'],
            [MarkerFactory::class, 'null-resource-marker'],
            [NotifierFactory::class, 'null-resource-notifier'],
            [TaskFactory::class, 'null-resource-task'],
            [UnmarkerFactory::class, 'null-resource-unmarker'],
        ];
    }

    /**
     * @test
     * @dataProvider provideValidFactories
     */
    public function it_fails_to_build_invalid_components($factoryClass)
    {
        $this->expectException(InvalidConfiguration::class);

        $factoryClass::make('invalid-component-name');
    }

    public function provideValidFactories()
    {
        return [
            [TidierFactory::class],
            [CullerFactory::class],
            [HandlerFactory::class],
            [FinderFactory::class],
            [MarkerFactory::class],
            [NotifierFactory::class],
            [TaskFactory::class],
            [UnmarkerFactory::class],
        ];
    }
}
