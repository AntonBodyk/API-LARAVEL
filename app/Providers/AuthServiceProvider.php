<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Сопоставление политик приложения.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Регистрация сервисов аутентификации и авторизации.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
    }

}

