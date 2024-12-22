<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'otp',
        'reffer_code',
        'role',
        'is_active'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


    public static function generateReferralCode()
    {
        $appName = Config::get('app.name', 'APP');
        $appInitials = collect(explode(' ', $appName))
            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
            ->join('');
        do {
            $code = $appInitials . '-' . Str::upper(Str::random(6));
        } while (self::where('reffer_code', $code)->exists());
        return $code;
    }
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->reffer_code = self::generateReferralCode();
        });
    }
}
