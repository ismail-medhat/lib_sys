@extends('layouts.author')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Books

                        <a style="color: #FFF;"
                           class="float-right btn btn-secondary"
                           href="{{route('author.allbook')}}">
                            <i class="fas fa-arrow-circle-left"></i>  Back To All Books
                        </a>

                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <table class="table table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Author Name</th>
                                <th scope="col">Edition Number</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 22px;">
                            @php($i=1)
                        @if(isset($allBookBorrow) && $allBookBorrow->count() >0)
                            @foreach($allBookBorrow as $book)
                                <tr>

                                    <td>{{$i++}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->author_name}}</td>
                                    <td>{{$book->edition_number}}<sup>nd</sup>ed.</td>
                                    <td>
                                        @if($book->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                        @else
                                            {{Carbon\Carbon::parse($book->created_at)->diffForHumans()}}
                                        @endif
                                    </td>


                                    <td>

                                        <a href="{{route('author.delete-borrow',$book -> id)}}"
                                           class="btn btn-info btn-min-width box-shadow-3 mr-1 mb-1">
                                            <i class="fal fa-book"></i> unborrow</a>

                                    </td>
                                </tr>
                            @endforeach
                        @endif

                            </tbody>

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


