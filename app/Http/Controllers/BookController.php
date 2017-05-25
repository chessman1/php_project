<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::orderBy('name')->paginate(5);
        return view('books')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('create_book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'pic' => 'required|mimes:png,jpeg'
        ]);

        $name = $request->input('name');
        $author_id = $request->input('author_id');
        $categories = $request->input('categories');
        $pic = $request->file('pic')->getClientOriginalName();

        // Book::create([
        //    'name' => $name,
        //    'author_id' => $author_id,
        //    'category_id' => $category_id,
        //    'pic' => $pic
        // ]);

        $book = new Book;

        $book->name = $name;
        $book->author_id = $author_id;
     
        $book->pic = $pic; 
 
        $book->save();

        $book->categories()->sync($categories);
            
        return redirect()->route('bookCRUD.index')
            ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $book = Book::find($id);
      return view('edit_book')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'name' => 'required'
        ]);

        Book::find($id)->update($request->all());
        return redirect()->route('bookCRUD.index')
            ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
            return redirect()->route('bookCRUD.index')
                ->with('success','Item deleted successfully');
    }

}
