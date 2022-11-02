<?php

declare(strict_types=1);

namespace Khangrey\QazhboardComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

final class QazhboardComponentsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/qazhboard-components.php', 'qazhboard-components');
    }


    public function boot(): void
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootPublishing();
    }

    protected function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'qazhboard-components');
    }

    protected function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $prefix = config('qazhboard-components.prefix', '');

            foreach (config('qazhboard-components.components', []) as $alias => $component) {
                $blade->component($alias, $component, $prefix);
            }
        });
    }

    protected function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/qazhboard-components.php' => $this->app->configPath('qazhboard-components.php'),
            ], 'qazhboard-components-config');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/qazhboard-components'),
            ], 'qazhboard-components-views');
        }
    }
}
