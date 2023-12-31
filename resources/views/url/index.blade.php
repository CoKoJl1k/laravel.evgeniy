@extends('home')

@section('content')
    <div class="container">
        <div class="row">

            @if(isset ($message))
                <div class="alert alert-warning" role="alert">
                    <ul class="list-unstyled mb-0">
                            <li>{{ $message }}</li>
                    </ul>
                </div>
            @endif

            {{ Form::open(['method' => 'POST', 'route' =>['url.store']]) }}
            {{Form::text('name', 'https://site/test') }}
            {{-- Form::submit('Сократить', ['class' => 'btn btn-primary btn-lg']) --}}
            {{Form::button('Сократить',['class' => 'btn btn-primary btn-lg','onClick'=>'getUrl()']) }}
            {{ Form::close() }}

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">url</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th id="url_id"></th>
                    <td id="url_name"></td>
                </tr>
                </tbody>
            </table>
            <p id="msg"></p>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">urls</th>
                </tr>
                </thead>
                <tbody>
                @foreach($urls as $url)
                    <tr>
                        <th scope="row">   {{$url->id}}</th>
                        <td>{{$url->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


