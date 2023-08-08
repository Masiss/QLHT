<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $primaryKey = ['child_id', 'subject_id'];
    public $incrementing = false;
    protected $fillable = [
        'child_id',
        'subject_id',
        'daily',
        'weekly',
        'midSem',
        'endSem',
    ];

    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id', 'id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}
