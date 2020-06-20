<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use Zizaco\Entrust\EntrustPermission;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable=['name','display_name','description'];

}
