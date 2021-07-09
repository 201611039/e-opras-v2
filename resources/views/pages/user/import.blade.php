@extends('layouts.app')

@section('css')
	<style>
		/* Enter and leave animations can use different */
		/* durations and timing functions.              */
		.slide-fade-enter-active {
		transition: all .6s ease;
		}
		.slide-fade-leave-active {
		transition: all .2s cubic-bezier(1.0, 0.5, 0.8, 1.0);
		}
		.slide-fade-enter, .slide-fade-leave-to
		/* .slide-fade-leave-active below version 2.1.8 */ {
		transform: translateX(10px);
		opacity: 0;
		}
	</style>
@endsection

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

    	<div class="col-lg-12" id="app">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Import Users <small class="text-danger">* is mandatory.</small></h5>
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
					<form method="post" action="{{ route('users.import') }}" class="form-horizontal" enctype="multipart/form-data">
						@csrf


                            {{-- <div class="col-sm-7">
							<div class="form-group @error('role') has-error @enderror">
									<label class="control-label">Role *</label>
									<v-select :options="roles" v-model="role" :reduce="roles => roles.name" label="name" placeholder="Select Role"></v-select>
									<input type="text" hidden :value="role" name="role">
									@error('role')
										<span class="text-danger small">
											{{ $message }}
										</span>
									@enderror
								</div>
                            </div> --}}

                            <div class="col-sm-12">
                            <div class="form-group @error('file') has-error @enderror">
									<label class="control-label">Excel File *</label>
                                    <input type="file" name="file">
                                    @error('file')
										<span class="text-danger small">
											{{ $message }}
										</span>
									@enderror
                                </div>
                            </div>

						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<a class="btn btn-white" href="{{ route('users.index') }}">Cancel</a>
								<button class="btn btn-primary" type="submit">Submit</button>
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
	<script>

		var role = @json(old('role'))

		new Vue({
			el: '#app',

			data: {
				role: '',
				roles: @json($roles),
			},


		});
	</script>
@endsection
