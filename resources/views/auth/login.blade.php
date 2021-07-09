@extends('layouts.app')

@section('content')
        <form class="mt-5" role="form" action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group @error('email') has-error @enderror">
                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="email" required="">
                @error('email')
                    <span class="text-danger small" style="text-align: left !important;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group @error('password') has-error @enderror ">
                <div class="input-group m-b">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    <a href="javascript:void(0)" @click="showPassword('password', $event.currentTarget)" class="input-group-addon"><span> <i :class="['fa', fa]"></i></span></a>
                </div>
                @error('password')
                    <span class="text-danger small">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <div class="text-center">
                <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
            </div>
        </form>
        <p class="m-t text-center"><small><strong>Copyright</strong> &copy; 2020 Mbeya University of Science and Technology  </small> </p>
@endsection


@section('js')
    <script>
        new Vue({
            el: '#app',

            data: {
                fa: 'fa-eye'
            },

            methods: {
                showPassword(type, element) {
                    var input = $('input[name='+type+']')
                    input.attr('type', function(index, attr){
                        return attr == 'password' ? 'text' : 'password';
                    });

                    this.fa == 'fa-eye'? this.fa = 'fa-eye-slash': this.fa = 'fa-eye'
                    // element.firstElementChild.firstElementChild.toggleClass('fa-eye', 'fa-eye-slash');
                    console.log();

                }
            }
        })
    </script>
@endsection
