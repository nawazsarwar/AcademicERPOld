<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAdmission extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'student_admissions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'roll_no',
        'application_no',
        'course_id',
        'enrolment_id',
        'faculty_no',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class, 'enrolment_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
