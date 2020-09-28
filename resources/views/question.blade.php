@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="heading">
            <h1 class="title d-flex justify-content-between">
                <div style="border-bottom:5px dashed orange">{{$question->question}}</div>
            </h1>

            <form method="post" action="/vote/{{$question->id}}">
                {{csrf_field()}}
                <div>
                    @foreach($question->answers as $answer)
                        <div style="padding-bottom:20px">

                            <input type="radio" id="answer{{$answer->id}}" name="answer" value="{{$answer->id}}"
                                   required> <label
                                for="answer{{$answer->id}}">{{$answer->answer}}</label>

                        </div>
                    @endforeach
                </div>
                <div style="padding-top:10px">
                    <button style="cursor:pointer;">далее</button>
                </div>
            </form>
        </div>
    </div>
@endsection
