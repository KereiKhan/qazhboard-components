<?php

use Illuminate\View\ViewException;

function template(string $attributes)
{
    return '<x-qazhboard-components-checkbox '.$attributes.' />';
}

test('it can be rendered', function () {
    $view = $this->blade(template('name="approve" label="Approve please!"'));

    $view->assertSee('Approve please')
        ->assertSee('name="approve"', false)
        ->assertSee('id="approve"', false);
});

test('it id can be set', function () {
    $view = $this->blade(template('id="approveID" name="approve" label="Approve please!"'));

    $view->assertSee('Approve please')
        ->assertSee('name="approve"', false)
        ->assertSee('id="approveID"', false);
});

test('it name is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');

    $this->blade(template('label="Approve please!"'));
});

test('it label is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $label');

    $this->blade(template('name="approve"'));
});
