<?php

namespace Modules\Pengunjung\Providers;

use Illuminate\Database\Eloquent\Factory;
use Laravolt\Support\Base\BaseServiceProvider;

class PengunjungServiceProvider extends BaseServiceProvider
{
    public function getIdentifier()
    {
        return 'pengunjung';
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
                ->add('Pengunjung', route('modules::pengunjung.index'))
                ->data('icon', 'restroom')
                ->data('permission', $this->config['permission'] ?? [])
                ->active('modules/pengunjung/*');
        });
    }
}
