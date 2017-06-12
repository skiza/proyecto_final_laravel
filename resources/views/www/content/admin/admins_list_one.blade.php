@extends('www.layouts.default')

@section('title','Admin List One')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ $admin -> alias }}'s Profile Details</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2">
            <table class="table table-sdiviped">
                <tr>
                    <th>Name:</th>
                    <td>{{ $admin -> alias }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>
                        <a href="mailto:{{ $admin -> email }}">{{ $admin -> email }}</a>
                    </td>
                </tr>
                <tr>
                    <th>Date of Birth:</th>
                    <td>{{ date_format(date_create($admin->age), 'd/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Age:</th>
                    <td>{{ date_diff(date_create($admin->age), date_create('today'))->y }}</td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>{{ $admin -> gender == 'F' ? 'Female' : 'Male' }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
