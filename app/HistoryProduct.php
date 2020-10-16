<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HistoryProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string $qty
 * @property string $qtyChange
 * @property string $tipe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct whereQtyChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct whereTipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HistoryProduct whereUserId($value)
 * @mixin \Eloquent
 */

class HistoryProduct extends Model
{
    protected $table = 'history_product';
    protected $fillable = ['product_id', 'user_id', 'qty', 'qtyChange', 'tipe'];
}
