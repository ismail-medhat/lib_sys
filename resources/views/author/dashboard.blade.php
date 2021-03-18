@php
    $user = \App\User::find(Auth::id());

@endphp
@extends('layouts.author')

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
                                        <p> All Books <span class="badge badge-info">{{ App\Book::count() }}</span></p>
                                    </div>
                                    <div class="col-10">

                                        <p> All the books that I borrowed :
                                            @foreach($user->books as $user_book)
                                                @if($user_book)
                                                    <span class="badge badge-secondary">{{ $user_book->name }}</span>
                                                @else
                                                    <span class="badge badge-warning">No Book Borrowed yet</span>
                                                @endif
                                            @endforeach
                                        </p>

                                    </div>

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


