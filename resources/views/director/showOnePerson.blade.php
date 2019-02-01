@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Персонал</div>

                        <h2 style="text-align: center">Список розрахунків</h2>
                        <table class="ui striped table">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Тип</th>
                                <th>Сума</th>
                                <th>Валюта</th>
                                <th>Опис</th>
                                <th>Дата створення</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($payments as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->type}}</td>
                                    <td>{{$payment->total}}</td>
                                    <td>{{$payment->currency}}</td>
                                    <td>{{$payment->description}}</td>
                                    <td>{{$payment->created_at}}</td>
                                </tr>
                            @empty
                                Записів немає
                            @endforelse
                            </tbody>
                        </table>

            </div>
        </div>
    </div>
</div>
@endsection
