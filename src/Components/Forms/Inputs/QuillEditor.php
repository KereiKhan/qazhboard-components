<?php

namespace KereiKhan\QazhboardComponents\Components\Forms\Inputs;

use Illuminate\View\View;
use KereiKhan\QazhboardComponents\Components\QazhboardComponent;

class QuillEditor extends QazhboardComponent
{
    public string $name;
    public string $label;
    public string $id;
    public ?string $value;

    public function __construct(
        string $name,
        string $label,
        string $id = null,
        string $value = null
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->id = $id ?: $name;
        $this->value = $value;
    }

    public function render(): View
    {
        return view(
            'qazhboard-components::components.forms.inputs.quill-editor'
        );
    }
}
