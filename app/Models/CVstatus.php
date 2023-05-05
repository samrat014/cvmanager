<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CVstatus extends Model
{
    protected $table = 'c_vstatus';

    use HasFactory;

    protected $fillable = [
      'usercv_id', 'status', 'task', 'interview_date'
    ];


    public function usercv(): BelongsTo
    {
        return $this->belongsTo(UserCV::class);
    }
}
