<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    const WEEK_DAYS = ['Lundi' ,'Mardi' , 'Mercredi' , 'Jeudi' ,'Vendredi' ,'Samedi', 'Dimanche' ];

    protected $table = 'timetables';

    protected $fillable = [
        'day',
        'subject_id',
        'teacher_id',
        'class_id',
        'start',
        'end',
        'duration'
    ];

    public function classes()
    {
        return $this->belongsTo(Classes::class, );
    }
    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
