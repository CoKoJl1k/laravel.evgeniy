@extends('home')



@section('content')
    <div class="container">
        <div class="row">

           <!-- <a class="btn btn-primary" href="{#route('url.create')#}">Add url</a> -->

            {{ Form::open(['method' => 'POST', 'route' =>['url.store']]) }}
            {{ Form::submit('Generate url', ['class' => 'btn btn-primary btn-lg']) }}
            {{ Form::close() }}



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
                        <td>https://site/{{$url->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            @foreach($urls as $url)
                <h2>
                    <a class="btn btn-outline-column" href="{{route('url.edit', $url->id) }}">
                        <i class="fa fa-edit" style="font-size:36px"></i>
                    </a>
                    {{$url->id}}
                     {{$url->name}}
                    {{ Form::open(['method' => 'DELETE', 'route' =>['url.destroy', $url->id]]) }}
                    {{ Form::submit('Delete url', ['class' => 'btn btn-danger btn-sm']) }}
                    {{ Form::close() }}
                </h2>
            @endforeach
        </div>
    </div>
@endsection


