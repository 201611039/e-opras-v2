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
                        <form action="{{ route('performance-agreement.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Agreed Objectives *</label>
                                <textarea class="summernote" id="objective" name="objective">
                                    {!! old('objective') !!}
                                </textarea>
                                @error('objective')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Performance Targets *</label>
                                <textarea class="summernote" id="target" name="target">
                                    {!! old('target') !!}
                                </textarea>
                                @error('target')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Performance Criteria *</label>
                                <textarea class="summernote" id="criteria" name="criteria">
                                    {!! old('criteria') !!}
                                </textarea>
                                @error('criteria')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Agreed Resource *</label>
                                <textarea class="summernote" id="resource" name="resource">
                                    {!! old('resource') !!}
                                </textarea>
                                @error('resource')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <a class="btn btn-info" href="{{ route('performance-agreement.index') }}">Back</a>
                                    <button class="btn btn-primary" type="submit">Save</button>
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
        .create( document.querySelector( '#objective' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );

     ClassicEditor
        .create( document.querySelector( '#criteria' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );

     ClassicEditor
        .create( document.querySelector( '#resource' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );

     ClassicEditor
        .create( document.querySelector( '#target' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );

</script>
@endsection
