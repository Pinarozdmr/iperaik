<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'firstname',
        'lastname',
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
        return DB::table('employees')->select('id','firstname','lastname','email','phone','company_id')->get()->toArray();
    }
}
