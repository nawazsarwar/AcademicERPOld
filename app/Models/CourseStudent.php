<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseStudent extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'course_students';

    protected $dates = [
        'admitted_on',
        'verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'course_id',
        'user_id',
        'student_id',
        'faculty_no',
        'session_admitted_id',
        'admitted_on',
        'duration_extension',
        'verification_status_id',
        'verified_by_id',
        'verified_at',
        'verification_remark',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function session_admitted()
    {
        return $this->belongsTo(AcademicSession::class, 'session_admitted_id');
    }

    public function getAdmittedOnAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAdmittedOnAttribute($value)
    {
        $this->attributes['admitted_on'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function verification_status()
    {
        return $this->belongsTo(VerificationStatus::class, 'verification_status_id');
    }

    public function verified_by()
    {
        return $this->belongsTo(User::class, 'verified_by_id');
    }

    public function getVerifiedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setVerifiedAtAttribute($value)
    {
        $this->attributes['verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
