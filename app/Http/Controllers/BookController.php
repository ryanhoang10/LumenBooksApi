<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;

class BookController extends Controller
{
    use ApiResponser; 
    
    /**
     * Return the list of authors
     * @return Illuminate\Http\Response
     */
    public function index() 
    {
        $books = Book::all();

        return $this->successResponse($books);
    }

    /**
     * Create one new book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $rules = [
            'title'       => 'required|max:255',
            'description' => 'required|max:255',
            'price'       => 'required|min:1',
            'author_id'   => 'required|min:1',
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());

        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    /**
     * Obtains and show one book
     * @return Illuminate\Http\Response
     */
    public function show($book) 
    {
        $book = Book::findOrFail($book);

        return $this->successResponse($book);
    }

    /**
     * Updates an existing book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book) 
    {
        $rules = [
            'title'       => 'required|max:255',
            'description' => 'required|max:255',
            'price'       => 'required|min:1',
            'author_id'   => 'required|min:1',
        ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($book);

        $book->fill($request->all());

        if($book->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return $this->successResponse($book);
    }

    /**
     * Removes a book
     * @return Illuminate\Http\Response
     */
    public function destroy($book) 
    {
      $book = Book::findOrFail($book);

      $book->delete();

      return $this->successResponse($book);
    }

    /*
    * Obtain the full list of string form the string service
    * @return string
    */
    public function obtainBooks()
    {
        return $this->performRequest('GET', '/books');
    }

    /*
    * Create new book using the string service
    * @return string
    */
    public function createBook($data)
    {
        return $this->performRequest('POST', '/books', $data);
    }

    /*
    * Returns single string using the string service
    * @return string
    */
    public function obtainBook($book)
    {
        return $this->performRequest('POST', "/books/{$book}");
    }

    /*
    * Updates single string using the string service
    * @return string
    */
    public function editBook($data, $book)
    {
        return $this->performRequest('PUT', "/books/{$book}", $data);
    }

    /*
    * Removes single string using the string service
    * @return string
    */
    public function deleteBook($book)
    {
        return $this->performRequest('DELETE', "/books/{$book}");
    }
}
