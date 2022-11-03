<?php

use Illuminate\View\ViewException;

function template(string $attributes)
{
    return '<x-qazhboard-components-checkbox '.$attributes.' />';
}

test('it can be rendered', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-checkbox name="approve" label="Approve please!" />
                HTML;

    $this->blade($template)
        ->assertSee('Approve please')
        ->assertSee('name="approve"', false)
        ->assertSee('id="approve"', false);
});

test('it id can be set', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-checkbox id="approveID" name="approve" label="Approve please!" />
                HTML;
    $this->blade($template)
        ->assertSee('Approve please')
        ->assertSee('name="approve"', false)
        ->assertSee('id="approveID"', false);
});

test('it name is required', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-checkbox id="approveID" label="Approve please!" />
                HTML;
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');

    $this->blade($template);
});

test('it label is required', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-checkbox id="approveID" name="approve" />
                HTML;
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $label');

    $this->blade($template);
});
