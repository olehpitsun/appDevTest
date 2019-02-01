@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Створити нового користувача</h2>
            </div>
            <div class="panel-body">
                <form action="/addUser" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="content">Ім'я</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="content">E-mail</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="content">password</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
@endsection
