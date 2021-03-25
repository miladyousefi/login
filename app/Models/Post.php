<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory,Notifiable;
    protected $table='posts';

    protected $fillable = [
        'title', 'body', 'image','writer_id',
    ];


}
