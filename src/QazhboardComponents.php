<?php

namespace KereiKhan\QazhboardComponents;

class QazhboardComponents
{
    /** @var array */
    private static array $styles = [];

    /** @var array */
    private static array $scripts = [];

    public static function addStyle(string $style): void
    {
        if (!in_array($style, static::$styles)) {
            static::$styles[] = $style;
        }
    }

    public static function styles(): array
    {
        return static::$styles;
    }

    public static function outputStyles(): string
    {
        return collect(static::$styles)
            ->map(function (string $style) {
                return '<link href="'.$style.'" rel="stylesheet" />';
            })
            ->implode(PHP_EOL);
    }

    public static function addScript(string $script): void
    {
        if (!in_array($script, static::$scripts)) {
            static::$scripts[] = $script;
        }
    }

    public static function scripts(): array
    {
        return static::$scripts;
    }

    public static function outputScripts(): string
    {
        return collect(static::$scripts)
            ->map(function (string $script) {
                return '<script src="'.$script.'"></script>';
            })
            ->implode(PHP_EOL);
    }
}
