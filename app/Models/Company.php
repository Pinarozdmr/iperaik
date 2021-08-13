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

    protected $table = 'companies';
    public $timestamps=true;

    protected $fillable = [
        'image', 'name', 'email', 'website','phone','address'
    ];


    public function getLogoImageAttribute(): string
    {
        return Storage::url('company_logo/'.$this->image);

    }
    public static function getCompanies(): array
    {
        return DB::table('companies')->select('image','name','email','website','phone','address')->get()->toArray();
    }
}
