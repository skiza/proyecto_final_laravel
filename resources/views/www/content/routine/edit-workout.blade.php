@extends('www.layouts.default')

@section('title','Edit Workout')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>Edit Workout</h1>
        </div>
    </div>
     @if (count($errors) > 0)
    <div class="row">
        <div class="col-12 alert alert-danger text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3 bg_white box_shadow">
             <!-- form -->
            <form action="{{ nt_route('routine_edit_user_workout_post-'.user_lang(),['id_routine' => $routine_id , 'id_workout' => $workout->id ]) }}"  class="padding-30" method="POST">
                 {{ csrf_field() }}
                 <div class="form-group row">
                    <label class="col-12 col-md-4 col-form-label">Nombre</label>
                    <div class="col-12 col-md-8">
                        {{ $workout->name[user_lang()] }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-md-4 col-form-label">Categoria</label>
                    <div class="col-12 col-md-8">
                        {{ $workout->category->name[user_lang()] }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sets" class="col-12 col-md-4 col-form-label">Sets</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="number" min=0 step=1 name="sets" id="sets" value={{ old('sets', $workout->pivot->sets) }} />
                    </div>
                </div>
                <div class="form-group row">
                  <label for="reps" class="col-12 col-md-4 col-form-label">Reps</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="number" min=0 step=1 name="reps" id="sets" value={{ old('reps', $workout->pivot->reps) }} />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center margin-top-30">
                        <button type="submit" value="Submit" class="btn btn-info"><i class="material-icons">save</i></button>
                        <a href="{{ nt_route('routine_detail-'.user_lang() , ['id_routine' => $routine_id]) }}" class="btn btn-danger" ><i class="material-icons">cancel</i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>   
@endsection