<?php

use Illuminate\View\ViewException;

test('it can be rendered', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-toggle name="toggle" label="Toggle this" />
                HTML;

    $view = $this->blade($template);

    $view->assertSee('Toggle this')
        ->assertSee('name="toggle"', false)
        ->assertSee('id="toggle"', false);
});

test('it id can be set', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-toggle name="toggle" id="toggleID" label="Toggle this" />
                HTML;
    $view = $this->blade($template);

    $view->assertSee('Toggle this')
        ->assertSee('name="toggle"', false)
        ->assertSee('id="toggleID"', false);
});

test('it name is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');

    $template = <<<'HTML'
                    <x-qazhboard-components-toggle id="toggleID" label="Toggle this" />
                HTML;

    $this->blade($template);
});

test('it label is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $label');

    $template = <<<'HTML'
                    <x-qazhboard-components-toggle id="toggleID" name="toggle" />
                HTML;

    $this->blade($template);
});
