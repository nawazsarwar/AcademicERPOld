<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationSchedule extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const MODE_SELECT = [
        'Pen-Paper'    => 'Pen-Paper',
        'Viva'         => 'Viva',
        'Practical'    => 'Practical',
        'Seminar'      => 'Seminar',
        'Presentation' => 'Presentation',
        'Online'       => 'Online',
    ];

    public $table = 'examination_schedules';

    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'academic_session_id',
        'paper_id',
        'mode',
        'centre',
        'start',
        'end',
        'booklet_pages',
        'season',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function academic_session()
    {
        return $this->belongsTo(AcademicSession::class, 'academic_session_id');
    }

    public function paper()
    {
        return $this->belongsTo(Paper::class, 'paper_id');
    }

    public function getStartAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndAttribute($value)
    {
        $this->attributes['end'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
