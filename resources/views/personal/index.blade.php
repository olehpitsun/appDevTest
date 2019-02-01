@extends('layouts.master')

@section('content')
    <ol class="breadcrumb">
        <li><a href="/personal"><i class="fa fa-dashboard"></i> Переглянути мої розрахунки</a></li>
    </ol>
    <div class="col-md-6">
        <div class="input-group input-group-sm">
            <form action="/personalDate" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="date">Сортувати за датою</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-info btn-flat"/>
                </span>
            </form>
        </div>
    </div>

    <h2 style="text-align: center">Список розрахунків</h2>
        <div class="box-body">
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
    <?php echo $payments->render(); ?>
@endsection
