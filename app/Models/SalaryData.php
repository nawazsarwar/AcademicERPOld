<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryData extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'salary_datas';

    protected $dates = [
        'import_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'ecode',
        'emp_name',
        'first_name',
        'middle_name',
        'last_name',
        'pay_grade',
        'basic',
        'pan_no',
        'desig_name',
        'dept_name',
        'emp_status',
        'date_of_join',
        'sex',
        'date_of_birth',
        'retire_date',
        'pf_type',
        'emp_grop',
        'leave',
        'designation_category',
        'exists_cc',
        'import_date',
        'salary_month',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImportDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setImportDateAttribute($value)
    {
        $this->attributes['import_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
