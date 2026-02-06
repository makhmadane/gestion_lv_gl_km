@extends('template')

@section('content')
<a class="btn btn-success" href="{{route('addAssurance')}}">Add</a>
    <table class="table table-stripped">
        <tr>
            <td>Id</td>
            <td>Libelle</td>
            <td>Montant</td>
            <td>Actions</td>
        </tr>
        @foreach($assurances as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->libelle}}</td>
                <td>{{$a->montant}}</td>
                <td>{{$a->category->libelle}}</td>
                <td>
                    <form action="{{route('deleteAssurance',[$a->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                    <button class="btn btn-primary">Update</button>
                </td>
            </tr>
        @endforeach

    </table>
    {{$assurances->links()}}
@endsection
