<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'presences';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['schedule', 'student_id', 'presence', 'note'];

    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    
}
