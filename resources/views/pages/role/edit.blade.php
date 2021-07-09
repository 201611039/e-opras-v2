@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

    	<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Edit Role <small class="text-danger">* is mandatory.</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" action="{{ route('roles.update', $role->getRouteKey()) }}" class="form-horizontal">
                            	@csrf
                                @method('PUT')
                                <div class="form-group @error('name') has-error @enderror">
                                	<label class="col-sm-2 control-label">Name *</label>
                                    <div class="col-sm-4">
                                    	<input type="text" name="name" value="{{ old('name') == ''? $role->name:old('name') }}" class="form-control">
                                    	@error('name')
                                    		<span class="text-danger small">
                                    			{{ $message }}
                                    		</span>
                                    	@enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a class="btn btn-white" href="{{ route('roles.index') }}">Cancel</a>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

	</div>
</div>

@endsection
