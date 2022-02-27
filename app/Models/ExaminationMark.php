<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationMark extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'examination_marks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'student_id',
        'academic_session_id',
        'sessional',
        'theory',
        'total',
        'grade',
        'grade_point',
        'result',
        'part',
        'status',
        'final_result',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function academic_session()
    {
        return $this->belongsTo(AcademicSession::class, 'academic_session_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
