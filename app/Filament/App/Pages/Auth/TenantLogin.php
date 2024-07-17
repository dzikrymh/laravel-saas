<?php

namespace App\Filament\App\Pages\Auth;

use Filament\Pages\Auth\Login;
use Illuminate\Contracts\Support\Htmlable;

class TenantLogin extends Login
{
    public function getHeading(): string|Htmlable
    {
        // check central domain
        if (in_array(request()->getHost(), config('tenancy.central_domains'))) {
            return __('Demo Login');
        } else {
            return __('filament-panels::pages/auth/login.heading');
        }
    }
}
