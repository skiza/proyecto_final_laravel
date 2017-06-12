@extends('www.layouts.default')

@section('title','User List')

@section('main')
<div class="container-fluid main__title">
    <h1>Users List</h1>
</div>

<div class="container-fluid col-md-6">
 <table class="table table-striped">
        <thead class="thead-inverse">
           <tr>
                <th class="col-md-5">name</th>
                <th class="col-md-5">email</th>
                <th class="col-md-1 text-center">status</th>
                <th class="col-md-1 text-center">delete</th>
           </tr>
        </thead>
        <tbody>
        @foreach( $users as $user)
            <tr id="id-{{ $user -> id }}">
                <td class="col-md-5">
                    <a href="{{ route('userListOne', ['id' => $user->id]) }}">{{ $user -> alias}}</a>
                </td>
                <td class="col-md-5">
                    <a href="mailto:{{ $user -> email }}">{{ $user -> email }}</a>
                </td>
                <td class="col-md-1 text-center">
                    @if ($user->status->id == 1)
                        <a class="status btn btn-warning fit_btn-warning" data-id="{{  $user -> id }}" data-url="{{ route('userStatus', ['id' => $user->id]) }}"><i class="icon-{{ $user -> id }} fa fa-unlock" aria-hidden="true"></i></a>
                    @elseif ($user->status->id == 2)
                        <a class="status btn btn-warning fit_btn-warning" data-id="{{  $user -> id }}" data-url="{{ route('userStatus', ['id' => $user->id]) }}"><i class="icon-{{ $user -> id }} fa fa-lock" aria-hidden="true"></i></a>
                    @endif
                </td>
                <td class="col-md-1 text-center">
                    <a class="delete btn btn-danger fit_btn-danger" data-id="{{ $user -> id }}" data-url="{{ route('userDelete', ['id' => $user->id]) }}"><i class="fa fa-ban" aria-hidden="true"></i></a>
                </td>
             </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){

        $('.status').on('click', function(){
            
            var user_id = $(this).attr('data-id');
            
            var response = confirm('Are you sure you want to change the user\'s status ?');
            
            if(response == true){
               
               jQuery.get($(this).attr('data-url'), function(data, status){
                   
                    if(data != ''  && status == 'success'){
                        if (data == 'blocked') {
                            $('.icon-'+user_id).removeClass('fa-unlock');
                            $('.icon-'+user_id).addClass('fa-lock');
                        }
                        else {
                            $('.icon-'+user_id).removeClass('fa-lock');
                            $('.icon-'+user_id).addClass('fa-unlock');
                        }
                    }else{
                        alert('The status could not be changed.');
                    }
                });
            }
        });
    });
    
    $(function(){

        $('.delete').on('click', function(){
            
            var user_id = $(this).attr('data-id');
            
            var response = confirm('Are you sure you want to delete this user ?');
            
            if(response == true){
               
               jQuery.get($(this).attr('data-url'), function(data, status){
                   
                    if(data == 'true'  && status == 'success'){
                        $("#id-" + user_id).remove();
                    }
                    else {
                        alert('The user could not be deleted.');
                    }
                });
            }
        });
    });
</script>
@endsection