<?php

use Illuminate\View\ViewException;

function template(string $attributes)
{
    return '<x-qazhboard-components-filepond ' . $attributes . ' />';
}

test('it can be rendered', function () {
    $this->blade(template('name="filepond" upload-url="https://example.com"'))
        ->assertSee('name="filepond"', false)
        ->assertSee('https://example.com');
});

test('it label can be rendered', function () {
    $this->blade(
        template(
            'name="filepond" upload-url="/server" label="Upload your photo."'
        )
    )->assertSee('Upload your photo.');
});

test('it id can be rendered', function () {
    $this->blade(
        template('name="filepond" upload-url="/server" id="upload"')
    )->assertSee('id="upload"', false);
});

test('it name is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');

    $this->blade(template('upload-url="example.com"'));
});

test('it upload-url is required', function () {
    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $uploadUrl');

    $this->blade(template('name="filepond"'));
});
