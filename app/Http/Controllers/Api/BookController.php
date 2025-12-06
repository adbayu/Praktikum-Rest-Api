<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'paginate' => 'nullable|integer|min:1|max:10',
        ], [
            'paginate.integer' => 'The paginate field must be a positive integer.',
            'paginate.min' => 'The paginate field must be at least 1.',
            'paginate.max' => 'The paginate field may not be greater than 10.',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation error', $validator->errors());
        }

        $perPage = (int) $request->query('paginate', 10);

        return $this->successResponse(Book::paginate($perPage));
    }

    public function search(Request $request)
    {
        $title = $request->query('title');

        $books = Book::when($title, function ($query, $title) {
            $query->where('title', 'like', '%' . $title . '%');
        })->get();

        return $this->successResponse($books);
    }

    public function filterByYear(Request $request)
    {
        $year = $request->query('year');

        $books = Book::when($year, fn ($query, $year) => $query->where('year', $year))->get();

        return $this->successResponse($books);
    }

    public function filterByPublisherAndAuthor(Request $request)
    {
        $publisher = $request->query('publisher');
        $author = $request->query('author');

        $books = Book::query()
            ->when($publisher, fn ($query, $publisher) => $query->where('publisher', $publisher))
            ->when($author, fn ($query, $author) => $query->where('author', $author))
            ->get();

        return $this->successResponse($books);
    }

    public function range(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $books = Book::query()
            ->when($start, fn ($query, $start) => $query->where('year', '>=', $start))
            ->when($end, fn ($query, $end) => $query->where('year', '<=', $end))
            ->get();

        return $this->successResponse($books);
    }

    public function sortByYear(Request $request)
    {
        $order = strtolower($request->query('order', 'asc'));
        $order = in_array($order, ['asc', 'desc']) ? $order : 'asc';

        $books = Book::orderBy('year', $order)->get();

        return $this->successResponse($books);
    }

    private function successResponse($data, string $message = 'Data retrieved successfully', int $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $status);
    }

    private function errorResponse(string $message, $errors = [], int $status = 422)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => [
                'errors' => $errors,
            ],
        ], $status);
    }
}
