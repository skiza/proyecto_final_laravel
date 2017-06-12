@extends('www.layouts.default')

@section('title','Calendar Edit')

@section('main')
<div class="container">
    <div class="row">
         <div class="col-12 main__title">
            <h1>Rutina</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row star_workout_container header box_shadow">
                <div class="col">
                    
                </div>
                <div class="col">Name</div>
                <div class="col">Category</div>
                <div class="col">Sets</div>
                <div class="col">Reps</div>
                <div class="col">Done</div>
            </div>
        </div>
        @foreach($routine->workout as $workout)
        <div class="col-12">
            <div class="row star_workout_container box_shadow">
                <div class="col">
                    <img src="{{ asset('img/category/category-'.strtolower($workout->category->name['en']).'-white.png')}}" class="img-fluid" />
                </div>
                <div class="col name">{{ $workout->name[user_lang()]}}</div>
                <div class="col">{{ $workout->category->name[user_lang()]}}</div>
                <div class="col">{{ $workout->pivot->sets}}</div>
                <div class="col">{{ $workout->pivot->reps}}</div>
                <div class="col"><div class="check_box"><i class="material-icons check"></i></div></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){
        $('.check_box').on('click',function(){
            if( $('.material-icons',this).text() == 'check'){
                $('.material-icons',this).text('');
            }else{
                $('.material-icons',this).text('check');
            }
        });
       
    });
</script>
@endsection