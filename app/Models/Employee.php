<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

/**
 * @method static first()
 * @method static create(array $all)
 * @property mixed rules
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

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public static function getEmployees(): array
    {
        return DB::table('employees')->select('id','first_name','last_name','email','phone','company_id')->get()->toArray();
    }
}
