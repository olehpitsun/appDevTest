@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Налаштування</div>

                <table class="ui striped table">
                    <thead>
                    <tr>
                        <th>Ім'я</th>
                        <th>Опис</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>{{$user->description}}</td>
                            <td><a href="/settings/{{$user->id}}/edit">Редагувати</a></td>
                        </tr>
                    @empty
                        Немає користувачів
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection