<?php

namespace Modules\Narapidana\Providers;

use Laravolt\Support\Base\BaseServiceProvider;

class NarapidanaServiceProvider extends BaseServiceProvider
{
    public function getIdentifier()
    {
        return 'narapidana';
    }

    public function register()
    {
        $file = $this->packagePath("config/{$this->getIdentifier()}.php");
        $this->mergeConfigFrom($file, "modules.{$this->getIdentifier()}");
        $this->publishes([$file => config_path("modules/{$this->getIdentifier()}.php")], 'config');

        $this->config = collect(config("modules.{$this->getIdentifier()}"));
    }

    protected function menu()
    {
        app('laravolt.menu.sidebar')->register(function ($menu) {
            $menu->modules
                ->add('Narapidana', route('modules::narapidana.index'))
                ->data('icon', 'id card outline')
                ->data('permission', $this->config['permission'] ?? [])
                ->active('modules/narapidana/*');
        });
    }
}
