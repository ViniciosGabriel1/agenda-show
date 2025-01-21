<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'schedule';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'patient_name',
        'document',
        'patient_contact',
        'service',
        'appointment_date',
        'queue_number',
        'patient_notes'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'appointment_date' => 'date',
    ];
}
