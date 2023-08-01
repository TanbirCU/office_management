<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';
    use HasFactory;
    protected $fillable = [
        'mobile',
        'description',
        'image',
        'user_id',
        'designation',
        'joined_date',
    ];
}

