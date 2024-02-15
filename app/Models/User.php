<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'contact',
        'address',
        'email',
        'password',
        'type'
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
        'password' => 'hashed',
    ];


    /**
     * Get the student associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    /**
     * Get the teacher associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }

    public function getFullName(): string
    {
        return $this->lname . ' ' . $this->fname . ' ' . $this->mname;
    }
}
