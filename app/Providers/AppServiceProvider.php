<?php

namespace App\Providers;


use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('notify', function ($message, $title = '', $type = 'success') {
            $this->dispatchBrowserEvent('notify', ['message' => $message, 'title' => $title, 'type' => $type]);
        });
    }
}
