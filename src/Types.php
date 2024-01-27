<?php

namespace MatinUtils\TypesTracker;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $connection = 'common';
    protected $hidden = ['created_at', 'updated_at'];
}
