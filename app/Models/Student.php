<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory, Filterable;

    protected $with = ['user'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_number',
        'user_id',
        'course_id'
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
     * Get the course that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get all of the grades for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Get all of the semesters for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function semesters(): BelongsToMany
    {
        return $this->belongsToMany(Semester::class)->using(SemesterStudent::class);
    }

    /**
     * The yearLevels that belong to the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function yearLevels(): BelongsToMany
    {
        return $this->belongsToMany(YearLevel::class);
    }

    /**
     * Get all of the classes for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classes(): HasMany
    {
        return $this->hasMany(SemesterStudent::class, 'student_id', 'id');
    }
}
