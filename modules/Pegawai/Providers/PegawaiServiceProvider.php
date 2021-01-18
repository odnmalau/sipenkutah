<?php

namespace Modules\Pegawai\Providers;

use Laravolt\Support\Base\BaseServiceProvider;

class PegawaiServiceProvider extends BaseServiceProvider
{
    public function getIdentifier()
    {
        return 'pegawai';
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
                ->add('Pegawai', route('modules::pegawai.index'))
                ->data('icon', 'users')
                ->data('permission', $this->config['permission'] ?? [])
                ->active('modules/pegawai/*');
        });
    }
}
