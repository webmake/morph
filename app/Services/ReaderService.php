<?php

namespace App\Services;

use App\Reader;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ReaderService
 * @package App\Services
 */
class ReaderService
{
    /**
     * @return Collection
     */
    public function getReaderBooks(Reader $reader): Collection
    {
        $books = $reader->books->load(['book.featuredBook']);
        return $books->featuredBook;
    }

    /**
     * @return Collection
     */
    public function getReaderBooksSeparated(Reader $reader): Collection
    {
        $books = $reader->books->load(['book']);
        $books->load(['book.featuredBook']);
        return $books->featuredBook;
    }
}
