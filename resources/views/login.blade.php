<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        {!! Form::open(['url' => 'dologin']) !!}
        {!! Form::label('email_label', 'Email ID: ') !!}
        {!! Form::email('email','',['class'=>'form-control']) !!}
        @if($errors->first('email'))
            {!! $errors->first('email') !!}
        @endif
        {!! Form::label('pass_lebel', 'Password: ') !!}
        {!! Form::password('pass',['class'=>'form-control']) !!}
        @if($errors->first('pass'))
            {!! $errors->first('pass') !!}
        @endif
        {!! Form::submit('Login') !!}
        {!! Form::close() !!}
    </body>
</html>
