<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'created_by',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
