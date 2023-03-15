<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'user_id',
        'password',
        'photo',
        'email',
        'phone'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}