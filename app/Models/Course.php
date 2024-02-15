<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description'
    ];

    // Define the Many-to-Many relationship with Subject
    public function subjects()
    {
        return $this->belongsToMany(Subject::class)
            ->using(CourseSubject::class)
            ->withPivot(
                'year_level_id',
                'semester_id',
                'section_id',
                'teacher_id',
                'time_from',
                'time_to',
                'days'
            );
    }

    // Define the Many-to-Many relationship with YearLevel
    public function yearLevels(): BelongsToMany
    {
        return $this->belongsToMany(YearLevel::class);
    }

    /**
     * The semesters that belong to the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function semesters(): BelongsToMany
    {
        return $this->belongsToMany(Semester::class)->withPivot('year_level_id');
    }

    /**
     * Get all of the students for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
