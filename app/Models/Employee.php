<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const RETIREMENT_SCHEME_SELECT = [
        'GPF' => 'GPF',
        'NPS' => 'NPS',
    ];

    public const GROUP_SELECT = [
        'A' => 'A',
        'B' => 'B',
        'C' => 'C',
        'D' => 'D',
    ];

    public const EMPLOYMENT_TYPE_SELECT = [
        'AD-HOC'     => 'AD-HOC',
        'DEPUTATION' => 'DEPUTATION',
        'PERMANENT'  => 'PERMANENT',
        'PROBATION'  => 'PROBATION',
        'TEMPORARY'  => 'TEMPORARY',
    ];

    public $table = 'employees';

    protected $dates = [
        'status_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'employee_no',
        'service_book_no',
        'application_no',
        'highest_qualification',
        'employment_status_id',
        'status_date',
        'group',
        'retirement_scheme',
        'employment_type',
        'leave_account_no',
        'pf_account_no',
        'personal_file_no',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function employment_status()
    {
        return $this->belongsTo(EmploymentStatus::class, 'employment_status_id');
    }

    public function getStatusDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStatusDateAttribute($value)
    {
        $this->attributes['status_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
