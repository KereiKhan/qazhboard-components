<?php

use Khangrey\QazhboardComponents\Components;

return [
    'components' => [
        'form' => Components\Forms\Form::class,
        'error' => Components\Forms\Error::class,
        'input' => Components\Forms\Inputs\Input::class,
        'checkbox' => Components\Forms\Inputs\Checkbox::class,
        'toggle' => Components\Forms\Inputs\Toggle::class,
        'select' => Components\Forms\Inputs\Select::class,
        'filepond' => Components\Forms\Inputs\Filepond::class,
        'radio' => Components\Forms\Inputs\Radio::class
    ],

    'prefix' => 'qazhboard-components'
];
