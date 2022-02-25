<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchScholar extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const PAPER_1_SELECT = [
        'Research Methodology' => 'Research Methodology',
    ];

    public const STATUS_SELECT = [
        'Full Time' => 'Full Time',
        'Part Time' => 'Part Time',
        'EX'        => 'EX',
    ];

    public const PAPER_1_RESULT_SELECT = [
        'Fail'     => 'Fail',
        'Pass'     => 'Pass',
        'Pursuing' => 'Pursuing',
    ];

    public const PAPER_2_RESULT_SELECT = [
        'Fail'     => 'Fail',
        'Pass'     => 'Pass',
        'Pursuing' => 'Pursuing',
    ];

    public const PAPER_3_RESULT_SELECT = [
        'Fail'     => 'Fail',
        'Pass'     => 'Pass',
        'Pursuing' => 'Pursuing',
    ];

    public const PAPER_4_RESULT_SELECT = [
        'Fail'     => 'Fail',
        'Pass'     => 'Pass',
        'Pursuing' => 'Pursuing',
    ];

    public const NET_JRF_SELECT = [
        'JRF'     => 'JRF',
        'NET'     => 'NET',
        'Non-NET' => 'Non-NET',
        'Other'   => 'Other',
    ];

    public $table = 'research_scholars';

    protected $dates = [
        'bos_date',
        'casr_date',
        'pre_submission_date',
        'submission_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'registration_id',
        'status',
        'supervisor_id',
        'co_supervisor_name',
        'co_supervisor_address',
        'research_topic',
        'net_jrf',
        'bos_date',
        'casr_date',
        'paper_1',
        'paper_1_result',
        'paper_2',
        'paper_2_result',
        'paper_3',
        'paper_3_result',
        'paper_4',
        'paper_4_result',
        'pre_submission_date',
        'submission_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registration()
    {
        return $this->belongsTo(ExamRegistration::class, 'registration_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }

    public function getBosDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBosDateAttribute($value)
    {
        $this->attributes['bos_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCasrDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCasrDateAttribute($value)
    {
        $this->attributes['casr_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPreSubmissionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPreSubmissionDateAttribute($value)
    {
        $this->attributes['pre_submission_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSubmissionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSubmissionDateAttribute($value)
    {
        $this->attributes['submission_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
