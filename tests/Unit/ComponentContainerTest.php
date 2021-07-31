<?php

use Filament\Forms2\ComponentContainer;
use Filament\Forms2\Components\Component;
use Tests\TestCase;
use Tests\Unit\Fixtures\Livewire;

uses(TestCase::class);

it('belongs to Livewire component', function () {
    $container = ComponentContainer::make($livewire = Livewire::make());

    expect($container)
        ->getLivewire()->toBe($livewire);
});

it('has components', function () {
    $components = [];

    foreach (range(1, $count = 5) as $i) {
        $components[] = new Component();
    }

    $componentsBoundToContainer = ($container = ComponentContainer::make(Livewire::make()))
        ->components($components)
        ->getComponents();

    expect($componentsBoundToContainer)
        ->toHaveCount($count)
        ->each(
            fn ($component) => $component
                ->toBeInstanceOf(Component::class)
                ->getContainer()->toBe($container),
        );
});

it('belongs to parent component', function () {
    $container = ComponentContainer::make(Livewire::make())
        ->parentComponent($component = new Component());

    expect($container)
        ->getParentComponent()->toBe($component);
});
