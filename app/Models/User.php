<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Context;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
        'affiliation',
        'country',
        'orcid_id',
    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected $casts = [
    //     'is_admin' => 'boolean',
    // ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function isAdmin()
    {
        return $this->is_admin;
    }

    // public function isSuperAdmin()
    // {
    //     return $this->hasOne(SuperAdmin::class)->exists();
    // }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
    function hasRole(string $role)
    {
        if (Context::getHidden('role')) {
            return in_array(strtolower($role), Context::getHidden('role'));
        }
        return $this->roles->contains('name', $role);
    }
    function hasAnyRole(array $roles)
    {
        if (Context::hasHidden('roles')) {
            $matches = array_intersect(array_map('strtolower', $roles), Context::getHidden('roles'));
            return !empty($matches);
        }
        // otherwise hit database
        return $this->roles()->whereIn('name', $roles)->exists();
    }
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
