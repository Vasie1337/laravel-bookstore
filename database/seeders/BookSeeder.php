<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'description' => 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, the novel depicts first-person narrator Nick Carraway\'s interactions with mysterious millionaire Jay Gatsby and Gatsby\'s obsession to reunite with his former lover, Daisy Buchanan.',
                'price' => 12.99,
                'stock' => 25,
                'isbn' => '9780743273565',
                'image' => 'books/gatsby.jpg',
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'description' => 'To Kill a Mockingbird is a novel by the American author Harper Lee. It was published in 1960 and was instantly successful. In the United States, it is widely read in high schools and middle schools. The story takes place during three years of the Great Depression in the fictional town of Maycomb, Alabama.',
                'price' => 14.99,
                'stock' => 30,
                'isbn' => '9780061120084',
                'image' => 'books/mockingbird.jpg',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Nineteen Eighty-Four (also stylised as 1984) is a dystopian social science fiction novel and cautionary tale written by English writer George Orwell. It was published on 8 June 1949 by Secker & Warburg as Orwell\'s ninth and final book completed in his lifetime.',
                'price' => 11.99,
                'stock' => 15,
                'isbn' => '9780451524935',
                'image' => 'books/1984.jpg',
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'description' => 'Pride and Prejudice is an 1813 romantic novel of manners written by Jane Austen. The novel follows the character development of Elizabeth Bennet, the dynamic protagonist of the book who learns about the repercussions of hasty judgments and comes to appreciate the difference between superficial goodness and actual goodness.',
                'price' => 9.99,
                'stock' => 20,
                'isbn' => '9780141439518',
                'image' => 'books/pride.jpg',
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'description' => 'The Hobbit, or There and Back Again is a children\'s fantasy novel by English author J. R. R. Tolkien. It was published on 21 September 1937 to wide critical acclaim, being nominated for the Carnegie Medal and awarded a prize from the New York Herald Tribune for best juvenile fiction.',
                'price' => 15.99,
                'stock' => 40,
                'isbn' => '9780547928227',
                'image' => 'books/hobbit.jpg',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
} 