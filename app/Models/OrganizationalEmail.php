<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganizationalEmail extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const TYPE_SELECT = [
        'ALUMNI'   => 'ALUMNI',
        'EMPLOYEE' => 'EMPLOYEE',
        'STUDENT'  => 'STUDENT',
    ];

    public $table = 'organizational_emails';

    protected $dates = [
        'office_365_deployed_at',
        'gsuite_deployed_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'email',
        'type',
        'alias',
        'first_password',
        'avatar_url',
        'recovery_email',
        'recovery_phone',
        'gender',
        'office_365',
        'office_365_uid',
        'office_365_object_uid',
        'office_365_deployed_at',
        'gsuite',
        'gsuite_uid',
        'gsuite_deployed_at',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getOffice365DeployedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setOffice365DeployedAtAttribute($value)
    {
        $this->attributes['office_365_deployed_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getGsuiteDeployedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setGsuiteDeployedAtAttribute($value)
    {
        $this->attributes['gsuite_deployed_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
