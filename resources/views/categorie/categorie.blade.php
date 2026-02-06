@extends('template')

@section('content')
<table  class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Libelle</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    @forelse($categories as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->libelle}}</td>
            <td>{{$c->description}}</td>
            <td>

            </td>
        </tr>
    @empty
        <tr>
            <td>La liste est vide</td>
        </tr>
    @endforelse

</table>
    {{$categories->links()}}
@endsection
