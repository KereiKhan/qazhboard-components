<?php

declare(strict_types=1);

namespace KereiKhan\QazhboardComponents\Components;

use Illuminate\View\Component;

abstract class QazhboardComponent extends Component
{
    /** @var array */
    protected static array $assets = [];

    public static function assets(): array
    {
        return static::$assets;
    }
}
