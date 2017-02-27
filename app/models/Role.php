<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public function permissions(){
        return $this->belongsToMany('App\models\Permission');
    }
}
