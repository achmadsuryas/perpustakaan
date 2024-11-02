<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class T_kategori extends Authenticatable
{
    use HasFactory;

    protected $table = 't_kategoris';

    protected $primaryKey = 'f_id';

    protected $guarded = ['f_id' ];

    public $timestamps = false;

    public function buku()
    {
        return $this->hasMany(T_buku::class, 'f_idkategori', 'f_id');
    }

}
