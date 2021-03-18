@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Book Information</div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.updatebook',$book->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $book->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="author_name" class="col-md-4 col-form-label text-md-right">{{ __('Author Name') }}</label>

                                <div class="col-md-6">
                                    <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ $book->author_name }}" required autocomplete="author_name" autofocus>

                                    @error('author_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="edition_number" class="col-md-4 col-form-label text-md-right">{{ __('Edition Number') }}</label>

                                <div class="col-md-6">
                                    <input id="edition_number" type="string" class="form-control @error('edition_number') is-invalid @enderror" name="edition_number" value="{{ $book->edition_number }}" required autocomplete="edition_number">

                                    @error('edition_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> {{ __('Update Book') }}
                                    </button>
                                    <a href="{{ route('admin.book')}}" class="btn btn-primary">
                                        <i class="fas fa-arrow-circle-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                            </div>

                        </form>






                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



