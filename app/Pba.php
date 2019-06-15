<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pba extends Model
{
    protected $fillable = ['project_name', 'board_name', 'content', 'wr_user'];
}
