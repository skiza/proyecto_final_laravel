@extends('www.layouts.default')

@section('title','Calendar')

@section('main')
<div class="container">
    <div class="row margin-top-100">
        <div class="col-12 calendar_frame-top">
            <div class="anilla_left anilla col-1"></div>
            <div class="anilla_right anilla col-1"></div>
        </div>
        <div class="col-12 calendar_frame-title">
            <h1>{{ trans('web.calendar') }}</h1>
        </div>
        <div class="col-12">
            <div class="row ">
                @foreach($days as $day)
                <div class="days col">
                    <div class="day">{{ $day->name[user_lang()] }}</div>
                    @foreach( $routines[($day->id)-1] as $routine)
                        <div class="routine">
                            <a href="{{ nt_route('routine_start-'.user_lang(),['id_routine' => $routine->id]) }}">
                                <p>{{ $routine->name }}</p>
                                <p>workouts: {{ count($routine->workout) }}</p>
                            </a>
                        </div>
                    @endforeach
                    <div class="edit_routine">
                        <a  href="{{ nt_route('calendar_edit-'.user_lang(), ['id_day' => $day->id]) }}" class="btn_edit" >
                            <i class="material-icons">create</i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>    
@endsection