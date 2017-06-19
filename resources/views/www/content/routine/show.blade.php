@extends('www.layouts.default')

@section('title','Profile')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ trans('web.routine') }} {{ $routine->name }}</h1>
                @if( count($routine->workout) == 0 )
                          <a href="{{ nt_route('routine_add_workout_1-'.user_lang(),['id_routine' => $routine->id]) }}" class="btn_add"
                            aria-hidden="true" data-container="body" data-toggle="popover" data-trigger="hover" tabindex="0" data-placement="left" data-content="add Workouts"
                            ><i class="material-icons">add_circle</i></a>
                @elseif( $routine->user->id == auth()->id() || $routine->privacy->name['en'] == 'Public' )
                    <a href="{{ nt_route('routine_start-'.user_lang(),['id_routine' => $routine->id]) }}" class="btn_add"
                            aria-hidden="false" data-container="body" data-toggle="popover" data-trigger="hover" tabindex="0" data-placement="left" data-content="Start Routine"
                            ><i class="material-icons start">play_circle_filled</i></a>
                @endif
            <a href="{{ nt_route('routine_user-'.user_lang()) }}" class="btn_back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> 
        </div>
    </div>
    @if (session('action_status'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success text-center">
                {{ session('action_status') }}
            </div>
        </div>
    </div>    
    @endif
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3 bg_white box_shadow padding-vertical-30">
            <table class="table table-sdiviped">
                @if($routine->user->id != auth()->id())
                <tr>
                    <th>{{ trans('web.author') }}</th>
                    <td>{{ $routine -> user-> alias}}</td>
                </tr>
                @endif
                <tr>
                    <th>{{ trans('web.name') }}</th> <td>{{ $routine -> name}}</td>
                </tr>    
                <tr>
                    <th>{{ trans('web.description') }}</th> <td>{{ $routine -> description }}</td>
                </tr>
                <tr>
                    <th>{{ trans('web.privacy') }}</th> 
                    <td>
                      {{ $routine -> privacy ->name[user_lang()] }}
                    </td>  
                </tr>
            </table>
            @if($routine->user->id == auth()->id())
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{ nt_route('routine_edit-'.user_lang(),['id_routine' => $routine->id]) }}" class="btn btn-primary"><i class="material-icons">create</i></a>
                        
                        <a href="{{ nt_route('routine_delete-'.user_lang(),['id_routine' => $routine->id , 'redirect' => 'ok']) }}" class="btn btn-danger delete_routine"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            @else
            <div class="row"> 
                <div class="col-12 text-right">
                    <a href="{{ nt_route('routine_like-'.user_lang(),['id_routine' => $routine->id ])}}" id="like" class="btn_like {{ ( (($routine->my_likes)->contains(auth()->id())) )? 'like':''  }}"><i class="material-icons">thumb_up</i></a>
                </div>
            </div>
            @endif
        </div>
    </div>
    @if( count($routine->workout) > 0 )
    <div class="row">
        <div class="col-12 title">
            <h2>{{ trans('web.workout') }}</h2>
            @if($routine->user->id == auth()->id())
                <a  href="{{ nt_route('routine_add_workout_1-'.user_lang(),['id_routine' => $routine->id]) }}" class="btn_add"
                    aria-hidden="true" data-container="body" data-toggle="popover" data-trigger="hover" tabindex="0" data-placement="left" data-content="add Workouts">
                    <i class="material-icons">add_circle</i>
                </a>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach ($routine->workout as $workout)
            <div class="col-12 col-sm-10 offset-sm-1 offset-md-0 col-md-6 col-lg-4" id="workout-{{ $workout->id }}">
                <div class="row">
                    <div class="col-12">
                        <div class="routine_item border_cat_{{ $workout->category->id }}">
                            <h3 class="butitle"> {{ $workout->name[user_lang()] }}</h3>
                            <table class="table table-sdiviped">
                                <tr class="bg_cat_{{ $workout->category->id }}" >
                                    <td class="text-left" >{{ trans('web.user_routine_category') }}</td> <td>{{ $workout->category->name[user_lang()] }}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('web.sets') }}</th> <td>{{ $workout->pivot->sets }}</td>
                                </tr>    
                                <tr>
                                    <th>{{ trans('web.reps') }}</th> <td>{{ $workout->pivot->reps }}</td>
                                </tr>
                            </table>
                            @if($routine->user->id == auth()->id())
                            <a class="btn btn-primary" href="{{ nt_route('routine_edit_user_workout-'.user_lang(),[ 'id_routine' => $routine->id , 'id_workout' => $workout->id ]) }}">
                                <i class="material-icons">create</i>
                            </a>    
                            <button class="btn btn-danger delete"  
                                    data-id="{{ $workout->id }}"
                                    data-url="{{ nt_route('routine_del_workout-'.user_lang(),[ 'id_rout' => $routine->id , 'id_work' => $workout->id ]) }}">
                                <i  class=" material-icons" >delete</i>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
    
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(function(){
        $('[data-toggle=popover]').popover();  
        
        $('.delete').on('click', function(){
          
            var workout_id = $(this).attr('data-id');
            
            var response = confirm('¿ Estas seguro de que desea borrar el ejercicio ?');
            
            if(response == true){
               
               jQuery.get($(this).attr('data-url'), function(data, status){
                    if(data != ''  && status == 'success'){
                        $("#workout-" + workout_id).remove();
                        alert('Ejercicio borrado');
                    }else{
                        alert('No se pudo borrar el ejercicio');
                    }
                });
            }
        });
        
        $('.delete_routine').on('click', function(event){
            
            event.preventDefault();
            
            var response = confirm("Are you sure you want to delete?");
            
            if (response == true)   {  
               window.location = $(this).attr('href');
            }
        });
        
        $('#like').on('click',function(event) {
            event.preventDefault();
            
            jQuery.get($(this).attr('href'), function(data, status){
                if(data != ''  && status == 'success'){
                    $('#like').toggleClass('like');
                }else{
                    alert('Error');
                }
            });
        })
        
    });
</script>    
@endsection