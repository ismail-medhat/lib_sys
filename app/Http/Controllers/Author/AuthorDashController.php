<?php

namespace App\Http\Controllers\Author;

use App\Book;
use App\Http\Controllers\Controller;
use App\User;
use App\UserBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthorDashController extends Controller
{
    //
    public function index()
    {
        return view('author.dashboard');

    }

    public function getBook()
    {

        $allbook = Book::select()->paginate(PAGINATION_COUNT);
        return view('author.allbook',compact('allbook'));
    }

    // save borrowed book..
    public function borrowBook($book_id)
    {
        $book = Book::find($book_id);

        if ($book->isborrow == 0) {
            $save_book = UserBook::insert([
                'user_id' => Auth::id(),
                'book_id' => $book_id,
                'created_at' => Carbon::now(),
            ]);

            if ($save_book) {
                Book::find($book_id)->update([
                    'isborrow' => 1,
                ]);
                alert()->success('Book Borrowed Successful',$book->name);
                //toast('Course Saved Successfully','success');
                return redirect()->back();
            } else {

                toast('Saved Failed ! Try Again','warning');
                return redirect()->back();
            }
        }else {
            //alert()->warning('This Book Already Borrowed ! Try Later');
            toast('This Book Already Borrowed ! Try Later','warning');
            return redirect()->back();
        }


    }

    // get borrowed book..
    public function getBorrow()
    {
        $user = User::find(Auth::id());
        $allBookBorrow = $user->books;
        //return $allBookBorrow;
        return view('author.borrow_book',compact('allBookBorrow'));
    }


    // Delete Book
    public function deleteBorrowBook($book_id)
    {
        // Change book status from database
        Book::find($book_id)->update([
            'isborrow' => 0,
        ]);

        // delete book from userbook table database & Borrowed Book View..
        UserBook::where('book_id',$book_id)->delete();


        alert()->success('Book unborrowed Successfully');
        return redirect()->back();
    }




}
