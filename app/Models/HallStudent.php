<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HallStudent extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'hall_students';

    protected $dates = [
        'allotment_date',
        'allotted_on',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hall_id',
        'hostel_id',
        'room_no',
        'student_id',
        'allotment_date',
        'allotted_by_id',
        'allotted_on',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }

    public function hostel()
    {
        return $this->belongsTo(Hostel::class, 'hostel_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function getAllotmentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAllotmentDateAttribute($value)
    {
        $this->attributes['allotment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function allotted_by()
    {
        return $this->belongsTo(User::class, 'allotted_by_id');
    }

    public function getAllottedOnAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAllottedOnAttribute($value)
    {
        $this->attributes['allotted_on'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
