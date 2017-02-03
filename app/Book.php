<?php

namespace App;

use App\Contracts\Entities\FeaturedBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Book
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $book_type
 * @property int $featured_book_id
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereBookType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereFeaturedBookId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereId($value)
 */
class Book extends Model
{
    /** @var bool */
    public $timestamps = false;
    /** @var array */
    protected $fillable = [
        'book_type',
        'featured_book_id',
    ];
    /** @var FeaturedBook */
    private $featuredBook;

    /**
     * @return FeaturedBook
     * @throws \Exception
     */
    public function featuredBook(): FeaturedBook
    {
        if (!$this->featuredBook) {
            // here now object is null, even relation succeeded
            if (empty($this->original) && $this->exists == false) {
                throw new \Exception('Proof of failure morph relation');
            }
            $this->featuredBook = $this->book()->getResults();
        }
        return $this->featuredBook;
    }

    /**
     * @return MorphTo
     */
    private function book(): MorphTo
    {
        return $this->morphTo(null, null, 'featured_card_id');
    }
}
