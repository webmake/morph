<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Reader
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Reader whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reader whereName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReaderBook[] $cards
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReaderBook[] $books
 */
class Reader extends Model
{
    /** @var bool */
    public $timestamps = false;
    /** @var array */
    protected $fillable = [
        'name',
    ];

    /**
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(ReaderBook::class);
    }
}
