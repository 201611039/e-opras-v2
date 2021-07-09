@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            @livewire('form.side-links', ['opras' => request()->user()->myOpras()], key(request()->user()->myOpras()->id))

            <div class="col-md-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form action="{{ route('mid-year-review.update', $midYearReview->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Agreed Objectives *</label>
                                <div class="well" style="word-wrap: break-word;">
                                    {!! $midYearReview->objective !!}
                                </div>
                                @error('objective')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Progress Made *</label>
                                <textarea class="summernote" id="progress_made" name="progress_made">
                                    {!! old('progress_made')??$midYearReview->progress_made !!}
                                </textarea>
                                @error('progress_made')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Factor Affecting Performance *</label>
                                <textarea class="summernote" id="factor_affecting_performance" name="factor_affecting_performance">
                                    {!! old('factor_affecting_performance')??$midYearReview->factor_affecting_performance !!}
                                </textarea>
                                @error('factor_affecting_performance')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <a class="btn btn-info" href="{{ route('mid-year-review.index') }}">Back</a>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script>
     ClassicEditor
        .create( document.querySelector( '#progress_made' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );

     ClassicEditor
        .create( document.querySelector( '#factor_affecting_performance' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );

</script>
@endsection
