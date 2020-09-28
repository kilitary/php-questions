@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="heading">
            <h1 class="title d-flex justify-content-between">
                Начало теста
            </h1>

            <form method="post" action="/prepare">
                {{csrf_field()}}
                <label style='margin:10px' for="name">Введите ваше полное имя</label><br/>
                <input style='margin:10px;width:300px' name="full_name" placeholder="Иванов В.В." required><br/>
                <button style='margin:10px'>начать</button>
            </form>
        </div>
    </div>
@endsection
