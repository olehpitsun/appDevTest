@extends('layouts.master')

@section('content')
<div class="container">
    <div class="box-body">
        <div class="col-md-12">

            <h2 class="card">
                <h2>Персонал</h2>

                        <h2 style="text-align: center">Список розрахунків</h2>
                        <table id="example1" class="table table-bordered table-striped">
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
