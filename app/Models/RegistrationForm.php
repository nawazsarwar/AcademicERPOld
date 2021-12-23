<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationForm extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const FILLABLE_CURRENT_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public const FILLABLE_BACKLOG_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public $table = 'registration_forms';

    protected $dates = [
        'opening_date',
        'closing_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'course_id',
        'title',
        'opening_date',
        'closing_date',
        'academic_session_id',
        'programme_duration_type_id',
        'fillable_current',
        'fillable_backlog',
        'remarks',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getOpeningDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setOpeningDateAttribute($value)
    {
        $this->attributes['opening_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getClosingDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setClosingDateAttribute($value)
    {
        $this->attributes['closing_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function academic_session()
    {
        return $this->belongsTo(AcademicSession::class, 'academic_session_id');
    }

    public function programme_duration_type()
    {
        return $this->belongsTo(ProgrammeDurationType::class, 'programme_duration_type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
