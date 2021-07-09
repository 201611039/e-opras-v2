@extends('layouts.app')

@section('css')

    <!-- Data Tables -->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
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
                                <i class="fa fa-plus-square-o"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="{{ route('roles.create') }}">Add Role</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-bordered table-hover dataTables" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach ($roles as $key => $role)
		                    <tr class="gradeX">
		                        <td>{{ $key+1 }}</td>
		                        <td>{{ $role->full_name }}</td>
		                        <td class="text-center">

		                        	{!! $role->deleted_at == ''? '<span class="badge badge-primary">Active</span>':'<span class="badge badge-danger">Inactive</span>' !!}
		                        </td>
		                        <td class="text-center">
                                    @if (isset($role->deleted_at))
                                    <a style="margin-right: 10px;" href="javascript:void(0)" onclick="restoreRole({{ $role }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-exchange"></i></a>
                                    @else
		                        	<a style="margin-right: 10px; color:green;" href="{{ route('roles.show', $role->slug) }}" class="" data-toggle="tooltip" data-placement="top" title="Permissions"><i class="fa fa-shield"></i></a>
                                    <a style="margin-right: 10px;" href="{{ route('roles.edit', $role->slug) }}" class="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
		                        	<a href="javascript:void(0)" onclick="deleteRole({{ $role }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    @endif
                                    <form hidden method="post" action="{{ route('roles.destroy', $role->slug) }}" id="form{{ $role->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
		                        </td>
		                    </tr>
                    	@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection

@section('js')
	<!-- Data Tables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

    <!-- Sweet alert -->
    <script src="{{ asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <script>
       function deleteRole(role) {
            swal({
                title: "Are you sure?",
                text: 'Deactivate '+ role.name + ' role ?',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Deactivate!",
                closeOnConfirm: false
            }, function () {
                $('#form'+role.id).submit()
            });
        }

       function restoreRole(role) {
            swal({
                title: "Are you sure?",
                text: 'Deactivate '+ role.name + ' role ?',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Restore!",
                closeOnConfirm: false
            }, function () {
                $('#form'+role.id).submit()
            });
        }

        $(document).ready(function() {
            $('.dataTables').DataTable();
        });

    </script>
@endsection
