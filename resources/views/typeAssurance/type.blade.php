@extends('template')

@section('content')

    <a class="btn btn-success" href="{{route('typeAssurance.create')}}">Add</a>
    <table class="table table-stripped">
        <tr>
            <td>Photo</td>
            <td>Libelle</td>
            <td>Assurances</td>
            <td>Actions</td>
        </tr>
        @foreach($types as $a)
            <tr>
                <td>
                    <img src="{{asset('storage/'.$a->photo) }}" width="70">
                </td>
                <td>{{$a->libelle}}</td>
                <td>
                    @forelse($a->assurances as $aa)
                        <li>{{$aa->libelle}}</li>
                    @empty
                        <p>la liste des vide </p>
                    @endforelse
                </td>
                <td>
                    <form action="{{route('typeAssurance.destroy',[$a->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                    <a  href="{{route('typeAssurance.edit',[$a->id])}}"  class="btn btn-primary">Update</a>
                </td>
            </tr>
        @endforeach

    </table>

@endsection
