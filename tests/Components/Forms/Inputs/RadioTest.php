<?php

use Illuminate\View\ViewException;

function items(): array
{
    return [
        [
            'title'   => 'Email',
            'checked' => false,
        ],
        [
            'title' => 'Phone',
        ],
        [
            'title'   => 'Push notification',
            'checked' => true,
        ],
    ];
}

test('it can be rendered', function () {
    $template = <<<'HTML'
            <x-qazhboard-components-radio name="radio" label="Radio buttons." :items="items()" />
            HTML;
    $this->blade($template)->assertSee('name="radio"', false)
    ->assertSee('Radio buttons');
});

test('it id can be rendered', function () {
    $template = <<<'HTML'
            <x-qazhboard-components-radio name="radio" label="Radio buttons." :items="items()" id="output-content" />
            HTML;
    $this->blade($template)
        ->assertSee('name="radio"', false)
        ->assertSee('id="output-content[Email]"', false)
        ->assertSee('Radio buttons');
});

test('it description can be rendered', function () {
    $template = <<<'HTML'
            <x-qazhboard-components-radio name="radio" label="Radio buttons." :items="items()" description="It is just description." />
            HTML;
    $this->blade($template)
        ->assertSee('name="radio"', false)
        ->assertSee('It is just description')
        ->assertSee('Radio buttons');
});

test('it name is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');
    $template = <<<'HTML'
            <x-qazhboard-components-radio label="Radio buttons." :items="items()" />
            HTML;
    $this->blade($template)->assertSee('Radio buttons');
});

test('it label is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $label');
    $template = <<<'HTML'
            <x-qazhboard-components-radio name="radio" :items="items()" />
            HTML;
    $this->blade($template)->assertSee('name="radio"', false);
});

test('it items is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('array $items');
    $template = <<<'HTML'
            <x-qazhboard-components-radio name="radio" label="Radio buttons" />
            HTML;
    $this->blade($template)->assertSee('name="radio"', false)->assertSee('Radio buttons');
});
