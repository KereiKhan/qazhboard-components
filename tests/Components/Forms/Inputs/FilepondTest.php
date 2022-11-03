<?php

use Illuminate\View\ViewException;

function template(string $attributes)
{
    return '<x-qazhboard-components-filepond ' . $attributes . ' />';
}

test('it can be rendered', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-filepond name="filepond" upload-url="https://example.com" />
                HTML;


    $this->blade($template)
        ->assertSee('name="filepond"', false)
        ->assertSee('https://example.com');
});

test('it label can be rendered', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-filepond name="filepond" upload-url="/server" label="Upload your photo." />
                HTML;
    $this->blade($template)->assertSee('Upload your photo.');
});

test('it id can be rendered', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-filepond name="filepond" upload-url="/server" id="upload" />
                HTML;
    $this->blade($template)->assertSee('id="upload"', false);
});

test('it name is required', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-filepond upload-url="/server" />
                HTML;

    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $name');

    $this->blade($template);
});

test('it upload-url is required', function () {
    $template = <<<'HTML'
                    <x-qazhboard-components-filepond name="filepond" />
                HTML;

    $this->expectException(ViewException::class);
    $this->expectErrorMessage('string $uploadUrl');

    $this->blade($template);
});
