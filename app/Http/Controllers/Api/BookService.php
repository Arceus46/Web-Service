<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookService extends Controller
{
    public function index()
    {
        $books = Book::all();

        return response()->json([
            'status'  => true,
            'message' => 'Data buku berhasil diambil',
            'data'    => $books,
        ], 200);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan',
                'data'    => null,
            ], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Data buku berhasil diambil',
            'data'    => $book,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'author' => 'required|string',
            'year'   => 'required|integer|min:1900',
            'stock'  => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first(),
                'data'    => null,
            ], 422);
        }

        $book = Book::create($validator->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Data buku berhasil ditambahkan',
            'data'    => $book,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan',
                'data'    => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'author' => 'required|string',
            'year'   => 'required|integer|min:1900',
            'stock'  => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first(),
                'data'    => null,
            ], 422);
        }

        $book->update($validator->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Data buku berhasil diperbarui',
            'data'    => $book,
        ], 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan',
                'data'    => null,
            ], 404);
        }

        $book->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Data buku berhasil dihapus',
            'data'    => null,
        ], 200);
    }
}