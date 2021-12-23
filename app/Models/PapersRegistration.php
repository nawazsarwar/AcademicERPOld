<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PapersRegistration extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const REGISTRATION_MODE_RADIO = [
        'A' => 'A',
        'B' => 'B',
        'C' => 'C',
    ];

    public $table = 'papers_registrations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'paper_id',
        'registration_id',
        'student_id',
        'registration_mode',
        'profile',
        'faculty',
        'department',
        'department_code',
        'paper_code',
        'paper_title',
        'fraction',
        'credits',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function paper()
    {
        return $this->belongsTo(Paper::class, 'paper_id');
    }

    public function registration()
    {
        return $this->belongsTo(ExamRegistration::class, 'registration_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
