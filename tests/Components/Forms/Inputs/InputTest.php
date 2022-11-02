<?php

use Illuminate\View\ViewException;

function template(string $attributes)
{
    return '<x-qazhboard-components-input '.$attributes.' />';
}

test('it can be render', function () {
    $view = $this->blade(template('name="email" label="Email address"'));

    $view->assertSee('Email address');
    $view->assertSee('name="email"', false);
});

test('it name is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');
    $this->blade(template('label="Email address"'));
});

test('it label is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $label');
    $this->blade(template('name="email"'));
});
