@extends('layouts.app')

@section('content')
<form method="POST" id="form" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group @error('email') has-error @enderror">
        <input type="email" name="email" value="{{ $email ?? old('email') }}" class="form-control" placeholder="E-mail Address" required>
        @error('email')
            <span class="text-danger small">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group @error('password') has-error @enderror" :class="passwordError?'has-error':''">
        <div class="">
            <div class="input-group m-b">
                <input type="password" v-model="password" name="password" placeholder="New password" value="{{ old('password') }}" class="form-control">
                <a href="javascript:void(0)" @click="showPassword('password')" class="input-group-addon"><span> <i :class="['fa', faPass]"></i></span></a>
            </div>
            @error('password')
                <span class="text-danger small text-left">
                    {{ $message }}
                </span>
            @enderror
            <span v-if="passwordError" class="text-danger small text-left">
                @{{ passwordError }}
            </span>
        </div>
    </div>

    <div class="form-group @error('password_confirmation') has-error @enderror" :class="confirmPasswordError?'has-error':''">
        <div class="">
            <div class="input-group m-b">
                <input type="password" v-model="confirmPassword" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}" class="form-control">
                <a href="javascript:void(0)" @click="showPassword('password_confirmation')" class="input-group-addon"><span> <i :class="['fa', faConfPass]"></i></span></a>
            </div>
            @error('password_confirmation')
                <span class="text-danger small text-left">
                    {{ $message }}
                </span>
            @enderror
            <span v-if="confirmPasswordError" class="text-danger small text-left">
                @{{ confirmPasswordError }}
            </span>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="button" class="btn btn-primary" @click="submit">
                {{ __('Reset Password') }}
            </button>
        </div>
    </div>
</form>
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
