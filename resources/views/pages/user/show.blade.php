@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')


	<div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <a href="#">
                            <img src="{{ Auth::user()->image_path == ''? asset('img/profiles/user.png') : asset(Auth::user()->image_path) }}" class="img-circle circle-border m-b-md" alt="profile">
                        </a>
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    {{ $user->full_name }}
                                </h2>
                                @php
                                    $roles = collect($user->getRoleNames())->implode(', ');
                                @endphp
                                <h4>{!! title_case($roles)??'<span class="badge badge-danger">Unknown</span>' !!}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">Select roles to assign to user</div>
                        <div class="ibox-content">
                            <form action="{{ route('user.role.add', $user->getRouteKey()) }}" method="post" class="form-horizontal">
                                @csrf

                                <div class="row">
                                    <div class="form-group @error('directorate') has-error @enderror">
                                        <div class="col-sm-12">
                                            <label class=" control-label">Roles</label>
                                            <select type="text" name="roles[]" class="form-control select2">
                                            <option value="" disabled selected>Select roles</option>
                                            @foreach (\App\Models\Role::whereNotIn('name', collect($user->getRoleNames())->merge('super-admin'))->get() as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <span class="text-danger small">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">List of assigned roles</div>
                        <div class="ibox-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->getRoleNames() as $key => $role)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ title_case($role) }}</td>
                                            <td>
                                                <button class="btn btn-danger" onclick="$('#'+{{ $key }}).submit()">Remove</button>
                                            </td>
                                            <form hidden action="{{ route('user.role.remove', $user->getRouteKey()) }}" method="post" id="{{ $key }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" value="{{ $role }}" name="role" hidden>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection


@section('js')
    <!-- Select2 -->
    <script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>


    <script>

        $(document).ready(function() {

            $(".select2")
            .select2({
                containerCss: {
                    'height': '30px'
                }
            })

        });

    </script>
@endsection
