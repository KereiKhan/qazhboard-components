<?php

function template(string $attributes): string
{
    return '<x-qazhboard-components-form '.$attributes.'>
                Form fields...
            </x-qazhboard-components-form>';
}

test('it action can be set', function () {
    $view = $this->blade(template('action="http://example.com"'));

    $view->assertSee('Form fields...');
    $view->assertSee('action="http://example.com"', false);
});

test('it method can be set', function () {
    $view = $this->blade(template('method="PUT"'));

    $view->assertSee('method="POST"', false);
    $view->assertSee('<input type="hidden" name="_method" value="PUT">', false);
});

test('it can enable file uploads', function () {
    $this->blade(template('has-files'))
        ->assertSee('enctype="multipart/form-data"', false);
});
