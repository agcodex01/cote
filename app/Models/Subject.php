<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description',
        'units'
    ];


    // Define the Many-to-Many relationship with Course
    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->using(CourseSubject::class)
            ->withPivotValue('year_level_id', 'semester_id');
    }

    /**
     * Get all of the grades for the Subject
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
