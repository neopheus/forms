<?php

namespace Tests\Unit\Fixtures;

use Filament\Forms2\Concerns\InteractsWithForms;
use Filament\Forms2\Contracts\HasForms;
use Livewire\Component;

class Livewire extends Component implements HasForms
{
    use InteractsWithForms;

    public $data;

    public static function make(): static
    {
        return new static();
    }

    public function getData()
    {
        return $this->data;
    }
}
