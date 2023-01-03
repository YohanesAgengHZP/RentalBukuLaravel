<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class RentController extends Controller
{
    public function rentBooks()
    {
        $users = User::where('role_id','!=', '1')->where('status','!=', 'Inactive')->get();
        $books = Book::all();

        return view('books-rent',['users' => $users, 'books'=>$books]);

    }

    public function storeBooks(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        
        // dd($request->all());
        $bookStatus = Book::findOrFail($request->book_id)->only('status');

        if($bookStatus['status'] != 'in stock'){
            Session()->flash('message', 'Cannot rent, the book is not available');
            Session()->flash('alert-status', 'alert-danger');
            return redirect('book-rent');
        } else {
            $count = RentLogs::where('user_id',$request->user_id)->where('actual_return_date', null)->count();
            if($count >= 3){
                Session()->flash('message', 'Cannot rent, user have reach limit of rent books');
                Session()->flash('alert-status', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    //proses insert to rent_log table
                    
                    RentLogs::create($request->all());
                    //proses update book table
    
                    $books = Book::findorFail($request->book_id);
                    $books->status = 'Not Available';
                    $books->save();
                    DB::commit();
    
                    Session()->flash('message', 'Rent Succesfully');
                    Session()->flash('alert-status', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                } 
            }
            
        }

    }

    public function return()
    {
        $users = User::where('role_id','!=', '1')->where('status','!=', 'Inactive')->get();
        $books = Book::all();

        return view('books-return',['users' => $users, 'books'=>$books]);
    }

    public function saveReturn(Request $request)
    {
        // User dan buku yang dipilih benar maka berhasil return
        $rent = RentLogs::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
                ->where('actual_return_date', '=', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if($countData == 1){
            //return book
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            $book = Book::findOrFail($request->book_id);
            $book->status = 'in stock';
            $book->save();

            Session()->flash('message', 'Book returned succesfully');
            Session()->flash('alert-status', 'alert-success');
            return redirect('book-return');
            
        } else {
            //error notif
            Session()->flash('message', 'Book cannot be returned or already returned ');
            Session()->flash('alert-status', 'alert-danger');
            return redirect('book-return');
        }
        //jika user dan buku yang dipilih salah maka muncul error
    }
}
