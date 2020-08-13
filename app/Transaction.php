<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $guarded = [];

    protected $primaryKey = 'invoices_number';
    public $incrementing = false;
    protected $keyType = 'string';

     public function productTransaction(){
        return $this->hasMany(ProductTransaction::class,'invoices_number','invoices_number');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
