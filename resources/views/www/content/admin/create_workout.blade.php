@extends('www.layouts.default')

@section('title','Create workout')

@section('main')
<div class="container-fluid main__title">
    <h1>Create Workout</h1>
</div>

<div class="container-fluid col-md-4">
@if(isset($id_category))
    <form method="POST" action="{{ route('createWorkoutPost', ['id_category' => $id_category]) }}">
@else
    <form method="POST" action="{{ route('createWorkoutPost') }}">
@endif
    {{ csrf_field() }}
        @if (count($errors) > 0)  
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="worES" class="control-label">Workout name in Spanish</label>
            <div class="input-group">
                <span class="input-goup-addon"><img src="{{ asset('img/es.jpg') }}" class="hip__input-addon"/></span>
                <input id="worES" type="text" class="form-control" placeholder="Insert a workout name" name="worES" value="{{ old('worES') }}" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="worEN" class="control-label">Workout name in english</label>
            <div class="input-group">
                <span class="input-goup-addon"><img src="{{ asset('img/en.jpg') }}" class="hip__input-addon"/></span>
                <input id="worEN" type="text" class="form-control" placeholder="Insert a workout name" name="worEN" value="{{ old('worEN') }}" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="desES" class="control-label">Workout description in Spanish</label>
            <div class="input-group">
                <span class="input-goup-addon"><img src="{{ asset('img/es.jpg') }}" class="hip__input-addon"/></span>
                <input id="desES" type="text" class="form-control" placeholder="Insert a workout description" name="desES" value="{{ old('desES') }}" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="desEN" class="control-label">Workout description in english</label>
            <div class="input-group">
                <span class="input-goup-addon"><img src="{{ asset('img/en.jpg') }}" class="hip__input-addon"/></span>
                <input id="desEN" type="text" class="form-control" placeholder="Insert a workout description" name="desEN" value="{{ old('desEN') }}" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="worlink" class="control-label">Link</label>
            <input id="worlink" type="text" class="form-control" placeholder="Insert a workout link" name="worlink" value="{{ old('worlink') }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="worlink" class="control-label">Category</label>
            <select id="category" name="category" class="form-control">
                @foreach($categories as $category)
                    @if(old('category') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name['en'] }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name['en'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
            @if(isset($id_category))
                <a href="{{ route('workoutList', ['id_category' => $id_category]) }}" class="btn btn-danger">Cancel</a>
            @else
                <a href="{{ route('workoutList') }}" class="btn btn-danger">Cancel</a>
            @endif
        </div>
    </form>
</div>
@endsection