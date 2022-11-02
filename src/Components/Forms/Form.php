<?php

declare(strict_types=1);

namespace Khangrey\QazhboardComponents\Components\Forms;

use Illuminate\View\View;
use Khangrey\QazhboardComponents\Components\QazhboardComponent;

class Form extends QazhboardComponent
{
    /** @var string|null */
    public ?string $action;

    /** @var string */
    public string $method;

    /** @var bool */
    public bool $hasFiles;

    public function __construct(
        string $action = null, string $method = 'POST', bool $hasFiles = false
    )
    {
        $this->action = $action;
        $this->method = $method;
        $this->hasFiles = $hasFiles;
    }

    public function render(): View
    {
        return view('qazhboard-components::components.forms.form');
    }
}
