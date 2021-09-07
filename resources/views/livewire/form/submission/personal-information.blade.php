<div>
    <h3 class="form-header"><span>Personal Information</span></h3>
    <div class="row">
        <div class="form-group @error('directorate_id') has-error @enderror col-sm-6">
            <div class="col-sm-12">
                <label class=" control-label">Faculty / Directorate</label>
                <select type="text" name="directorate_id" class="form-control select2">
                    <option value="" disabled selected>Choose your Facult/Directorate</option>
                @foreach (\App\Models\Directorate::all() as $directorate)
                    <option value="{{$directorate->id}}" {{$directorate->id == ($personalInformation->directorate_id??'')?'selected':''}}>{{$directorate->name}}</option>
                @endforeach
                </select>
                @error('directorate_id')
                    <span class="text-danger small">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group @error('station_id') has-error @enderror col-sm-6">
            <div class="col-sm-12">
               <label class=" control-label">Present Station</label>
               <select type="text" name="station_id" class="form-control select2">
                    <option value="" disabled selected>Choose your Present Station</option>
                @foreach (\App\Models\Station::all() as $present_station)
                    <option value="{{$present_station->id}}" {{$present_station->id == ($personalInformation->station_id??'')?'selected':''}}>{{$present_station->name}}</option>
                @endforeach
                </select>
                @error('station_id')
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
                <input type="text" name="academic_qualification" value="{{ old('academic_qualification')??$personalInformation->academic_qualification }}" class="form-control">
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
        <div class="form-group @error('post_id') has-error @enderror col-sm-6">
            <div class="col-sm-12">
               <label class="control-label">Duty Post</label>
               <select type="text" name="post_id" class="form-control select2">
                    <option value="" disabled selected>Choose your Duty Post</option>
                @foreach (\App\Models\Post::all() as $duty_post)
                    <option value="{{$duty_post->id}}" {{$duty_post->id == ($personalInformation->post_id??'')?'selected':''}}>{{$duty_post->name}}</option>
                @endforeach
                </select>
                @error('post_id')
                    <span class="text-danger small">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group @error('substantive_post') has-error @enderror col-sm-6">
            <div class="col-sm-12">
            <label class="control-label">Substative Post <span class="text-danger">(Optional)</span></label>
                <input type="text" name="substantive_post" value="{{ old('substantive_post')??$personalInformation->substantive_post }}" class="form-control">
                @error('substantive_post')
                    <span class="text-danger small">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">

        <div class="form-group @error('salary_scale') has-error @enderror col-sm-4">
            <div class="col-sm-12">
          <label class="control-label">Salary scale</label>
                <input type="text" name="salary_scale" value="{{ old('salary_scale')??$personalInformation->salary_scale }}" class="form-control">
                @error('salary_scale')
                    <span class="text-danger small">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group @error('period') has-error @enderror col-sm-8">
            <div class="col-sm-12">
            <label class="control-label">Period served under Present Supervisor (Months) <br><small></small></label>
                <input type="number" name="period" value="{{ old('period')??$personalInformation->period }}" class="form-control">
                @error('period')
                    <span class="text-danger small">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-5">
            <div style="padding-left: 16px;" class="form-group @error('first_appointment_present_post') has-error @enderror">
                <div class="" id="data_3">
                    <label class="">Date of Appointment to present post</label>
                    <div class="col-sm-10 input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="first_appointment_present_post" value="{{ old('first_appointment_present_post')??(isset($personalInformation->first_appointment_present_post)?$personalInformation->first_appointment_present_post->format('d/m/Y'):'') }}">
                        @error('first_appointment_present_post')
                            <span class="text-danger small">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="pull-right col-md-7">
            <div class="form-group @error('supervisor_id') has-error @enderror col-sm-12">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 center">
                   <label class=" control-label">Supervisor</label>
                    <select type="text" name="supervisor_id" class="form-control select2">
                        <option value="" disabled selected>Choose your supervisor</option>
                        @foreach (\App\Models\User::role('supervisee')->where('id', '!=', Auth::id())->get() as $supervisor)
                        <option value="{{$supervisor->id}}" {{$supervisor->id == $personalInformation->supervisor_id?'selected':''}}>{{$supervisor->full_name}}</option>
                        @endforeach
                    </select>
                    @error('supervisor_id')
                        <span class="text-danger small">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div style="padding-left: 30px;" class="form-group col-sm-6">
            <label class=" control-label">Term of Service</label>
            <select type="text" name="term_of_service" value="{{ old('term_of_service')??$personalInformation->term_of_service }}" class="form-control select2">
                <option value="" disabled selected>Choose your term of service</option>
                <option value="permanent" {{$personalInformation->term_of_service == 'permanent'? 'selected':''}}>Permanent</option>
                <option value="contract" {{$personalInformation->term_of_service == 'contract'? 'selected':''}}>Contract</option>
            </select>
            @error('term_of_service')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>

@section('js')
    <script>
        $(function () {
            $('input,select').attr('disabled', true);
        });
    </script>
@endsection
