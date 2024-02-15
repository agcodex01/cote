<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseSubject extends Pivot
{
    protected $fillable = [
        'year_level_id',
        'semester_id',
        'section_id',
        'teacher_id',
        'time_from',
        'time_to',
        'days'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'days' => 'array',
        'time_from' => 'datetime',
        'time_to' => 'datetime',
    ];


    public function daysFormat(): Attribute
    {
        return new Attribute(fn () => implode(', ',$this->days));
    }

    /**
     * Get the yearLevel that owns the CourseSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function yearLevel(): BelongsTo
    {
        return $this->belongsTo(YearLevel::class);
    }

    /**
     * Get the semester that owns the CourseSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    /**
     * Get the section that owns the CourseSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Get the teacher that owns the CourseSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Get the subject that owns the CourseSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the course that owns the CourseSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
