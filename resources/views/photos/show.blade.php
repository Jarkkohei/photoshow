@extends('layouts.app')

@section('content')
    <h3>{{ $photo->title }}</h3>
    <p>{{ $photo->description }}</p>
    <a class="button secondary" href="/albums/{{ $photo->album_id }}">Back to Gallery</a>
    <hr>
    <img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}">
    <br>
    <br>
    {!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'DELETE']) !!}
        {{ Form::submit('Delete Photo', ['class' => 'button alert']) }}

        {{-- This is not needed because Laravel Collective does the spoofing automatically. --}}
        {{-- Form::hidden('_method', 'DELETE') --}}
    {!! Form::close() !!}
    <hr>
    <small>Size: {{ $photo->size }} bytes</small>
@endsection