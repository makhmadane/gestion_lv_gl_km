@extends('template')


@section('content')
<form action="{{route($assurance->id ? 'updateAssurance' : 'storeAssurance')}}" method="post">
    @csrf
    @method($assurance->id ? 'put' :'post')
    <input type="text" name="id" hidden value="{{$assurance->id}}">
    <label>Libelle</label>
    <input type="text" name="libelle" id="" class="form-control @error('libelle') is-invalid @enderror" value="{{$assurance->libelle}}">
    @error('libelle')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
    <label>Montant</label>
    <input type="text" name="montant" id="" class="form-control  @error('montant') is-invalid @enderror"  value="{{$assurance->montant}}">
    @error('montant')
    <div class="text text-danger">{{ $message }}</div>
    @enderror
    <br>
    <select name="type_id" id="" class="form-control">
        @foreach($types as $t)
            <option {{($assurance->type_id == $t->id ) ? 'selected' : '' }} value="{{$t->id}}">{{$t->libelle}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success">{{$assurance->id ? 'Update' : 'Add'}}</button>
</form>
@endsection
