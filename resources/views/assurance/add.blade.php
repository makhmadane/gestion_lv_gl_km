@extends('template')


@section('content')
<form action="{{route($assurance->id ? 'updateAssurance' : 'storeAssurance')}}" method="post">
    @csrf
    @method($assurance->id ? 'put' :'post')
    <input type="text" name="id" hidden value="{{$assurance->id}}">
    <label>Libelle</label>
    <input type="text" name="libelle" id="" class="form-control" value="{{$assurance->libelle}}">
    <label>Montant</label>
    <input type="text" name="montant" id="" class="form-control"  value="{{$assurance->montant}}">
    <br>
    <button type="submit" class="btn btn-success">{{$assurance->id ? 'Update' : 'Add'}}</button>
</form>
@endsection
