@extends('home')

@section('content')
    <div class="container">
        <h1>Edit board</h1>
        <form method="POST" action="{{ route('url.update', $url[0]->id )}}" >
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea">Title</label>
                <input name="title" class="form-control"  value="{{$url[0]->name}}"/>
            </div>
            <button type="submit" class="btn btn-primary my-1">Save</button>
        </form>
        <div>
@endsection
