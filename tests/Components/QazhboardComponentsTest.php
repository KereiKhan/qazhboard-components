<?php

use Illuminate\Support\Str;
use KereiKhan\QazhboardComponents\QazhboardComponents;

test('it can register assets', function () {
    $assets = config('qazhboard-components.assets');
    collect($assets)
        ->filter(function (string $file) {
            return Str::endsWith($file, '.css');
        })
        ->each(function (string $style) {
            QazhboardComponents::addStyle($style);
        });

    collect($assets)
        ->filter(function (string $file) {
            return Str::endsWith($file, '.js');
        })
        ->each(function (string $script) {
            QazhboardComponents::addScript($script);
        });

    $this->assertNotEmpty(QazhboardComponents::styles());
    $this->assertStringContainsString(
        'https://unpkg.com/filepond@^4/dist/filepond.css',
        QazhboardComponents::outputStyles()
    );
});

test('it can see output styles', function () {
    $styles = QazhboardComponents::outputStyles();

    $this->assertStringContainsString(
        'https://unpkg.com/filepond@^4/dist/filepond.css',
        $styles
    );
});

test('it can see output scripts', function () {
    $scripts = QazhboardComponents::outputScripts();

    $this->assertStringContainsString(
        'https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js',
        $scripts
    );
});

test('it blade directives can be rendered', function () {
    $template = <<<'HTML'
@qcStyles
@qcScripts
HTML;

    $this->blade($template)
        ->assertSee('https://unpkg.com/filepond@^4/dist/filepond.css')
        ->assertSee(
            'https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js'
        );
});
