<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boardname extends Model
{
     protected $fillable = ['boardname', 'top_num', 'bot_num', 'method', 'note'];
}
