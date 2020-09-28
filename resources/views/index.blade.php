@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="heading">
            <h1 class="title d-flex justify-content-between">
                Начало теста
            </h1>

            <form method="post" action="/prepare">
                {{csrf_field()}}
                <label for="name">Введите ваше полное имя</label>
                <input name="full_name" placeholder="Иванов В.В." required>
                <button>начать</button>
            </form>
        </div>
    </div>
@endsection
