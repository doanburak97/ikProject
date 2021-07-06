<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'companies';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'logo',
        'website',
    ];

}
