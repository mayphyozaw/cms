<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_number',
        'phone',
        'address',
        'gender',
        'nrc',
        'nrcfrontphoto',
        'nrcbackphoto',
        'householdphoto',
        'referenceletter',
        'esingphoto',
        'photo',
        'department',
        'joindate',
        'employeetype',
        'contact_person',
        'role',
        'status',
        'contact_number',
    ];



    protected function acsrNrcFrontImagePath(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) =>
            $attributes['nrcfrontphoto']
                ? asset('upload/user_images/' . $attributes['nrcfrontphoto'])
                : asset('upload/user_images/default.png')
        );
    }
    protected function acsrNrcBackImagePath(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) =>
            $attributes['nrcbackphoto']
                ? asset('upload/user_images/' . $attributes['nrcbackphoto'])
                : asset('upload/user_images/default.png')
        );
    }

    protected function acsrHouseholdImagePath(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) =>
            $attributes['householdphoto']
                ? asset('upload/user_images/' . $attributes['householdphoto'])
                : asset('upload/user_images/default.png')
        );
    }
    protected function acsrReferenceImagePath(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) =>
            $attributes['referenceletter']
                ? asset('upload/user_images/' . $attributes['referenceletter'])
                : asset('upload/user_images/default.png')
        );
    }
    protected function acsrEsingImagePath(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) =>
            $attributes['esingphoto']
                ? asset('upload/user_images/' . $attributes['esingphoto'])
                : asset('upload/user_images/default.png')
        );
    }

    protected function acsrImagePath(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) =>
            $attributes['photo']
                ? asset('upload/user_images/' . $attributes['photo'])
                : asset('upload/user_images/default.png')
        );
    }
    // public function imagePath(string $image, string $default = 'default.png'):string
    // {
    //     return !empty($this->$image)
    //         ? asset('upload/user_images/' . $this->$image)
    //         : asset('upload/user_images/' . $default);
    // }

    protected function acsrStatus(): Attribute
    {
        return Attribute::make(
            get: function ($value, array $attributes) {
                return match ($attributes['status']) {
                    'active' => [
                        'text'  => 'Active',
                        'badge' => 'success', // Bootstrap class
                    ],
                    'inactive' => [
                        'text'  => 'Inactive',
                        'badge' => 'danger',
                    ],
                    default => [
                        'text'  => 'Unknown',
                        'badge' => 'secondary',
                    ],
                };
            }
        );
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function engineerAssigns()
    {
        return $this->hasMany(EngineerAssign::class);
    }
}
