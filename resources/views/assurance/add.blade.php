@extends('template')


@section('content')
<form action="{{route('storeAssurance')}}" method="post">
    @csrf
    <label>Libelle</label>
    <input type="text" name="libelle" id="" class="form-control">
    <label>Montant</label>
    <input type="text" name="montant" id="" class="form-control">
    <label for="">Categorie</label>
    <select class="form-control" name="categorie_id">
        @foreach($categories as $c)
            <option value="{{$c->id}}">{{$c->libelle}}</option>
        @endforeach

    </select>
    <br>
    <button type="submit" class="btn btn-success">Add</button>
</form>
@endsection
