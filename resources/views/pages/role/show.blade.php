@extends('layouts.app')	

@section('css')
	<link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
	<style>
		.col-centered{
		    float: none;
		    margin: 0 auto;
		}
	</style>
@endsection

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

    	<div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Permissions for {{title_case($role->name). ' Role'}}</h5>
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
                    <form method="post" action="{{ route('roles.update', $role->id) }}" class="form-horizontal">
                        @csrf
                        @method('PUT')

                        
                            @php
                                $header = '';
                                $count = 0;
                            @endphp
                            
                            @foreach ($permissions as $key => $object)
                            <div style="border-bottom:1px solid lightgrey; border-spacing: 5px;">
                            @php
                            $count = 0;
                            @endphp
                            <div class="row">
                                @foreach ($object as $permission)
                                @if (!$count)
                                    <div class="text-danger" style="margin-left:15px; font-size:15px;">{{title_case($key).' Management'}}</div>
                                    @php
                                        $count++
                                    @endphp                                       
                                @endif
                                    <div class="col-sm-3">
                                        <div class="checkbox checkbox-info checkbox-circle">
                                            <input id="checkbox{{ $permission->name }}" name="{{ $permission->name }}" value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name)? 'checked':'' }} type="checkbox">
                                            <label for="checkbox{{ $permission->name }}">
                                                {{ $permission->name}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            </div>
                            <br>
                            @endforeach
            

                        <div class="form-group" style="margin-top: 20px;">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="{{ route('roles.index') }}">Cancel</a>
                                <button class="btn btn-primary" type="submit">Grant</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

	</div>
</div>

@endsection