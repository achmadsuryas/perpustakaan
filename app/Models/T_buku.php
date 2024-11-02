<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_buku extends Model
{
    use HasFactory;

    protected $table = 't_bukus';

    protected $primaryKey = 'f_id';

    protected $guarded = ['f_id' ];

    public $timestamps = false;

    public function kategori (){
        return $this->belongsTo(T_kategori::class, 'f_idkategori', 'f_id');
    }

    public function detailbuku (){
        return $this->hasOne(T_detailbuku::class, 'f_idbuku', 'f_id');
    }
}
