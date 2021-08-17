<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = ['nama', 'jabatan', 'umur', 'email', 'alamat', 'no_hp'];
}
