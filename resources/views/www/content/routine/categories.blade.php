@extends('www.layouts.default')

@section('title','Categories')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title text-center">
            <h1>{{ trans('web.routine') }} {{ $routine->name }}</h1>
            <a href="{{ nt_route('routine_detail-'.user_lang(),['id_routine' => $routine->id]) }}" class="btn_back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> 
        </div>
    </div>
    <div class="row">
        @if (session('action_status'))
        <div class="col-12">
            <div class="alert alert-success text-center">
                {{ session('action_status') }}
            </div>
        </div>    
        @endif
        @foreach( $categories as $category )
            @if(count($category->workout) > 0)
                <div class="col-6 col-md-4 col-xl-3 category_item @if(in_array($category->id  , $routine_categories)) with_workouts @endif">
                    <div class="bg_cat_{{ $category->id }}">
                        <a href="{{ nt_route('routine_add_workout_1_post-'.user_lang(),['id_routine' => $routine->id, 'id_category' => $category->id ]) }}" title="">
                            <h2>{{ $category->name[user_lang()] }}</h2>
                            <img src="{{ asset('img/category/category-'.strtolower($category->name['en']).'-white.png')}}" class="img-fluid" />
                        </a>
                    </div>
                </div>
            @endif    
        @endforeach
    </div>
    <div class="row">
        <div class="col-2">
           <a href="{{ nt_route('routine_detail-'.user_lang(),['id_routine' => $routine->id]) }}" class="btn btn-primary"><i class="material-icons">save</i></a> 
        </div>
    </div>
</div>   
@endsection