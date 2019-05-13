<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcb_list extends Model
{
    protected $fillable = ['board_name','top_num','bot_num','unit','note'];
}
