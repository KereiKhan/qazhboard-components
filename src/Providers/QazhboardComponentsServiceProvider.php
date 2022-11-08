<?php

declare(strict_types=1);

namespace KereiKhan\QazhboardComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;
use KereiKhan\QazhboardComponents\QazhboardComponents;

final class QazhboardComponentsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/qazhboard-components.php',
            'qazhboard-components'
        );
    }

    public function boot(): void
    {
        $this->bootAssets();
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootPublishing();
    }

    protected function bootResources(): void
    {
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views',
            'qazhboard-components'
        );
    }

    protected function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (
            BladeCompiler $blade
        ) {
            $prefix = config('qazhboard-components.prefix', '');

            foreach (
                config('qazhboard-components.components', [])
                as $alias => $component
            ) {
                $blade->component($alias, $component, $prefix);
            }

            $blade->directive('qcStyles', function () {
                return QazhboardComponents::outputStyles();
            });

            $blade->directive('qcScripts', function () {
                return QazhboardComponents::outputScripts();
            });
        });
    }

    protected function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__.
                    '/../../config/qazhboard-components.php' => $this->app->configPath(
                        'qazhboard-components.php'
                    ),
                ],
                'qazhboard-components-config'
            );

            $this->publishes(
                [
                    __DIR__.'/../resources/views' => $this->app->resourcePath(
                        'views/vendor/qazhboard-components'
                    ),
                ],
                'qazhboard-components-views'
            );
        }
    }

    protected function bootAssets()
    {
        $assets = config('qazhboard-components.assets', []);

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
    }
}
