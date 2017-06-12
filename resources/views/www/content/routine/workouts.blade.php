@extends('www.layouts.default')

@section('title','Workouts')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ trans('web.workout') }} - {{ $category_name[user_lang()] }}</h1>
            <a href="{{ nt_route('routine_add_workout_1-'.user_lang(),['id_routine' => $routine_id]) }}" class="btn_back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> 
        </div>
    </div>
    <form action="{{ nt_route('routine_add_workout_2_post-'.user_lang(), ['id_routine' => $routine_id, 'id_category' => $category_id ])}}" method="POST">
        {{ csrf_field() }}
    <div class="row">
        @if(count($workouts) > 0)
            @foreach( $workouts as $workout )
                <div class="col-12 col-sm-6 col-lg-4 workout_item__container">
                    <div class="workout_item">
                        <h2 >
                            {{ $workout->name[user_lang()] }}
                        </h2>
                        <div class="row">
                            <div class="col-12">
                                <diw class="row">
                                    <div class="col-12 col-md-10 offset-md-1">
                                        <div class="row form-group">
                                            <label for="sets_{{ $workout->id }}" class="col-6 col-form-label">{{ trans('web.sets') }}</label>
                                            <div class="col-6">
                                                <input class="form-control" type="number" step="1" name="sets_{{ $workout->id }}" id="sets_{{ $workout->id }} value="{{ old('sets_'.$workout->id ,(isset($workout->pivot->sets) ? $workout->pivot->sets : '')) }}"/>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label for="reps_{{ $workout->id }}" class="col-6 col-form-label">{{ trans('web.reps') }}</label>
                                            <div class="col-6">
                                                <input class="form-control" type="number" step="1" name="reps_{{ $workout->id }}" id="reps_{{ $workout->id }} value="{{ old('reps_'.$workout->id) }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </diw>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="workout-{{ $workout->id }}" class="workout__control_label">
                                            <span class="btn btn-success workout__add show">{{ trans('web.add') }}</span>
                                            <span class="btn btn-danger workout__remove">{{ trans('web.remove') }}</span>
                                        </label> 
                                        <input type="checkbox" id="workout-{{ $workout->id }}" class="workout__input" name="workouts[{{ $workout->id }}]" value="{{ $workout->id }}"{{ ( is_array( old('workouts')) && in_array($workout->id , old('workouts') ) ) ? 'checked' : '' }}/>
                                    </div>
                                    <div class="col-12 col-md-6 workout_extra-info">
                                        <a href="https://www.youtube.com/watch?v={{ $workout->link }}" target="_blank"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a>
                                        <i class="fa fa-info-circle workout__info fa-2x" aria-hidden="true" data-container="body" data-toggle="popover" data-trigger="focus" tabindex="0" data-placement="top" data-content="{{ $workout->description[user_lang()] }}"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if(count($user_workouts) > 0)
            @foreach( $user_workouts as $workout )
                <div class="col-12 col-sm-6 col-lg-4 workout_item__container">
                    <div class="workout_item selected">
                        <h2 >
                            {{ $workout->name[user_lang()] }}
                        </h2>
                        <div class="row">
                            <div class="col-12">
                                <diw class="row">
                                    <div class="col-12 col-md-10 offset-md-1">
                                        <div class="row form-group">
                                            <label for="sets_{{ $workout->id }}" class="col-6 col-form-label">{{ trans('web.sets') }}</label>
                                            <div class="col-6">
                                                <input class="form-control" type="number" step="1" name="sets_{{ $workout->id }}" id="sets_{{ $workout->id }}" value={{ (isset($workout->pivot->sets)) ?  $workout->pivot->sets : '' }} />
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label for="reps_{{ $workout->id }}" class="col-6 col-form-label">{{ trans('web.reps') }}</label>
                                            <div class="col-6">
                                                <input class="form-control" type="number" step="1" name="reps_{{ $workout->id }}" id="reps_{{ $workout->id }}" value={{ (isset($workout->pivot->reps)) ? $workout->pivot->reps : '' }} />
                                            </div>
                                        </div>
                                    </div>
                                </diw>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="workout-{{ $workout->id }}" class="workout__control_label">
                                            <span class="btn btn-success workout__add ">{{ trans('web.add') }}</span>
                                            <span class="btn btn-danger workout__remove show">{{ trans('web.remove') }}</span>
                                        </label> 
                                        <input type="checkbox" id="workout-{{ $workout->id }}" class="workout__input" name="workouts[{{ $workout->id }}]" value="{{ $workout->id }}" checked/>
                                    </div>
                                    <div class="col-12 col-md-6 workout_extra-info">
                                        <a href="https://www.youtube.com/watch?v={{ $workout->link }}" target="_blank"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a>
                                        <i class="fa fa-info-circle workout__info fa-2x" aria-hidden="true" data-container="body" data-toggle="popover" data-trigger="focus" tabindex="0" data-placement="top" data-content="{{ $workout->description[user_lang()] }}"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="col-12"> 
            <button type="submit" value="Submit" class="btn btn-info"><i class="material-icons">save</i></button>
            <a href="{{ nt_route('routine_add_workout_1-'.user_lang(),['id_routine' => $routine_id]) }}" class="btn btn-danger"><i class="material-icons">cancel</i></a>
        </div>
    </div>
    </form> 
</div>   
@endsection


@section('scripts')
<script type="text/javascript">
    $(function(){
        $('.workout__info').popover();  
        
        $('.workout__control_label').on('click',function(){
            $(this).find('span').toggleClass('show');
        });
        
        $(':checkbox').on('change', function(){
            console.log('si');
            console.log($(this).parent('.workout_item'));
            ($(this).closest('.workout_item')).toggleClass('selected');
        });
    });
</script>    
@endsection