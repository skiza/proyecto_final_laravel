@extends('www.layouts.default')

@section('title','New Routine')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ trans('web.new_routine') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2 bg_white box_shadow padding-vertical-30">
             <!-- form -->
            <form action="{{ nt_route('routine_new_post-'.user_lang()) }}" method="POST">
                 {{ csrf_field() }}
                 <div class="form-group row">
                    <label for="name" class="col-12 col-md-4 col-form-label">{{ trans('web.name') }}</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                    </div>
                </div>
                <div class="form-group row">
                  <label for="description" class="col-12 col-md-4 col-form-label">{{ trans('web.description') }}</label>
                    <div class="col-12 col-md-8">
                        <input class="form-control" type="text" name="description" value="{{ old('description') }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-12 col-md-4 col-form-label">{{ trans('web.privacy') }} *</label>
                    <div class="col-12 col-md-8">
                        @foreach ($privacies as $pri)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="privacy_id" value='{{  $pri->id }}' {{ old('privacy_id') == $pri->id ? 'checked' : '' }}>
                                &nbsp;{{  $pri->name[user_lang()] }}
                            </label>
                        </div>    
                       @endforeach
                    </div>
                    <div class="col-12">
                        <span>* {{ trans('web.priv_mess') }}</span>
                    </div>
                </div>
                <button type="submit" value="Submit" class="btn btn-info"><i class="material-icons">save</i></button>
                <a href="{{ nt_route('home-'.user_lang()) }}" class="btn bg-danger" ><i class="material-icons">cancel</i></a>
            </form>
        </div>
    </div>
</div>   
@endsection