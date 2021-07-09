@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight" id="app">
        @include('pages.user.config.welcomeNote')

        <div class="panel">
            <div class="panel-body">
                <form action="{{ route('lecturer.store') }}" method="post">
                    @csrf
        
                    <div class="row">
        
                        <div class="form-group col-md-4 @error('first_name') has-error @enderror">
                            <div class="col-sm-12">
                                <label class="control-label">First Name *</label>
                                <input type="text" name="first_name" value="{{ old('first_name')??auth()->user()->first_name }}" class="form-control">
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
                                <input type="text" name="middle_name" value="{{ old('middle_name')??auth()->user()->middle_name }}" class="form-control">
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
                                <input type="text" name="last_name" value="{{ old('last_name')??auth()->user()->surname }}" class="form-control">
                                @error('last_name')
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                    </div>
        
                    <div class="form-group @error('phone') has-error @enderror col-sm-3">
                        <label class="control-label">Phone Number</label>
                        <input type="text" placeholder="255656102210" name="phone" value="{{ old('phone')??auth()->user()->phone }}" aria-describedby="basic-addon1" class="form-control">
                        @error('phone')
                            <span class="text-danger small">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group @error('email') has-error @enderror col-sm-5">
                        <div class="col-sm-12">
                        <label class="control-label">Email Address<br><small></small></label>
                            <input type="email" name="email" value="{{ old('email')??auth()->user()->email }}" class="form-control">
                            @error('email')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group col-sm-4">
                        <div class="col-sm-1"> </div>
                        <div class="col-sm-10">
                            <label class="control-label">Gender <br><small></small></label>
                            <div class="col-sm-12">
                                @foreach (App\Gender::orderBy('id', 'desc')->get() as $gender)
                                    <div class="col-sm-6">
                                        <div class="radio radio-primary">
                                            <input type="radio" name="gender_id" id="radio1" value="{{ $gender->id }}" {{ ($gender->id == auth()->user()->gender_id)? 'checked':'' }}>
                                            <label for="radio1">
                                                {{ $gender->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-1"> </div>
                    </div>
        
        
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <div class="col-sm-12">
                                <label class="control-label">Title *</label>
                                <select type="text" name="title" class="form-control">
                                    <option selected disabled>Choose Title</option>
                                    <option @if(old('title')=='Mr.' ) selected @endif value="Mr.">Mr</option>
                                    <option @if(old('title')=='Ms.' ) selected @endif value="Ms.">Ms</option>
                                    <option @if(old('title')=='Dr.' ) selected @endif value="Dr.">Dr</option>
                                    <option @if(old('title')=='Prof.' ) selected @endif value="Prof.">Prof</option>
                                    <option @if(old('title')=='Eng.' ) selected @endif value="Eng.">Eng</option>
                                </select>
                                @error('title')
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-sm-8 @error('department') has-error @enderror" :class="col">
                            <div class="col-sm-12">
                                <label class="control-label">Department *</label>
                                <v-select :options="departments" v-model="department" :reduce="departments => departments.id" label="name" placeholder="Choose your Department"></v-select>
                                <input type="text" hidden :value="department" name="department">
                                @error('department')
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
        
                </form>
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
                departments: @json($departments),
				department: '',
			},
		});
	</script>
@endsection

