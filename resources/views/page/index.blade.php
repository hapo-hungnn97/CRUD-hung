@extends('element.master')
@section('title', 'index')
@section('content')
<h2 class="mt-5">Student List</h2>
<a href="{{ Route('users.create') }}" class="btn btn-success my-3">Add</a> 
    @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif         
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Full name</th>
                <th>Avatar</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->full_name }}</td>
                <td>
                    <img src="{{ ($user->avatar == null) ? 'images/avatar-none.png' : asset('storage/'.$user->avatar) }}" alt="" class="rounded-circle" width="35px">
                </td>
                <td>{{ $user->gender == App\User::GENDER_MALE ? 'Male' : 'Female' }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone_number }}</td>
                <td class="form-inline">
                    <a href="{{ Route('users.edit',$user->id) }}" class="btn btn-info">Sửa</a>
                    <form action="{{ Route('users.destroy',$user->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">Xóa</button>
                    </form> 
                </td>
            </tr>
            @endforeach()
        </tbody>
    </table>
@endsection
