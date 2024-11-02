<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_detailpeminjaman extends Model
{
    use HasFactory;

    protected $table = 't_detailpeminjamans';

    protected $primaryKey = 'f_id';

    protected $guarded = ['f_id' ];

    public $timestamps = false;

    public function peminjaman() {
        return $this->belongsTo(T_peminjaman::class, 'f_idpeminjaman');
    }

    public function detailbuku() {
        return $this->belongsTo(T_detailbuku::class, 'f_iddetailbuku');
    }
}
