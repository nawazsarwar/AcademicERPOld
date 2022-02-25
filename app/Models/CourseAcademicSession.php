<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAcademicSession extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'course_academic_sessions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'academic_session_id',
        'course_id',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function academic_session()
    {
        return $this->belongsTo(AcademicSession::class, 'academic_session_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
