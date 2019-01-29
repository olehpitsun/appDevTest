@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Новий рахунок</h1>
            </div>
            <div class="panel-body">
                <form action="/personal" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="content">Тип</label><br>
                        <input type="radio" name="type" value="card" >Картка <br>
                        <input type="radio" name="type" value="cash" >Готівкою<br>

                    </div>

                    <div class="form-group">
                        <label for="content">Сума</label>
                        <input type="text" name="total" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="content">Валюта</label>
                        <select name="currency" class="form-control" >
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="UAH">UAH</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Опис</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>

            </div>
        </div>
@endsection
