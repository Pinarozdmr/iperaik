<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory;


    protected $fillable = [
        'image', 'name', 'address', 'phone', 'email', 'website',
    ];


    public function getLogoImageAttribute(): string
    {
        return Storage::url('company_logo/'.$this->image);

    }
}
