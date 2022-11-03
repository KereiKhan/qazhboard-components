<?php

use Illuminate\View\ViewException;

function data()
{
    return collect([
        'en' => 'English',
        'ru' => 'Russian',
        'kk' => 'Kazakh'
    ])->toJson();
}

test('it can be rendered', function () {
    $template = <<<'HTML'
            <x-qazhboard-components-select :items="data()" name="languages" />
           HTML;

    $this->blade($template)
        ->assertSee('name="languages"', false)
        ->assertSeeInOrder(['en' => 'English']);
});

test('it items is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $items');

    $template = <<<'HTML'
            <x-qazhboard-components-select name="languages" />
           HTML;
    $this->blade($template)->assertSee('name="languages"', false);
});

test('it name is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');

    $template = <<<'HTML'
            <x-qazhboard-components-select :items="data()" />
           HTML;

    $this->blade($template)
        ->assertSeeInOrder(['en' => 'English']);
});

test('it placeholder can be rendered', function () {
    $template = <<<'HTML'
            <x-qazhboard-components-select :items="data()" name="languages" placeholder="It is custom placeholder" />
           HTML;

    $this->blade($template)
        ->assertSee('name="languages"', false)
        ->assertSeeInOrder(['en' => 'English'])
        ->assertSee('It is custom placeholder');
});

test('it emptyOptionsMessage can be rendered', function () {
    $template = <<<'HTML'
            <x-qazhboard-components-select :items="data()" name="languages" empty-options-message="It is custom emptyOptionsMessage" />
           HTML;

    $this->blade($template)
        ->assertSee('name="languages"', false)
        ->assertSeeInOrder(['en' => 'English'])
        ->assertSee('It is custom emptyOptionsMessage');
});

test('it id can be rendered', function () {
    $template = <<<'HTML'
            <x-qazhboard-components-select :items="data()" name="languages" id="It is custom id" />
           HTML;

    $this->blade($template)
        ->assertSee('name="languages"', false)
        ->assertSeeInOrder(['en' => 'English'])
        ->assertSee('It is custom id');
});
