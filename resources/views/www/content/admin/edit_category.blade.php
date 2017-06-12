@extends('www.layouts.default')

@section('title','Edit category')

@section('main')
<div class="container-fluid main__title">
    <h1>Edit Category</h1>
</div>

<div class="container-fluid col-md-4">
    <form method="POST" action="{{ route('editCategoryPost', ['id' => $category->id]) }}">
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
            <label for="catES" class="control-label">Category name in Spanish</label>
            <div class="input-group">
                <span class="input-goup-addon"><img src="{{ asset('img/es.jpg') }}" class="hip__input-addon"/></span>
                <input id="catES" type="text" class="form-control" name="catES" placeholder="Insert a category name" value="{{ old('catES', $category -> name['es']) }}" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="catEN" class="control-label">Category name in English</label>
            <div class="input-group">
                <span class="input-goup-addon"><img src="{{ asset('img/en.jpg') }}" class="hip__input-addon"/></span>
                <input id="catEN" type="text" class="form-control " placeholder="Insert a category name" name="catEN" value="{{ old('catEN', $category -> name['en']) }}" required autofocus>    
            </div>
        </div>
        
        <input type="hidden" name="id_category" value="{{ $category -> id }}"/>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('categoryList') }}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection