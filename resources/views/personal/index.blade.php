@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/personal">Переглянути мої розрахунки</a>
            <a href="/personal/create">Провести розрахунок</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <div class="card">
                <div class="card-header">Персонал</div>

                <form action="/personalDate" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="date">Дата</label>
                        <input type="date" name="date" id="date">
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>

                        @if(Auth::user()->role == 'personal')
                            <a href="/personal/create" class="btn btn-info" role="button">Додати</a>
                        @endif
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
                <?php echo $payments->render(); ?>

            </div>
        </div>
    </div>
</div>
@endsection
