<?php

namespace KereiKhan\QazhboardComponents\Tests;

use KereiKhan\QazhboardComponents\Providers\QazhboardComponentsServiceProvider;
use Orchestra\Testbench\TestCase;

class QazhboardComponentsTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('view:clear');
    }

    protected function flashOld(array $input): void
    {
        session()->flashInput($input);

        request()->setLaravelSession(session());
    }

    protected function getPackageProviders($app): array
    {
        return [QazhboardComponentsServiceProvider::class];
    }
}
