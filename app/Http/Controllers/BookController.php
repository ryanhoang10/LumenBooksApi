<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Create one new book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) 
    {

    }

    /**
     * Obtains and show one book
     * @return Illuminate\Http\Response
     */
    public function show($book) 
    {
  
    }

    /**
     * Updates an existing book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book) 
    {

    }

    /**
     * Removes a book
     * @return Illuminate\Http\Response
     */
    public function destroy($book) 
    {
      
    }
}
