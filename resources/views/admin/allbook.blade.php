@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Books

                        <a style="color: #FFF;"
                           class="float-right btn btn-primary"
                           href="{{route('admin.addbook')}}">
                            <i class="fas fa-plus-octagon"></i>  Add Book
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
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody style="font-size: 22px;">


                                @foreach($allbook as $book)
                                    <tr>
                                        <td>{{ $allbook->firstItem()+$loop->index }}</td>
                                        <td>{{$book->name}}</td>
                                        <td>{{$book->author_name}}</td>
                                        <td>{{$book->edition_number}}<sup>nd</sup>ed.</td>
                                        <td>
                                            @if($book->isborrow == 0)
                                                <span class="badge badge-pill badge-success">Available</span>
                                            @else
                                                <span class="badge badge-pill badge-warning">Not Available</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if($book->created_at == NULL)
                                                <span class="text-danger">No Date Set</span>
                                            @else
                                                {{Carbon\Carbon::parse($book->created_at)->diffForHumans()}}
                                            @endif
                                        </td>


                                        <td>

                                            <a href="{{route('admin.showbook',$book -> id)}}"
                                               class="btn btn-success btn-min-width box-shadow-3 mr-1 mb-1">
                                                <i class="fa fa-eye"></i></a>

                                            <a href="{{route('admin.editbook',$book -> id)}}"
                                               class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                                <i class="fa fa-edit"></i></a>

                                            <a href="{{route('admin.deletebook',$book -> id)}}"
                                               class="remove-course btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1"
                                               onclick="return confirm('Are you sure to delete')">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>


                            {{ $allbook->links()}}





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


