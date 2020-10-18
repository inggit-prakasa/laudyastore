<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Colour
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Colour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Colour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Colour query()
 * @method static \Illuminate\Database\Eloquent\Builder|Colour whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Colour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Colour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Colour whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Colour whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Colour extends Model
{
    protected $table = 'colour';
    protected $fillable = ['name', 'code'];
}
