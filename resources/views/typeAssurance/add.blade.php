@extends('template')


@section('content')
<form action="{{route($type->exists ? 'typeAssurance.update' : 'typeAssurance.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method($type->exists ? 'put' :'post')
    <input type="text" name="id" hidden value="{{$type->id}}">
    <label>Photo</label>
    <input type="file" class="form-control" name="photo">
    <label>Libelle</label>
    <input type="text" name="libelle" id="" class="form-control @error('libelle') is-invalid @enderror" value="{{$type->exists ? $type->libelle : old('libelle')}}">
    @error('libelle')
    <div class="text text-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-success">{{$type->exists ? 'Update' : 'Add'}}</button>
</form>
@endsection
