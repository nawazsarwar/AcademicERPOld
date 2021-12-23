<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamRegistration extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const REVIEWED_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public const TYPE_SELECT = [
        'REGULAR' => 'REGULAR',
        'EX'      => 'EX',
    ];

    public $table = 'exam_registrations';

    protected $dates = [
        'reviewed_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'student_id',
        'course_id',
        'subsidiary_one_id',
        'subsidiary_two_id',
        'type',
        'academic_session_id',
        'season',
        'faculty_no',
        'faculty_code',
        'fraction',
        'hall_id',
        'hostel_id',
        'room_no',
        'reviewed',
        'reviewed_by_id',
        'reviewed_at',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function subsidiary_one()
    {
        return $this->belongsTo(Course::class, 'subsidiary_one_id');
    }

    public function subsidiary_two()
    {
        return $this->belongsTo(Course::class, 'subsidiary_two_id');
    }

    public function academic_session()
    {
        return $this->belongsTo(AcademicSession::class, 'academic_session_id');
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }

    public function hostel()
    {
        return $this->belongsTo(Hostel::class, 'hostel_id');
    }

    public function reviewed_by()
    {
        return $this->belongsTo(User::class, 'reviewed_by_id');
    }

    public function getReviewedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setReviewedAtAttribute($value)
    {
        $this->attributes['reviewed_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
