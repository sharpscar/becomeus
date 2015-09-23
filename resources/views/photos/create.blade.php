@extends('layout.master')

@section('container')

  <h1>Upload a new Photo</h1>

  {{Form::open(['route'=>'photos.store','files'=>true])}}
    {{Form::hidden('user_id', Auth::user()->id)}}

    <div class="form-group">
      {{Form::label('title', 'Title:')}}
      {{Form::text('title', null,['class']=>'form-control')}}

    </div>
