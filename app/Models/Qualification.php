<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualification extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'qualifications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'qualification_level_id',
        'name',
        'year',
        'roll_no',
        'board_id',
        'result',
        'percentage',
        'cdn_url',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function qualification_level()
    {
        return $this->belongsTo(QualificationLevel::class, 'qualification_level_id');
    }

    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
