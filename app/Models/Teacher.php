<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    use HasFactory, Filterable;

    protected $with = ['user'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
    ];

    /**
     * Get the user that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the advisory associated with the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function advisory(): HasOne
    {
        return $this->hasOne(Section::class);
    }

    /**
     * Get all of the subjects for the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(CourseSubject::class);
    }

    /**
     * The yearLevels that belong to the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function yearLevels(): BelongsToMany
    {
        return $this->belongsToMany(YearLevel::class);
    }

    /**
     * The semesters that belong to the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function semesters(): BelongsToMany
    {
        return $this->belongsToMany(Semester::class);
    }
}
