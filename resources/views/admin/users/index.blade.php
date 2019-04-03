@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">User List</div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Permission</th>
                <th>Delete</th>
                </thead>

                <tbody>
                @if($users->count()>0)
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{asset($user->profile->avatar)}}" alt="User Avatar" width="60px" height="60px" style="border-radius:50%; ">
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                @if(Auth::user()->id !== $user->id)
                                    @if($user->admin)
                                        <a href="{{route('user.not_admin', ['id' => $user->id])}}" class="btn btn-danger">Remove Permission</a>
                                    @else
                                        <a href="{{route('user.admin', ['id' => $user->id])}}" class="btn btn-success">Make Admin</a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(Auth::id() !== $user->id)
                                    <form action="{{route('user.destroy', ['id' => $user->id])}}" method="post">
                                        @method('DELETE')
                                        {{csrf_field()}}
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            </td>

                        </tr>
                    @endforeach

                @else
                    <tr>
                        <th colspan=5 class="text-center">No Users</th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>



@stop