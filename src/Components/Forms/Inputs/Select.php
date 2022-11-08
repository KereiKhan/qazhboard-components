<?php

declare(strict_types=1);

namespace Khangrey\QazhboardComponents\Components\Forms\Inputs;

use Illuminate\View\View;
use Khangrey\QazhboardComponents\Components\QazhboardComponent;

class Select extends QazhboardComponent
{
    public string $name;
    public string $placeholder;
    public string $emptyOptionsMessage;
    public ?string $id;
    public string $items;
    public string $selectedItem;

    public function __construct(
        string $items,
        string $name,
        string $selectedItem = '',
        string $placeholder = 'Select option',
        string $emptyOptionsMessage = 'No options match your search.',
        string $id = null
    ) {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->emptyOptionsMessage = $emptyOptionsMessage;
        $this->id = $id ?: $name;
        $this->items = $items;
        $this->selectedItem = $selectedItem;
    }

    public function render(): View
    {
        return view('qazhboard-components::components.forms.inputs.select');
    }
}
