<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Stancl\Tenancy\Contracts\Syncable;
use Stancl\Tenancy\Database\Concerns\ResourceSyncing;

class User extends Authenticatable implements HasAvatar, Syncable, FilamentUser
{
    use HasFactory,
        Notifiable,
        SoftDeletes,
        HasUuids,
        ResourceSyncing,
        TwoFactorAuthenticatable;

    protected static function boot(): void
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('avatar') && ($model->getOriginal('avatar') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('avatar'));
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'global_id',
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $appends = [
        'avatar_path',
    ];

    public function getAvatarPathAttribute(): ?string
    {
        return $this->attributes['avatar'] ? tenant_asset($this->attributes['avatar']) : null;
    }

    /** Avatar */
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar ? tenant_asset($this->avatar) : null ;
    }


    /** FilamentUser */
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }


    /** Syncable */
    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    public function getGlobalIdentifierKeyName(): string
    {
        return 'global_id';
    }

    public function getCentralModelName(): string
    {
        return CentralUser::class;
    }

    public function getSyncedAttributeNames(): array
    {
        return [
            'global_id',
            'id',
            'name',
            'email',
            'password',
        ];
    }
}
