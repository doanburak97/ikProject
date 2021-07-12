<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @method static first()
 * @method static create(array $all)
 */
class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_id',
    ];

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

//    public function getEmployees(): array
//    {
//        return DB::table('companies')->select('id','first_name','last_name','email','phone','company_id')->get()->toArray();
//    }
}
