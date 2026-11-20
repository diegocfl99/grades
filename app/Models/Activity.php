<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'subject_id',
        'tipo',
        'calificacion',
        'fecha',
        'observaciones'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}