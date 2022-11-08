<?php

use KereiKhan\QazhboardComponents\Components;

return [
    'components' => [
        'form'         => Components\Forms\Form::class,
        'error'        => Components\Forms\Error::class,
        'input'        => Components\Forms\Inputs\Input::class,
        'checkbox'     => Components\Forms\Inputs\Checkbox::class,
        'toggle'       => Components\Forms\Inputs\Toggle::class,
        'select'       => Components\Forms\Inputs\Select::class,
        'filepond'     => Components\Forms\Inputs\Filepond::class,
        'radio'        => Components\Forms\Inputs\Radio::class,
        'quill-editor' => Components\Forms\Inputs\QuillEditor::class,
    ],

    'prefix' => 'qazhboard-components',

    'assets' => [
        'https://unpkg.com/filepond@^4/dist/filepond.css',
        'https://cdn.quilljs.com/1.3.6/quill.snow.css',
        'https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js',
        'https://unpkg.com/filepond@^4/dist/filepond.js',
        'https://cdn.quilljs.com/1.3.6/quill.js',
    ],
];
