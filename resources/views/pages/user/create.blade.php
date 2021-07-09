@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/plugins/select2/select2.min.css') }}">
@endsection

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

    	<div class="col-lg-12" id="app">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Add User <small class="text-danger">* is mandatory.</small></h5>
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
					<form method="post" action="{{ route('users.store') }}" class="form-horizontal">
						@csrf

						<div class="row">

							<div class="form-group col-md-4 @error('first_name') has-error @enderror">
								<div class="col-sm-12">
									<label class="control-label">First Name *</label>
									<input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control">
									@error('first_name')
										<span class="text-danger small">
											{{ $message }}
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group col-md-4 @error('middle_name') has-error @enderror">
								<div class="col-sm-12">
									<label class="control-label">Middle Name</label>
									<input type="text" name="middle_name" value="{{ old('middle_name') }}" class="form-control">
									@error('middle_name')
										<span class="text-danger small">
											{{ $message }}
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group col-md-4 @error('last_name') has-error @enderror">
								<div class="col-sm-12">
									<label class="control-label">Last Name *</label>
									<input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
									@error('last_name')
										<span class="text-danger small">
											{{ $message }}
										</span>
									@enderror
								</div>
							</div>

						</div>

						<div class="row">
							<div class="form-group col-sm-6 @error('email') has-error @enderror">
								<div class="col-sm-12">
									<label class="control-label">Email *</label>
									<input type="text" name="email" value="{{ old('email') }}" class="form-control">
									@error('email')
										<span class="text-danger small">
											{{ $message }}
										</span>
									@enderror
								</div>
							</div>
							<div class="form-group col-sm-6 @error('role') has-error @enderror">
								<div class="col-sm-12">
									<label class="control-label">Role *</label>
									<select type="text" name="role[]" multiple class="form-control select2">
										@foreach ($roles as $role)
											<option {{ old('role') == $role->name? 'selected':'' }} value="{{ $role->name }}">{{ title_case($role->name) }}</option>
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

						<div class="row">
							<div class="form-group col-sm-6 @error('phone') has-error @enderror">
								<div class="col-sm-12">
									<label class="control-label">Phone Number</label>
									<input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
									@error('phone')
										<span class="text-danger small">
											{{ $message }}
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group col-sm-6 @error('title') has-error @enderror">
								<div class="col-sm-12">
									<label class="control-label">Title *</label>
									<select type="text" name="title" class="form-control">
										<option selected disabled>Choose Title</option>
										<option @if(old('title') == 'Mr.') selected @endif value="Mr.">Mr</option>
										<option @if(old('title') == 'Ms.') selected @endif value="Ms.">Ms</option>
										<option @if(old('title') == 'Dr.') selected @endif value="Dr.">Dr</option>
										<option @if(old('title') == 'Prof.') selected @endif value="Prof.">Prof</option>
										<option @if(old('title') == 'Eng.') selected @endif value="Eng.">Eng</option>
									</select>
									@error('title')
										<span class="text-danger small">
											{{ $message }}
										</span>
									@enderror
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<a class="btn btn-white" href="{{ route('users.index') }}">Cancel</a>
								<button class="btn btn-primary" type="submit">Create</button>
							</div>
						</div>
					</form>
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
				placeholder: 'Select role',
                containerCss: {
                    'height': '30px'
                }
            })

        });

    </script>
@endsection
