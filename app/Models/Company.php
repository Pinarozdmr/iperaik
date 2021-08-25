<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory,Notifiable;


    protected $fillable = [
        'image', 'name', 'email', 'website','phone','address'
    ];

    public function getLogoImageAttribute(): string
    {
        return Storage::url('company_logo/'.$this->image);

    }
    public static function getCompany(): array
    {
        return DB::table('companies')->select('id','image','name','email','website','phone','address')->get()->toArray();
    }

//    public static function getCompany()
//    {
//       $records = DB::table('companies')->select('name', 'email', 'website','phone','address')->get()->toArray();
//       return $records;
//    }
}
