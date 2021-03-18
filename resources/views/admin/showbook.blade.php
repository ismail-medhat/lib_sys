@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Books Details</div>


                    <div class="card-body" style="font-size: 25px;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Book Name      : {{$book->name}}</p>
                        <p>Author Name    : {{$book->author_name}}</p>
                        <p>Edition Number : {{$book->edition_number}}<sup>nd</sup>ed.</p>

                        <p>Book Status    :
                            @if($book->isborrow == 0)
                                <span class="badge badge-pill badge-success">Available</span>
                            @else
                                <span class="badge badge-pill badge-warning">Not Available</span>
                            @endif
                        </p>
                        <p>Created At     :
                            @if($book->created_at == NULL)
                                <span class="text-danger">No Date Set</span>
                            @else
                                {{Carbon\Carbon::parse($book->created_at)->diffForHumans()}}
                            @endif
                        </p>
                        <p>Upduated At     :
                            @if($book->updated_at == NULL)
                                <span class="text-danger">No Update Yet</span>
                            @else
                                {{Carbon\Carbon::parse($book->updated_at)->diffForHumans()}}
                            @endif
                        </p>
                        <p>Book Borrow By :
                            @if($book->isborrow == 0)
                                <span class="badge badge-pill badge-warning">No borrowed yet</span>
                            @else
                                <span class="badge badge-pill badge-success">{{$book->users[0]['username']}}</span>
                                <span class="badge badge-pill badge-success">{{$book->users[0]['email']}}</span>
                            @endif
                        </p>

                        <a class="btn btn-primary" href="{{ route('admin.book') }}">
                            <i class="fas fa-arrow-circle-left"></i> Back</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


