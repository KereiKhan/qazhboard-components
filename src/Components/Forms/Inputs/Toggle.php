<?php

declare(strict_types=1);

namespace Khangrey\QazhboardComponents\Components\Forms\Inputs;

use Illuminate\View\View;
use Khangrey\QazhboardComponents\Components\QazhboardComponent;

class Toggle extends QazhboardComponent
{
    public string $name;
    public string $id;
    public string $label;
    public ?string $title;
    public bool $checked;

    public function __construct(
        string $name,
        string $label,
        string $id = null,
        string $title = null,
        bool $checked = false
    ) {
        $this->name = $name;
        $this->id = $id ?: $name;
        $this->label = $label;
        $this->title = $title;
        $this->checked = $checked;
    }

    public function render(): View
    {
        return view('qazhboard-components::components.forms.inputs.toggle');
    }
}
