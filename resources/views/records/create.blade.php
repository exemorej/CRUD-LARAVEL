@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center my-5">
            {{ isset($record) ? 'EDIT USER' : 'ADD USER' }}
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card pb-3">
                    <div class="card-header bg-dark text-white text-center">USER INFORMATION</div>
                    <div class="card-body">
                        <form action="{{ isset($record) ? route('records.update', $record->id) : route('records.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($record))
                                @method('PUT')
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="form-group mb-2">
                                <label for="fname" style="margin-bottom:0">FIRST NAME</label>
                                <input type="text" class="form-control" id="fname" name="fname" autocomplete="off"
                                    value="{{ isset($record) ? $record->fname : old('fname') }}" autofocus>
                            </div>
                            <div class="form-group mb-2">
                                <label for="lname" style="margin-bottom:0">LAST NAME</label>
                                <input type="text" class="form-control" id="lname" name="lname" autocomplete="off"
                                    value="{{ isset($record) ? $record->lname : old('lname') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" style="margin-bottom:0">EMAIL ADDRESS</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                                    value="{{ isset($record) ? $record->email : old('email') }}">
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="btn btn-primary col-12">{{ isset($record) ? 'SAVE CHANGES' : 'CREATE USER' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
