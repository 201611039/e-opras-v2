@extends('layouts.app')


@section('css')
    <link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')


	<div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="profile-image">
                                <a href="#" data-toggle="modal" data-target="#myModal">
                                    <img src="{{ Auth::user()->image_path == ''? asset('img/profiles/user.png') : asset(Auth::user()->image_path) }}" class="img-circle circle-border m-b-md" alt="profile">
                                </a>

                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Change Profile Photo</h4>
                                        </div>
                                        <div class="modal-body">
                                            @if (auth()->user()->image_path)
                                            {{-- <form action="{{ route('remove.image', $profile->user->getRouteKey()) }}" method="post"> --}}
                                                {{ csrf_field() }}
                                                @method('DELETE')

                                                <button class="btn btn-danger" type="submit">Remove image</button>
                                            {{-- </form> --}}
                                            @endif

                                            <hr>

                                            <form action="{{ route('profile-image.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="photo">Profile Picture</label>
                                                    <input type="file" name="photo" id="photo"  aria-describedby="helpId">
                                                    <small id="helpId" class="text-danger">
                                                        @error('photo')
                                                        <span class="text-danger small">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </form>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                            <div class="profile-info">
                                <div class="" style="margin-top: 20px;">
                                    <div>
                                        <h4 class="no-margins">
                                            {{ $profile->user->full_name }}
                                        </h4>
                                        <small>{!! $personalInformation->post->name??'<span class="badge badge-danger">Unknown</span>' !!}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <table class="table small m-b-xs">
                                <tbody>
                                <tr>
                                    <td>
                                        <strong>{{ $personalInformation->period }}</strong> Month Employed
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Member Since
                                        <strong>{{ auth()->user()->created_at->format('dS M Y') }}</strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <small><strong>Bio</strong></small>
                    <div style="word-wrap: break-word;" class="well">
                        {!!($profile->bio)!!}
                    </div>
                </div>

                <div class="col-md-6">
                    <h3>Avarage score in last 5 years <span class="badge badge-primary">{{ (\App\Models\Opras::where('user_id', $user->id)->get()->pluck('overallPerformance'))->average('overall_mark') }}</span></h3>
                    <div id="chart" style="height: 300px;"></div>
                </div>
            </div>

            @if (Auth::id() == $profile->user->id)
               @php
                    $class = "col-lg-12";
                    $hidden = "hidden";

                @endphp
            @else
                @php
                    $class = "col-lg-9";
                    $hidden = "";
                 @endphp
            @endif
            <div class="row">

                <div class="col-lg-3 {{ $hidden }}">

                    <div class="ibox">
                        <div class="ibox-content">
                                <h3>About {{ $profile->user->first_name }}</h3>

                            <p class="small">

                            </p>

                        </div>
                    </div>

                </div>

                <div class="{{ $class }}">

                 <div class="ibox float-e-margins">
                        {{-- <div class="ibox-title">
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div> --}}
                        <div class="ibox-content">
                            <form action="{{ route('profile.update', $user->slug) }}" method="post" class="form-horizontal">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group @error('directorate') has-error @enderror col-sm-6">
                                        <div class="col-sm-12">
                                            <label class=" control-label">Faculty / Directorate</label>
                                            <select type="text" name="directorate" class="form-control select2">
                                                <option value="" disabled selected>Choose your Facult/Directorate</option>
                                            @foreach (\App\Models\Directorate::all() as $directorate)
                                                <option value="{{$directorate->id}}" {{$directorate->id == ($personalInformation->directorate_id??'')?'selected':''}}>{{$directorate->name}}</option>
                                            @endforeach
                                            </select>
                                            @error('directorate')
                                                <span class="text-danger small">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group @error('present_station') has-error @enderror col-sm-6">
                                        <div class="col-sm-12">
                                           <label class=" control-label">Present Station</label>
                                           <select type="text" name="present_station" class="form-control select2">
                                                <option value="" disabled selected>Choose your Present Station</option>
                                            @foreach (\App\Models\Station::all() as $present_station)
                                                <option value="{{$present_station->id}}" {{$present_station->id == ($personalInformation->station_id??'')?'selected':''}}>{{$present_station->name}}</option>
                                            @endforeach
                                            </select>
                                            @error('present_station')
                                                <span class="text-danger small">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group @error('academic_qualification') has-error @enderror col-sm-12">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8 center">
                                           <label class=" control-label">Academic Qualification</label>
                                            <input type="text" disabled name="academic_qualification" value="{{ old('academic_qualification')??($personalInformation->academic_qualification??'') }}" class="form-control">
                                            @error('academic_qualification')
                                                <span class="text-danger small">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group @error('duty_post') has-error @enderror col-sm-6">
                                        <div class="col-sm-12">
                                           <label class="control-label">Duty Post</label>
                                           <select type="text" name="duty_post" class="form-control select2">
                                                <option value="" disabled selected>Choose your Duty Post</option>
                                            @foreach (\App\Models\Post::all() as $duty_post)
                                                <option value="{{$duty_post->id}}" {{$duty_post->id == ($personalInformation->post_id??'')?'selected':''}}>{{$duty_post->name}}</option>
                                            @endforeach
                                            </select>
                                            @error('duty_post')
                                                <span class="text-danger small">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group @error('substantive_post') has-error @enderror col-sm-6">
                                        <div class="col-sm-12">
                                        <label class="control-label">Substative Post</label>
                                            <input type="text" disabled name="substantive_post" value="{{ old('substantive_post')??($personalInformation->substantive_post??'') }}" class="form-control">
                                            @error('substantive_post')
                                                <span class="text-danger small">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    @if (Auth::id() == $profile->user->id)
                                    <div class="form-group @error('salary_scale') has-error @enderror col-sm-3">
                                        <div class="col-sm-12">
                                      <label class="control-label">Salary scale</label>
                                            <input type="text" disabled name="salary_scale" value="{{ old('salary_scale')??($personalInformation->salary_scale??'')}}" class="form-control">
                                            @error('salary_scale')
                                                <span class="text-danger small">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif

                                    <div class="form-group @error('period') has-error @enderror col-sm-5">
                                        <div class="col-sm-12">
                                        <label class="control-label">Period served under Present Supervisor <br><small></small></label>
                                            <input type="number" disabled name="period" value="{{ old('period')??($personalInformation->period??'') }}" class="form-control">
                                            @error('period')
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
                                                <div class="col-sm-6">
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="gender_id" id="radio1" value="2" {{ $user->gender_id == 2? 'checked':'' }}>
                                                        <label for="radio1">
                                                            Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="gender_id" id="radio2" value="1" {{ $user->gender_id == 1? 'checked':'' }}>
                                                        <label for="radio2">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"> </div>
                                    </div>

                                </div>

                                <div class="row">

                                    @if (Auth::id() == $profile->user->id)
                                    <div class="col-sm-4">
                                        <div class="form-group @error('date_of_birth') has-error @enderror">
                                            <div class="" id="data_3">
                                                <label class="">Date of Birth</label>
                                                <div class="col-sm-10 input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth')??(isset($profile->date_of_birth)?$profile->date_of_birth->format('d/m/Y'):'') }}">
                                                    @error('date_of_birth')
                                                        <span class="text-danger small">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-sm-4">
                                        <div class="form-group @error('first_appointment') has-error @enderror">
                                            <div class="" id="data_2">
                                                <label class="">Date of First Appointment</label>
                                                <div class="col-sm-10 input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="first_appointment" value="{{ old('first_appointment')??(isset($profile->first_appointment)?$profile->first_appointment->format('d/m/Y'):'') }}">
                                                    @error('first_appointment')
                                                        <span class="text-danger small">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group @error('first_appointment_present_post') has-error @enderror">
                                            <div class="" id="data_3">
                                                <label class="">Date of Appointment to present post</label>
                                                <div class="col-sm-10 input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" disabled class="form-control" name="first_appointment_present_post" value="{{ old('first_appointment_present_post')??(isset($personalInformation->first_appointment_present_post)?$personalInformation->first_appointment_present_post->format('d/m/Y'):'') }}">
                                                    @error('first_appointment_present_post')
                                                        <span class="text-danger small">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @if (Auth::id() == $profile->user->id)

                                    <div class="row">
                                        <div class="form-group @error('supervisor') has-error @enderror col-sm-12">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8 center">
                                               <label class=" control-label">Supervisor</label>
                                                <select type="text" name="supervisor" value="{{ old('supervisor')??$profile->supervisor }}" class="form-control select2">
                                                    <option value="" disabled selected>Choose your supervisor</option>
                                                    @foreach (\App\Models\User::permission('opras-review')->where('id', '!=', Auth::id())->get() as $supervisor)
                                                    <option value="{{$supervisor->id}}" {{$supervisor->id == ($personalInformation->supervisor_id??'')?'selected':''}}>{{$supervisor->full_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('supervisor')
                                                    <span class="text-danger small">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>My Bio</label>
                                        <textarea class="form-control" id="bio"  name="bio">{!! $profile->bio??'' !!}</textarea>
                                    </div>

                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="form-group col-sm-6">
                                                <label class=" control-label">Term of Service</label>
                                                <select type="text" name="term_of_service" value="{{ old('term_of_service')??$profile->term_of_service }}" class="form-control select2">
                                                    <option value="" disabled selected>Choose your term of service</option>
                                                    <option value="permanent" {{($personalInformation->term_of_service??'') == 'permanent'? 'selected':''}}>Permanent</option>
                                                    <option value="contract" {{($personalInformation->term_of_service??'') == 'contract'? 'selected':''}}>Contract</option>
                                                </select>
                                                @error('term_of_service')
                                                    <span class="text-danger small">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>


@endsection


@section('js')
	<!-- Sparkline -->
    <script src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Data picker -->
    <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>

    <script>

        $(document).ready(function() {


            $("#sparkline1").sparkline([0, 3.5, 4.4, 4.2, 4.0, 5], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            ClassicEditor
            .create( document.querySelector( '#bio' ) )
            .then( editor => {
                    // editor.isReadOnly = true;
            } )
            .catch( error => {
                    console.error( error );
            } );

            $(".select2")
            .select2({
                containerCss: {
                    'height': '30px'
                }
            })
            .prop("disabled", true);


        });
    </script>

    <script>
        const chart = new Chartisan({
        el: '#chart',
        url: "@chart('overall_performance')",
        hooks: new ChartisanHooks()
            // .responsive()
            // .beginAtZero()
            // .title('This is a sample chart using chartisan!')
            .legend({ position: 'bottom' })
            .datasets([{ type: 'line' }]),
        });
    </script>
@endsection
