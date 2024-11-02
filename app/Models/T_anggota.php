<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class T_anggota extends Authenticatable
{
    use HasFactory;

    protected $table = 't_anggotas';

    protected $primaryKey = 'f_id';

    protected $guarded = ['f_id' ];

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->f_password;
    }

    public function peminjaman() {
        return $this->hasOne(T_peminjaman::class, 'f_idanggota');
    } 
}
