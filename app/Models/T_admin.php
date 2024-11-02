<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class T_admin extends Authenticatable
{
    use HasFactory;

    protected $table = 't_admins';

    protected $primaryKey = 'f_id';

    protected $guarded = ['f_id'];

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->f_password;
    }

    public function peminjaman() {
        return $this->hasOne(T_peminjaman::class, 'f_idadmin');
    } 
}
