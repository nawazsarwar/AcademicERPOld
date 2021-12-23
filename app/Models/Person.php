<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const DISABILITY_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public const GENDER_SELECT = [
        'Male'   => 'Male',
        'Female' => 'Female',
    ];

    public const DISABILITY_TYPE_SELECT = [
        'Physical Disability' => 'Physical Disability',
        'Visual Disability'   => 'Visual Disability',
    ];

    public const MARITAL_STATUS_SELECT = [
        'UNMARRIED' => 'UNMARRIED',
        'MARRIED'   => 'MARRIED',
        'WIDOW'     => 'WIDOW',
        'WIDOWER'   => 'WIDOWER',
        'SEPARATED' => 'SEPARATED',
        'DIVORCED'  => 'DIVORCED',
    ];

    public $table = 'people';

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'fathers_first_name',
        'fathers_middle_name',
        'fathers_last_name',
        'mothers_first_name',
        'mothers_middle_name',
        'mothers_last_name',
        'dob',
        'gender',
        'blood_group',
        'disability',
        'disability_type',
        'aadhaar_no',
        'religion_id',
        'caste_id',
        'sub_caste',
        'nationality_id',
        'domicile_province_id',
        'identity_marks',
        'status',
        'dob_proof',
        'marital_status',
        'spouse_name',
        'pan_no',
        'passport_no',
        'verified',
        'verified_by_id',
        'user_id',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }

    public function caste()
    {
        return $this->belongsTo(Caste::class, 'caste_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Country::class, 'nationality_id');
    }

    public function domicile_province()
    {
        return $this->belongsTo(Province::class, 'domicile_province_id');
    }

    public function verified_by()
    {
        return $this->belongsTo(User::class, 'verified_by_id');
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
