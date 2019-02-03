@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Редагування учасника</h1>
            </div>
            <div class="panel-body">
                <form action="/settings/{{$user->id}}" method="POST">

                    {{ method_field('PUT')}}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        <label for="description">Опис діяльності</label>
                        <textarea class="form-control" rows="3" name="description">{{$user->description}}</textarea>
                    </div>



                    <input type="submit" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>
@endsection