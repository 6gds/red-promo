<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    public $fillable = ['email', 'tel', 'name', 'message'];

    // public static function create($req){
    //     self::create([
    //         'name' => 'Flight 10',
    //     ]);
    // }
}
