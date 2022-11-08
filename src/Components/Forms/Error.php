<?php

namespace KereiKhan\QazhboardComponents\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\View;
use KereiKhan\QazhboardComponents\Components\QazhboardComponent;

class Error extends QazhboardComponent
{
    /** @var string */
    public string $field;

    /** @var string */
    public string $bag;

    public function __construct(string $field, string $bag = 'default')
    {
        $this->field = $field;
        $this->bag = $bag;
    }

    public function render(): View
    {
        return view('qazhboard-components::components.forms.error');
    }

    public function messages(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
