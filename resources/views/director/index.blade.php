@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">111 Dashboard Director</div>
                <a href="/allpersonal" class="btn btn-info" role="button">Персонал</a>
                <a href="/addUser" class="btn btn-info" role="button">Додати користувача</a>
                <a href="/settings" class="btn btn-info" role="button">Налаштування</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
