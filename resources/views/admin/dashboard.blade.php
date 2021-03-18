@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in! <span class="badge badge-success">{{ Auth::user()->name }}</span>
                            <br><hr><br>

                        <div style="font-size: 25px;">
                            <div class="row">
                                <div class="col-2">
                                    <p> All User <span class="badge badge-info">{{ App\User::count() - 1 }}</span></p>
                                </div>
                                <div class="col-2">
                                    <p> All Books <span class="badge badge-primary">{{ App\Book::count() }}</span></p>
                                </div>
                                <div class="col-4">
                                    <p> All Books Borrowed <span class="badge badge-success">{{ App\UserBook::count() }}</span></p>
                                </div>
                                <div class="col-4">
                                    <p> Books Available <span class="badge badge-danger">{{App\Book::count() - App\UserBook::count() }}</span></p>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

