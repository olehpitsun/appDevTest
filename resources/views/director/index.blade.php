@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 style="text-align: center">Сторінка директора</h2>
                @forelse($company as $c)
                    <h3>{{$c->company_name}}</h3>
                    <h3>{{$c->company_description}}</h3>
                @empty
                    Записів немає
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
