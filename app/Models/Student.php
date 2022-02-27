<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'students';

    protected $dates = [
        'verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'person_id',
        'enrolment_id',
        'enrolment_no',
        'guardian_mobile_no',
        'verification_status_id',
        'verified_by_id',
        'verified_at',
        'verification_remark',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class, 'enrolment_id');
    }

    public function verification_status()
    {
        return $this->belongsTo(VerificationStatus::class, 'verification_status_id');
    }

    public function verified_by()
    {
        return $this->belongsTo(User::class, 'verified_by_id');
    }

    public function getVerifiedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setVerifiedAtAttribute($value)
    {
        $this->attributes['verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
