<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController; 


Route::get('books', [BookController::class, 'index' ]);
Route::get('books/search', [BookController::class, 'search' ]);
Route::get('books/filter/year', [BookController::class, 'filterByYear' ]);
Route::get('books/filter', [BookController::class, 'filterByPublisherAndAuthor' ]);
Route::get('books/range', [BookController::class, 'range']);
Route::get('books/sort', [BookController::class, 'sortByYear']);
