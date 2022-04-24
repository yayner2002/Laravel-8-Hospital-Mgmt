<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    public $table='doctors'; 
    protected $fillable = [
        'name',
        'phone',
        'speciality',
        'room',
        'image'
    ];
}