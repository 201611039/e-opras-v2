@extends('layouts.app')

@section('css')
    <!-- Sweet Alert -->
    <link href="{{ asset('css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Users List</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user-plus"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="{{ route('users.create') }}">Add User</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">

                    <div class="table-responsive">
                    <form action="{{ route('user.search') }}" class="pull-right form-inline" method="get">
                        <div class="form-group">
                            <input type="text" value="{{ request('search') }}" name="search" class="form-control" style="margin-bottom: 5px;">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                    <table class="table table-striped table-bordered table-hover dataTables" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>User Type</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach ($users as $key => $user)
		                    <tr class="gradeX">
		                        <td>{{ $users->firstItem() + $key }}</td>
		                        <td>{{ $user->full_name }}</td>
		                        <td>{{ $user->email }}</td>
		                        <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-primary">{{ title_case(str_replace('_', ' ', $role->name)) }}</span>
                                    @endforeach
                                </td>
		                        <td class="center">{{ $user->phone }}</td>
		                        <td class="center">

		                        	{!! $user->deleted_at == ''? '<span class="badge badge-primary">Active</span>':'<span class="badge badge-danger">Inactive</span>' !!}
		                        </td>
		                        <td class="text-center">
                                    @if (isset($user->deleted_at))
                                    <a style="margin-right: 10px;" href="javascript:void(0)" onclick="restoreUser({{ $user}})" class=" text-danger"><i class="fa fa-exchange" data-toggle="tooltip" data-placement="top" title="Restore"></i></a>
                                    @else
		                        	<a style="margin-right: 10px; color:green;" href="{{ route('users.show', $user->slug) }}" class=""><i class="fa fa-shield" data-toggle="tooltip" data-placement="top" title="Roles"></i></a>
		                        	<a style="margin-right: 10px;" href="{{ route('users.edit', $user->slug) }}" class=""><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
		                        	<a href="javascript:void(0)" onclick="deleteUser({{ $user}})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    @endif
                                    <form hidden method="post" action="{{ route('users.destroy', $user->slug) }}" id="form{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
		                        </td>
		                    </tr>
                    	@endforeach
                </tbody>
            </table>

            <div class="pull-right">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection

@section('js')
    <!-- Sweet alert -->
    <script src="{{ asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <script>
       function deleteUser(user) {
            swal({
                title: "Are you sure?",
                text: 'Deactivate '+user.surname+' '+user.first_name+'?',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Deactivate!",
                closeOnConfirm: false
            }, function () {
                $('#form'+user.id).submit()
            });
        }

       function restoreUser(user) {
        swal({
                title: "Are you sure?",
                text: 'Restore '+user.surname+' '+user.first_name+'?',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Restore!",
                closeOnConfirm: false
            }, function () {
                $('#form'+user.id).submit()
            });
        }
    </script>

@endsection
