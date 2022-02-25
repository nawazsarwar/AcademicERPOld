<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const SUBSIDIARIZABLE_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public $table = 'courses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'degree_id',
        'campus_id',
        'title',
        'title_hindi',
        'title_urdu',
        'code',
        'course_code',
        'internal_code',
        'level_id',
        'entrance_type_id',
        'mode_id',
        'duration_type_id',
        'duration',
        'total_intake',
        'subsidiarizable',
        'administrable_id',
        'administrable_type',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    public function level()
    {
        return $this->belongsTo(CourseLevel::class, 'level_id');
    }

    public function entrance_type()
    {
        return $this->belongsTo(AdmissionEntranceType::class, 'entrance_type_id');
    }

    public function mode()
    {
        return $this->belongsTo(ProgrammeDeliveryMode::class, 'mode_id');
    }

    public function duration_type()
    {
        return $this->belongsTo(ProgrammeDurationType::class, 'duration_type_id');
    }

    public function administrable()
    {
        return $this->belongsTo(Department::class, 'administrable_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
