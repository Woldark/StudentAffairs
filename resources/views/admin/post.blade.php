@extends('admin.layouts.base')

@section('main')
    <h2>{{ $post->title }}</h2>
    <br>
    {!! html_entity_decode(clean($post->body)) !!}
    <br>
    <h4>{{ $post->updated_at }}</h4>
@endsection