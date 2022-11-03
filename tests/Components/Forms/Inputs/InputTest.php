<?php

use Illuminate\View\ViewException;

test('it can be render', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-input name="email" label="Email address" />
                HTML;

    $view = $this->blade($template);

    $view->assertSee('Email address');
    $view->assertSee('name="email"', false);
});

test('it name is required', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-input label="Email address" />
                HTML;
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');

    $this->blade($template);
});

test('it label is required', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-input name="email" />
                HTML;
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $label');

    $this->blade($template);
});
