<?php

namespace KereiKhan\QazhboardComponents\Components\Forms\Inputs;

use Illuminate\View\View;
use KereiKhan\QazhboardComponents\Components\QazhboardComponent;

class Filepond extends QazhboardComponent
{
    public string $name;
    public string $label;
    public ?string $id;
    public string $uploadUrl;
    public bool $is_multiple;

    public function __construct(
        string $name,
        string $uploadUrl,
        string $label = 'Upload file',
        string $id = null,
        bool $is_multiple = false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->id = $id ?: $name;
        $this->uploadUrl = $uploadUrl;
        $this->is_multiple = $is_multiple;
    }

    public function render(): View
    {
        return view('qazhboard-components::components.forms.inputs.filepond');
    }
}
