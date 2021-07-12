<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

/**
 * @method static create(array $input)
 */
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

    public static function getCompanies(): array
    {
        return DB::table('companies')->select('id','name','address','phone','email','logo','website')->get()->toArray();
    }

}
