@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Перегляд персоналу</div>

                <div class="panel-body">




                    <form action="/chooseDate" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="date">Дата</label>
                            <input type="date" name="date" id="date">
                        </div>

                        <input type="submit" class="btn btn-success">
                    </form>
                </div>

                <table class="ui striped table">
                    <thead>
                    <tr>
                        <th>Ім'я</th>
                        <th>email</th>
                        <th>К-сть операцій</th>
                        <th>Загальна сума</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                                <form action="/user/{{$user->user_id}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}
                                    <button class="btn-danger btn-sm">
                                        {{$user->name}}
                                    </button>
                                </form>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->total_count}}</td>
                            <td>{{$user->total_sum}}</td>

                        </tr>
                    @empty
                        No data
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
