<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::all();
        return view('books',['book' => $book]);
    }

    public function addBooks()
    {
        $categories = Category::all();
        return view('books-add',['categories' => $categories]);
    }

    public function createBooks(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255'

        ]);

        $newName = '';
        if($request->file('image')){ //upload image and rename 
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);

        return redirect('books')->with('status', 'Book Added Sucessfully'); 
    }

    public function editBooks($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('books-edit',['categories'=>$categories, 'book'=>$book]);
    }

    public function updateBooks(Request $request, $slug)
    {
        if($request->file('image')){ //upload image and rename 
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $book = Book::where('slug',$slug)->first();
        $book->update($request->all());

        
        if($request->categories){
            $book->categories()->sync($request->categories); 
         }

        return redirect('books')->with('status', 'Books Updated Sucessfully');

    }

    public function deleteBooks($slug)
    {
        $book = Book::where('slug',$slug)->first();
        return view('books-delete',['book' => $book]);
    }

    public function destroyBooks($slug)
    {
        $book = Book::where('slug',$slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book Deleted Sucessfully');
    }

    public function deletedBooks()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('book-deleted-list',['deletedBooks' => $deletedBooks]);
    }

    public function restoreBooks($slug)
    {
        $restoreBooks = Book::withTrashed()->where('slug',$slug)->first();
        $restoreBooks->restore();
        return redirect('books')->with('status', 'Category Restored Sucessfully');
    }

}
