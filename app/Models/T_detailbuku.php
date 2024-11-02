<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_detailbuku extends Model
{
    use HasFactory;

    protected $table = 't_detailbukus';

    protected $primaryKey = 'f_id';

    protected $guarded = ['f_id' ];

    public $timestamps = false;

    public function buku(){
        return $this->belongsTo(T_buku::class, 'f_idbuku', 'f_id');
    } 
}
