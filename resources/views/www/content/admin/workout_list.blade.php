@extends('www.layouts.default')

@section('title','Workouts List')

@section('main')
<div class="container-fluid main__title">
    @if(isset($category))
        <h1>Workouts List if {{ $category -> name['en'] }} Category</h1>
    @else
        <h1>Workouts List</h1>
    @endif
</div>

<div class="container-fluid col-md-4">
 <table class="table table-striped">
        <thead class="thead-inverse">
           <tr>
                <th class="col-md-10">name</th>
                <th class="col-md-1 text-center">edit</th>
                <th class="col-md-1 text-center">delete</th>
           </tr>
        </thead>
        <tbody>
        @foreach($workouts as $workout)
            <tr id="id-{{ $workout -> id }}">
                <td class="col-md-10">
                    @if(isset($id_category))
                        <a href="{{ route('workoutListOne', ['id' => $workout->id, 'id_category' => $id_category]) }}">{{ $workout -> name['en'] }}</a>
                    @else
                        <a href="{{ route('workoutListOne', ['id' => $workout->id]) }}">{{ $workout -> name['en'] }}</a>
                    @endif
                </td>
                <td class="col-md-1 text-center">
                    @if(isset($id_category))
                        <a class="btn btn-primary fit_btn-primary" id="editWorkout" href="{{ route('editWorkout', ['id' => $workout->id, 'id_category' => $id_category]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    @else
                        <a class="btn btn-primary fit_btn-primary" id="editWorkout" href="{{ route('editWorkout', ['id' => $workout->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    @endif
                </td>
                <td class="col-md-1 text-center">
                    <a class="delete btn btn-danger fit_btn-danger" data-id="{{ $workout -> id }}" data-url="{{ route('deleteWorkout', ['id' => $workout->id]) }}"><i class="fa fa-ban" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if(isset($id_category))
        <a href="{{ route('createWorkout', ['id_category' => $id_category]) }}" class="btn btn-primary fit_btn-primary pull-right">New Workout</a>
    @else
        <a href="{{ route('createWorkout') }}" class="btn btn-primary fit_btn-primary pull-right">New Workout</a>
    @endif
    <div class="pull-left">
        {{ $workouts->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){

        $('.delete').on('click', function(){
            
            var workout_id = $(this).attr('data-id');
            
            var response = confirm('Are you sure you want to delete this workout ?');
            
            if(response == true){
               
               jQuery.get($(this).attr('data-url'), function(data, status){
                   
                    if(data == 'true'  && status == 'success'){
                        $("#id-" + workout_id).remove();
                    }
                    else {
                        alert('The workout could not be deleted.');
                    }
                });
            }
        });
    });
</script>
@endsection