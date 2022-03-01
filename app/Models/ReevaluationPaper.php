<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReevaluationPaper extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'reevaluation_papers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reevaluation_id',
        'examination_mark_id',
        'paper_id',
        'paper_code',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function reevaluation()
    {
        return $this->belongsTo(Reevaluation::class, 'reevaluation_id');
    }

    public function examination_mark()
    {
        return $this->belongsTo(ExaminationMark::class, 'examination_mark_id');
    }

    public function paper()
    {
        return $this->belongsTo(Paper::class, 'paper_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
