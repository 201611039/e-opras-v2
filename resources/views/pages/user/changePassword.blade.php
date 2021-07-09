@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

    	<div class="col-lg-12" id="app">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Change Password <small class="text-danger">* is mandatory.</small></h5>
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
                    <form method="post" id="form" action="{{ route('user.change.password', auth()->user()->slug) }}" class="form-horizontal">
                        @csrf
                        <div class="form-group @error('old_password') has-error @enderror">
                            <label class="col-sm-2 control-label">Old Password *</label>
                            <div class="col-sm-4">
                                <div class="input-group m-b">
                                    <input type="password" name="old_password" placeholder="Old password" value="{{ old('old_password') }}" class="form-control">
                                    <a href="javascript:void(0)" @click="showPassword('old_password')" class="input-group-addon"><span> <i :class="['fa', faOldPass]"></i></span></a>
                                </div>
                                @error('old_password')
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group @error('password') has-error @enderror" :class="passwordError?'has-error':''">
                            <label class="col-sm-2 control-label">New Password *</label>
                            <div class="col-sm-4">
                                <div class="input-group m-b">
                                    <input type="password" v-model="password" name="password" placeholder="New password" value="{{ old('password') }}" class="form-control">
                                    <a href="javascript:void(0)" @click="showPassword('password')" class="input-group-addon"><span> <i :class="['fa', faPass]"></i></span></a>
                                </div>
                                @error('password')
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <span v-if="passwordError" class="text-danger small">
                                    @{{ passwordError }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group @error('password_confirmation') has-error @enderror" :class="confirmPasswordError?'has-error':''">
                            <label class="col-sm-2 control-label">Confirm Password *</label>
                            <div class="col-sm-4">
                                <div class="input-group m-b">
                                    <input type="password" v-model="confirmPassword" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}" class="form-control">
                                    <a href="javascript:void(0)" @click="showPassword('password_confirmation')" class="input-group-addon"><span> <i :class="['fa', faConfPass]"></i></span></a>
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <span v-if="confirmPasswordError" class="text-danger small">
                                    @{{ confirmPasswordError }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="button" @click="submit">Change</button>
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
        new Vue({
            el: '#app',

            data: {
                password: '',
                confirmPassword: '',
                regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,15}$/,
                passwordError: '',
                confirmPasswordError: '',
                faPass: 'fa-eye',
                faConfPass: 'fa-eye',
                faOldPass: 'fa-eye',
            },

            methods: {
                checkPassword() {
                    if (!this.password.match(this.regex)) {
                        this.passwordError = 'Password should be between 6 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character'
                        this.confirmPasswordError = ''
                        return 0;
                    } else if(this.password != this.confirmPassword) {
                        this.confirmPasswordError = 'Password does not match'
                        this.passwordError = ''
                        return 0;
                    } else {
                        this.passwordError = ''
                        this.confirmPasswordError = ''
                        return 1;
                    }
                },

                showPassword(type) {
                    var input = $('input[name='+type+']')
                    input.attr('type', function(index, attr){
                        return attr == 'password' ? 'text' : 'password';
                    });

                    if (type == 'password') {
                        this.faPass == 'fa-eye'? this.faPass = 'fa-eye-slash': this.faPass = 'fa-eye'
                    } else if(type == 'password_confirmation') {
                        this.faConfPass == 'fa-eye'? this.faConfPass = 'fa-eye-slash': this.faConfPass = 'fa-eye'
                    } else if(type == 'old_password') {
                        this.faOldPass == 'fa-eye'? this.faOldPass = 'fa-eye-slash': this.faOldPass = 'fa-eye'
                    }
                },

                submit () {
                    if(this.checkPassword()) {
                        $('#form').submit();
                    }
                }
            }
        })
    </script>
@endsection
