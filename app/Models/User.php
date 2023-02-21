<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'nama';
    }

    public function aksesoris(): HasMany
    {
        return $this->hasMany(Aksesoris::class);
    }

    public function axis(): HasMany
    {
        return $this->hasMany(Axis::class);
    }

    public function indosat(): HasMany
    {
        return $this->hasMany(Indosat::class);
    }

    public function pemasukan(): HasMany
    {
        return $this->hasMany(Pemasukan::class);
    }

    public function pendapatan(): HasMany
    {
        return $this->hasMany(Pendapatan::class);
    }

    public function saldo(): HasMany
    {
        return $this->hasMany(Pengeluaran::class);
    }

    public function smartfren(): HasMany
    {
        return $this->hasMany(Saldo::class);
    }

    public function telkomsel(): HasMany
    {
        return $this->hasMany(Smartfren::class);
    }

    public function tri(): HasMany
    {
        return $this->hasMany(Tri::class);
    }

    public function xl(): HasMany
    {
        return $this->hasMany(Xl::class);
    }
}
