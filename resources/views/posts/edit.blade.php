@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>
{{-- <form method="post" action="/posts/{{$post->id}}"> --}}
{!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}
    
    {{csrf_field()}}
    <div class="form-group">
        {!! Form::label('title', 'TITLE:')!!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}

        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}
        {{-- <input type="submit" name="submit" value="UPDATE"> --}}
    </div>

{!! Form::close() !!}

{{-- <form method="post" action="/posts/{{$post->id}}"> --}}
{!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}
    
    {{csrf_field()}}    
    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}

{!! Form::close() !!}

@endsection