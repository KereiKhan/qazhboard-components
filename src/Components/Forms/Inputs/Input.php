<?php

declare(strict_types=1);

namespace KereiKhan\QazhboardComponents\Components\Forms\Inputs;

use Illuminate\View\View;
use KereiKhan\QazhboardComponents\Components\QazhboardComponent;

class Input extends QazhboardComponent
{
    /** @var string */
    public string $name;

    /** @var string */
    public string $id;

    /** @var string */
    public string $type;

    /** @var string */
    public string $value;

    /** @var string */
    public string $label;

    public function __construct(
        string $name,
        string $label,
        string $id = null,
        string $type = 'text',
        ?string $value = ''
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? '');
        $this->label = $label;
    }

    public function render(): View
    {
        return view('qazhboard-components::components.forms.inputs.input');
    }
}
