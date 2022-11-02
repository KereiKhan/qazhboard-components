<?php

namespace Khangrey\QazhboardComponents\Tests;

use Gajus\Dindent\Indenter;
use Khangrey\QazhboardComponents\Providers\QazhboardComponentsServiceProvider;
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

    /**
     * @throws \Gajus\Dindent\Exception\RuntimeException
     * @throws \Gajus\Dindent\Exception\InvalidArgumentException
     */
    public function assertComponentRenders(string $expected, string $template, array $data = []): void
    {
        $indenter = new Indenter();
        $indenter->setElementType('h1', Indenter::ELEMENT_TYPE_INLINE);
        $indenter->setElementType('del', Indenter::ELEMENT_TYPE_INLINE);

        $blade = (string) $this->blade($template, $data);
        $indented = $indenter->indent($blade);
        $cleaned = str_replace(
            [' >', "\n/>", ' </div>', '> ', "\n>"],
            ['>', ' />', "\n</div>", ">\n    ", '>'],
            $indented,
        );

        $this->assertSame($expected, $cleaned);
    }
}
