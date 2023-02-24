<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelGet;

class Contact extends Model
{
    use HasFactory;
    use ModelGet;
}
