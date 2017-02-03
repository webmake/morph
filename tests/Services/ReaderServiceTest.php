<?php

namespace Tests\Services;

use App\ActionBook;
use App\Book;
use App\Reader;
use App\ReaderBook;
use App\Services\ReaderService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class ReaderServiceTest
 * @package Tests\Services
 */
class ReaderServiceTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function success_get_reader_books()
    {
        $times = 8;
        $reader = $this->getReaderWithBooks($times);

        $readerFeaturedBook = app(ReaderService::class)->getReaderBooks($reader);

        $this->assertCount($times, $readerFeaturedBook);
    }

    /**
     * @test
     */
    public function success_get_reader_books_separated()
    {
        $times = 8;
        $reader = $this->getReaderWithBooks($times);

        $readerFeaturedBook = app(ReaderService::class)->getReaderBooksSeparated($reader);

        $this->assertCount($times, $readerFeaturedBook);
    }

    /**
     * @return Reader
     */
    private function getReaderWithBooks($times): Reader
    {
        /** @var Reader $reader */
        $reader = factory(Reader::class)->create()->first();
        $actionBooks = factory(ActionBook::class, $times)->create();
        $actionBooks->each(function (ActionBook $actionBook) use ($reader) {
            $books = factory(Book::class)->create([
                'featured_book_id' => $actionBook->id,
            ]);
            $books->each(function (Book $book) use ($reader) {
                factory(ReaderBook::class)->create([
                    'book_id' => $book->id,
                    'reader_id' => $reader->id,
                ]);
            });
        });
        return $reader;
    }
}
