<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkExperience extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const EMPLOYER_TYPE_SELECT = [
        'Government' => 'Government',
        'Private'    => 'Private',
        'Other'      => 'Other',
    ];

    public $table = 'work_experiences';

    protected $dates = [
        'employed_from',
        'employed_to',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'employer',
        'employer_type',
        'designation',
        'employed_from',
        'employed_to',
        'responsibilities',
        'reason_for_leaving',
        'pay_band',
        'basic_pay',
        'gross_pay',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getEmployedFromAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEmployedFromAttribute($value)
    {
        $this->attributes['employed_from'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEmployedToAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEmployedToAttribute($value)
    {
        $this->attributes['employed_to'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
