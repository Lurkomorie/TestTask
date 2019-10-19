@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="form-inline" method="POST" action="{{ route('user/store') }}">
                @csrf
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="sr-only">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Phone</label>
                    <input type="text" class="form-control" id="inputPassword2" name="phone" placeholder="Phone">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Add user</button>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Link</th>
                    <th scope="col">Functions</th>
                </tr>
                </thead>
            </tbody>
                @foreach (\App\User::all() as $u)
                    <tr>
                        <!-- Task Name -->
                        <td >
                            <div>{{ $u->id }}</div>
                        </td>

                        <td>
                            <div>{{ $u->username }}</div>
                        </td>
                        <td>
                            <div>{{ $u->phone }}</div>
                        </td>
                        <td>
                            <div>/magic/{{ $u->link }}</div>
                        </td>
                        <td>
                            @if(Auth::user()->id !== $u->id)
                            <a class="btn btn-sm btn-outline-dark" href="{!! route('user/delete', ['id' => $u->id]) !!}">
                                Destroy
                            </a>
                            @endif
                            <a class="btn btn-sm btn-outline-dark" href="{!! route('user/edit', ['id' => $u->id]) !!}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(session('editMode'))
            <form class="form-inline" method="POST" action="{{ route('user/update') }}">
                @csrf
                <input type="text" value="{{session('user')->id}}" class="form-control" id="id" placeholder="id" hidden name="id">
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="sr-only">Username</label>
                    <input type="text" class="form-control" value="{{session('user')->username}}" id="username" placeholder="Username" name="username">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Phone</label>
                    <input type="text" class="form-control" value="{{session('user')->phone}}" id="inputPassword2" name="phone" placeholder="Phone">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Edit</button>
            </form>
                @endif
        </div>
    </div>
@endsection
