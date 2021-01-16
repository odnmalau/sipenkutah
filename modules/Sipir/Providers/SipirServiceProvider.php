<?php

namespace Modules\Sipir\Providers;

use Illuminate\Database\Eloquent\Factory;
use Laravolt\Support\Base\BaseServiceProvider;

class SipirServiceProvider extends BaseServiceProvider
{
    public function getIdentifier()
    {
        return 'sipir';
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
                ->add('Sipir', route('modules::sipir.index'))
                ->data('icon', 'user nurse')
                ->data('permission', $this->config['permission'] ?? [])
                ->active('modules/sipir/*');
        });
    }
}
