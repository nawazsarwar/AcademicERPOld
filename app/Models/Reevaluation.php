<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reevaluation extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'reevaluations';

    protected $dates = [
        'result_declaration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'exam_registration_id',
        'student_id',
        'course_id',
        'examination_name',
        'examination_year',
        'examination_part',
        'result_declaration_date',
        'submitted',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function exam_registration()
    {
        return $this->belongsTo(ExamRegistration::class, 'exam_registration_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getResultDeclarationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setResultDeclarationDateAttribute($value)
    {
        $this->attributes['result_declaration_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
