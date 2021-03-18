@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Users

                        <a style="color: #FFF;"
                           class="float-right btn btn-primary"
                           href="{{route('admin.dashboard')}}">
                            <i class="fas fa-arrow-circle-left"></i>  Back To Dashboard
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
                                <th scope="col">Name</th>
                                <th scope="col">Users Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Book Borrow</th>
                                <th scope="col">Created At</th>

                            </tr>
                            </thead>
                            <tbody style="font-size: 22px;">


                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $users->firstItem()+$loop->index }}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach($user->books as $user_book)
                                            @if(!$user->books)
                                                <span class="badge badge-pill badge-warning">No book borrowed yet</span>
                                            @else
                                                <span class="badge badge-pill badge-success">{{$user_book->name}}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($user->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                        @else
                                            {{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>


                        {{ $users->links()}}





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



