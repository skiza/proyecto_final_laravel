@extends('www.layouts.default')

@section('title','User List One')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ $user -> alias }}'s Profile Details</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2">
            <table class="table table-sdiviped">
                <tr>
                    <th>Name:</th>
                    <td>{{ $user -> alias }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>
                        <a href="mailto:{{ $user -> email }}">{{ $user -> email }}</a>
                    </td>
                </tr>
                <tr>
                    <th>Date of Birth:</th>
                    <td>{{ date_format(date_create($user->age), 'd/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Age:</th>
                    <td>{{ date_diff(date_create($user->age), date_create('today'))->y }}</td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>{{ $user -> gender == 'F' ? 'Female' : 'Male' }}</td>
                </tr>
                <tr>
                    <th>Weight:</th>
                    <td>{{ $user -> weight }}</td>
                </tr>
                <tr>
                    <th>Height:</th>
                    <td>{{ $user -> height }}</td>
                </tr>
                <tr>
                    <th>Privacy:</th>
                    <td>{{ $user -> privacy -> name['en']}}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>
                        @if ($user->status->id == 1)
                            <a class="status btn btn-warning fit_btn-warning" data-id="{{ $user -> id }}" data-url="{{ route('userStatus', ['id' => $user->id]) }}"><i class="icon-{{ $user -> id }} fa fa-unlock" aria-hidden="true"></i></a>
                        @elseif ($user->status->id == 2)
                            <a class="status btn btn-warning fit_btn-warning" data-id="{{ $user -> id }}" data-url="{{ route('userStatus', ['id' => $user->id]) }}"><i class="icon-{{ $user -> id }} fa fa-lock" aria-hidden="true"></i></a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Delete:</th>
                    <td>
                        <a class="btn btn-danger fit_btn-danger" href="{{ route('userDelete', ['id' => $user->id, 'redirect' => true]) }}" onclick="confirmDelete(event)"><i class="fa fa-ban" aria-hidden="true"></i></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
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
    
    function confirmDelete(e) {
        if(!confirm('Are you sure you want to delete this user ?'))
            e.preventDefault();
    }
</script>
@endsection
