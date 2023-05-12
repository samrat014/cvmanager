<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class UserCV extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'age',
            'phone',
            'email',
            'technology',
//            'level',
//            'salary',
            'experience',
//            'document',
//            'references',
                'address',

    ];

public function cvstatus(): HasOne
{
    return $this->hasOne(CVstatus::class, 'usercv_id');

}

}
