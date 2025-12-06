<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title'     => 'Laskar Pelangi',
            'author'    => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'year'      => 2005,
        ]);

        Book::create([
            'title'     => 'Sang Pemimpi',
            'author'    => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'year'      => 2006,
        ]);

        Book::create([
            'title'     => 'The Hobbit',
            'author'    => 'J. R. R. Tolkien',
            'publisher' => 'George Allen & Unwin',
            'year'      => 1937,
        ]);

        Book::create([
            'title'     => 'The Lord of the Rings',
            'author'    => 'J. R. R. Tolkien',
            'publisher' => 'George Allen & Unwin',
            'year'      => 1954,
        ]);

        Book::create([
            'title'     => 'Harry Potter and the Philosopher\'s Stone',
            'author'    => 'J. K. Rowling',
            'publisher' => 'Bloomsbury',
            'year'      => 1997,
        ]);

        Book::create([
            'title'     => 'Harry Potter and the Chamber of Secrets',
            'author'    => 'J. K. Rowling',
            'publisher' => 'Bloomsbury',
            'year'      => 1998,
        ]);

        Book::create([
            'title'     => 'To Kill a Mockingbird',
            'author'    => 'Harper Lee',
            'publisher' => 'J. B. Lippincott & Co.',
            'year'      => 1960,
        ]);

        Book::create([
            'title'     => 'Go Set a Watchman',
            'author'    => 'Harper Lee',
            'publisher' => 'HarperCollins',
            'year'      => 2015,
        ]);

        Book::create([
            'title'     => '1984',
            'author'    => 'George Orwell',
            'publisher' => 'Secker & Warburg',
            'year'      => 1949,
        ]);
        
        Book::create([
            'title'     => 'Animal Farm',
            'author'    => 'George Orwell',
            'publisher' => 'Secker & Warburg',
            'year'      => 1945,
        ]);
    }
}
