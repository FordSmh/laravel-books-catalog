<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BookResource;
use Illuminate\Http\Response;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $products = Book::all();
        return BookResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return BookResource | Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'publish_date' => 'required',
            'description'  => 'required',
            'authors' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $book = new Book;

        $book->title = $request->title;
        $book->description = $request->description;
        $book->publish_date = $request->publish_date;
        $book->save();

        $authors = Author::where('id', $request->authors)->get();
        $book->authors()->attach($authors);

        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $product
     * @return BookResource
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return BookResource | Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'publish_date' => 'required',
            'description'  => 'required',
            'authors' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $book->title = $request->title;
        $book->description = $request->description;
        $book->publish_date = $request->publish_date;

        $book->authors()->detach($book->authors);
        $book->authors()->attach($request->authors);

        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return BookResource
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return new BookResource($book);
    }
}
