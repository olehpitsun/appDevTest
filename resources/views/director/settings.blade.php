@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2>Налаштування</h2>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
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
</div>
@endsection
