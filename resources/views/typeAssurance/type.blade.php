@extends('template')

@section('content')
    <button class="btn btn-success">Add</button>
    <table class="table table-stripped">
        <tr>
            <td>Id</td>
            <td>Libelle</td>
            <td>Actions</td>
        </tr>
        @foreach($types as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->libelle}}</td>
                <td>
                    <button class="btn btn-danger">Delete</button>
                    <button class="btn btn-primary">Update</button>
                </td>
            </tr>
        @endforeach

    </table>

@endsection
