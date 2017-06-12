@extends('www.layouts.default')

@section('title','Edit Routine')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>Edit Routine</h1>
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
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2 bg_white box_shadow padding-vertical-30">
             <!-- form -->
            <form action="{{ nt_route('routine_edit_post-'.user_lang(),['id_routine' => $routine->id]) }}" method="POST">
                 {{ csrf_field() }}
                 <div class="form-group row">
                    <label for="name" class="col-12 col-md-4 col-form-label">{{ trans('web.name') }}</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="text" name="name" value="{{ old('name',$routine->name) }}" />
                    </div>
                </div>
                <div class="form-group row">
                  <label for="description" class="col-12 col-md-4 col-form-label">{{ trans('web.description') }}</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="text" name="description" value="{{ old('description',$routine->description) }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.privacy') }} *</label>
                    <div class="col-12 col-md-8">
                        @foreach ($privacies as $pri)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="privacy_id" value='{{  $pri->id }}' {{ old('privacy_id',$routine->privacy_id) == $pri->id ? 'checked' : '' }}>
                                &nbsp;{{  $pri->name[user_lang()] }}
                            </label>
                        </div>    
                       @endforeach
                    </div>
                    <div class="col-12">
                        <span>*({{ trans('web.priv_mess') }}</span>
                    </div>
                </div>
                <button type="submit"  value="Submit" class="btn btn-info"><i class="material-icons">save</i></button>
                <a href="{{ nt_route('routine_user-'.user_lang()) }}" class="btn btn-danger" ><i class="material-icons">cancel</i></a>
            </form>
        </div>
    </div>
</div>   
@endsection