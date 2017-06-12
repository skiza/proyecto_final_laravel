@extends('www.layouts.default')

@section('title','Workout List One')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>Workout Details</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2">
            <table class="table table-sdiviped">
                <tr>
                    <th>Name:</th>
                    <td>{{ $workout -> name['en'] }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $workout -> description['en'] }}</td>
                </tr>
                <tr>
                    <th>Link:</th>
                    <td>
                        <a href="https://www.youtube.com/watch?v={{ $workout -> link }}" target="_blank">{{ $workout -> link }}</a>
                    </td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td>{{ $workout -> category -> name['en'] }}</td>
                </tr>
                <tr>
                    <th>Delete:</th>
                    <td>
                        @if(isset($id_category))
                            <a class="btn btn-danger fit_btn-danger" href="{{ route('deleteWorkout', ['id' => $workout -> id, 'redirect' => true, 'id_category' => $id_category]) }}" onclick="confirmDelete(event)"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        @else
                            <a class="btn btn-danger fit_btn-danger" href="{{ route('deleteWorkout', ['id' => $workout -> id, 'redirect' => true]) }}" onclick="confirmDelete(event)"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function confirmDelete(e) {
        if(!confirm('Are you sure you want to delete this workout ?'))
            e.preventDefault();
    }
</script>
@endsection
