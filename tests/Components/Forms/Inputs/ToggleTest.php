<?php

use Illuminate\View\ViewException;

function template(string $attributes)
{
    return '<x-qazhboard-components-toggle '. $attributes . ' />';
}

test('it can be rendered', function () {
    $view = $this->blade(template('name="toggle" label="Toggle this"'));

    $view->assertSee('Toggle this')
        ->assertSee('name="toggle"', false)
        ->assertSee('id="toggle"', false);
});

test('it id can be set', function () {
    $view = $this->blade(template('name="toggle" id="toggleID" label="Toggle this"'));

    $view->assertSee('Toggle this')
        ->assertSee('name="toggle"', false)
        ->assertSee('id="toggleID"', false);
});

test('it name is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');

    $view = $this->blade(template('id="toggleID" label="Toggle this"'));
});

test('it label is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $label');

    $this->blade(template('id="toggleID" name="toggle"'));
});

