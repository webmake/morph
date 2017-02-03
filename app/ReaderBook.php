<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\ReaderBook
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $reader_id
 * @property int $book_id
 * @method static \Illuminate\Database\Query\Builder|\App\ReaderBook whereBookId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ReaderBook whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ReaderBook whereReaderId($value)
 */
class ReaderBook extends Model
{
    /** @var bool */
    public $timestamps = false;
    /** @var array */
    protected $fillable = [
        'reader_id',
        'book_id',
    ];

    /**
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
