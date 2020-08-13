<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryProduct extends Model
{
    protected $table = 'history_product';
    protected $fillable = ['product_id', 'user_id', 'qty', 'qtyChange', 'tipe'];
}
