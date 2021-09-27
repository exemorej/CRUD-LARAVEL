@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <table class="table text-center">
            <h1 class="text-center my-5">VIEW RECORDS</h1>
            <thead class="table-dark">
                <tr>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    @auth
                        <th>ACTION</th>
                    @endauth

                </tr>
            </thead>
            <tbody class="align-middle table-hover">
                @foreach ($records as $record)
                    <tr>
                        <td>{{ ucwords($record->fname) }}</td>
                        <td>{{ ucwords($record->lname) }}</td>
                        <td>{{ $record->email }}</td>
                        @auth
                            <td>
                                <a href="{{ route('records.edit', $record->id) }}" class="btn btn-warning btn-sm">EDIT</a>
                                <form action="{{ route('records.destroy', $record->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ">DELETE</button>
                                </form>
                            </td>
                        @endauth

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$records->links()}}
    </div>

    @if (session()->has('success'))
        <div class="position-fixed bottom-0 start-0 p-3 " style="z-index: 11">
            <div class="toast hide text-black bg-white" id="myBtn" role="alert" aria-live="assertive" aria-atomic="true"
                style="border:3px solid green;">
                <div class="d-flex">
                    <div class="toast-body"><i class="fa fa-check-circle"
                            style="margin-right:.25rem; color:green;"></i><span>{{ session()->get('success') }}<span>
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif



@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>
@endsection
