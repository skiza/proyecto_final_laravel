@extends('www.layouts.default')

@section('title','Categories List')

@section('main')
<div class="container-fluid main__title">
    <h1>Categories List</h1>
</div>

<div class="container-fluid col-md-4">
 <table class="table table-striped">
        <thead class="thead-inverse">
           <tr>
                <th class="col-md-10">name</th></th>
                <th class="col-md-1 text-center">edit</th>
                <th class="col-md-1 text-center">delete</th>
           </tr>
        </thead>
        <tbody>
        @foreach( $categories as $category)
            <tr id="id-{{ $category -> id }}">
                <td class="col-md-10">
                    <a href="{{ route('workoutList', ['id_category' => $category->id]) }}">{{ $category -> name['en']}}</a>
                </td>
                <td class="col-md-1 text-center">
                    <a class="btn btn-primary fit_btn-primary" id="editCategory" href="{{ route('editCategory', ['id' => $category->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                <td class="col-md-1 text-center">
                    <a class="delete btn btn-danger fit_btn-danger" data-id="{{ $category -> id }}" data-url="{{ route('deleteCategory', ['id' => $category->id]) }}"><i class="fa fa-ban" aria-hidden="true"></i></a>
                </td>
             </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('createCategory') }}" class="btn btn-primary fit_btn-primary pull-right">New Category</a>
    <div class="pull-left">
        {{ $categories->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){

        $('.delete').on('click', function(){
            
            var category_id = $(this).attr('data-id');
            
            var response = confirm('Are you sure you want to delete this category ?');
            
            if(response == true){
               
               jQuery.get($(this).attr('data-url'), function(data, status){
                   
                    if(data == ''  && status != 'success'){
                        alert('The category could not be deleted.');
                    }
                    else {
                        $("#id-" + category_id).remove();
                    }
                });
            }
        });
    });
</script>
@endsection
