<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionCharge extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'admission_charges';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'course_id',
        'boys_nr_external',
        'boys_nr_internal',
        'boys_resident_external',
        'boys_resident_internal',
        'girls_nr_external',
        'girls_nr_internal',
        'girls_resident_external',
        'girls_resident_internal',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
