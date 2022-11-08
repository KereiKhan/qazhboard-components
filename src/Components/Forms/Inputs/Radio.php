<?php

namespace KereiKhan\QazhboardComponents\Components\Forms\Inputs;

use Illuminate\View\View;
use KereiKhan\QazhboardComponents\Components\QazhboardComponent;

class Radio extends QazhboardComponent
{
    public string $label;
    public array $items;
    public string $name;
    public string $id;
    public ?string $description;

    public function __construct(
        string $name,
        string $label,
        array $items,
        string $id = null,
        string $description = null
    ) {
        $this->label = $label;
        $this->items = $items;
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->description = $description;
    }

    public function render(): View
    {
        return view('qazhboard-components::components.forms.inputs.radio');
    }
}
