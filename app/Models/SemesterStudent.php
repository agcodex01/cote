<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SemesterStudent extends Pivot
{
    /**
     * Get the student that owns the SemesterStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the semester that owns the SemesterStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    /**
     * Get the yearLevel that owns the SemesterStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function yearLevel(): BelongsTo
    {
        return $this->belongsTo(YearLevel::class);
    }
}
