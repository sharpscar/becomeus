@extends('layouts.master')

@section('content')


<!-- ['route'=> 'sessions.store','class'=>'well'] -->
{!! Form::open() !!}

  <!-- Username Field -->
  <div class="form-group">
    {!! Form::label('username', 'Username:') !!}

    {!! Form::text('username',null, ['class'=>'form-control'])  !!}

  </div>

  <!-- Password Field -->

  <div class="form-group">
    {!! Form::label('password', 'Password:') !!}

    {!! Form::password('password', ['class'=>'form-control'])  !!}

  </div>

  <!-- Log In Field -->

  <div class="form-group">
      {!! Form::submit('Log In', ['class'=> 'btn btn-primary'])!!}
  </div>




{!! Form::close() !!}

<!-- 연습-->
<!-- {!! Form::open(['url'=>'articles']) !!}-->
  {!! Form::open() !!}
    <div class="form-group">
      {!! Form::label('title','Title:') !!}
      {!! Form::text('title',null,['class'=>'form-control','foo'=>'bar']) !!}

    </div>

    <div class="form-group">
      {!! Form::label('body','Body:') !!}
      {!! Form::textarea('body',null,['class'=>'form-control','foo'=>'bar'])!!}

    </div>

    <div class="form-group">
      {!! Form::submit('Add Article',['class'=>'btn btn-primary form-controll']) !!}


    </div>

  {!! Form::close()!!}
