<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProductTransaction
 *
 * @property int $id
 * @property int $product_id
 * @property string $invoices_number
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransaction whereInvoicesNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransaction whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransaction whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductTransaction extends Model
{
    protected $guarded = [];
    protected $table = 'product_transaction';

    
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
