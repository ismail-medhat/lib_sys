<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');

    }

    public function getBooks()
    {

        $allbook = Book::select()->paginate(PAGINATION_COUNT);
        return view('admin.allbook',compact('allbook'));
    }

    public function showBook($book_id)
    {
          $book = Book::find($book_id);
          return view('admin.showbook',compact('book'));
    }

    public function addBook()
    {
        return view('admin.addbook');
    }

    // Save Book in Database..
    public function saveBook(Request $request)
    {
        $validateDate =  $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'author_name' => ['required', 'string', 'max:255'],
            'edition_number' => ['required', 'integer', 'max:5'],

        ]);


        // Use query builder
        $book = DB::table('books')
            ->insert([
                'name' => $request->name,
                'author_name' => $request->author_name,
                'edition_number' => $request->edition_number,
                'created_at' => Carbon::now(),

            ]);

        if ($book) {
            alert()->success('Book Saved Successful',$request->name);
            //toast('Course Saved Successfully','success');
            return redirect()->back();
        } else {

            toast('Saved Failed ! Try Again','warning');
            return redirect()->back();
        }


    }

    // Edit Book Info
    public function editBook($book_id)
    {
        $book = Book::find($book_id);
        return view('admin.editbook',compact('book'));
    }

    // Update Book Info
    public function updateBook(Request $request,$book_id)
    {
        $validateDate =  $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'author_name' => ['required', 'string', 'max:255'],
            'edition_number' => ['required', 'integer', 'max:5'],

        ]);

        $book = Book::find($book_id)->update([
            'name' => $request->name,
            'author_name' => $request->author_name,
            'edition_number' => $request->edition_number,
            'update_at' => Carbon::now(),
        ]);

        if ($book) {
            alert()->success('Book Updated Successful',$request->name);
            //toast('Course Saved Successfully','success');
            return redirect()->back();
        } else {

            toast('Saved Failed ! Try Again','warning');
            return redirect()->back();
        }
    }


    // Delete Book
    public function deleteBook($book_id)
    {
        // delete Book if book not borrowed from database.
        $book = Book::find($book_id);
        if ($book->isborrow == 0)
        {
            Book::find($book_id)->delete();

            alert()->success('Book Deleted Successfully');
            return redirect()->back();
        }else {
            alert()->warning('Can\'t Delete This Book');
            return redirect()->back();
        }

    }


    // Get All Users
    public function getUser()
    {
        $users = User::select()->where('role_id',2)->paginate(PAGINATION_COUNT);
        return view('admin.alluser',compact('users'));
    }



}
