<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Jeffgreco13\FilamentBreezy\Actions\PasswordButtonAction;
use Jeffgreco13\FilamentBreezy\Livewire\MyProfileComponent;

class DeleteMyAccountComponent extends MyProfileComponent
{
    public String $view = 'livewire.delete-my-account-component';

    public static $sort = 10;

    public $user;

    public function mount(): void
    {
        $this->user = Filament::getCurrentPanel()->auth()->user();
    }

    public function deleteAction(): Action
    {
        return PasswordButtonAction::make('delete')
            ->label(__('Hapus Akun'))
            ->color('danger')
            ->icon('heroicon-s-shield-exclamation')
            ->action(function () {
                $this->user->delete();

                Notification::make()
                    ->success()
                    ->title(__('Success'))
                    ->send();
            });
    }
}
