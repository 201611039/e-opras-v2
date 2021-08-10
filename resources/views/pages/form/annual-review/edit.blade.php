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
                        <form action="{{ route('annual-review.update', $annualReview->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            @php

                                if (($annualReview->agreedMarkFlag())) {
                                    $editAgreedMark = true;
                                } else {
                                    $editAgreedMark = false;
                                }

                            @endphp

                            <div class="form-group">
                                <label>Agreed Objectives *</label>
                                <div class="well" style="word-wrap: break-word;">
                                    {!! $annualReview->objective !!}
                                </div>
                                @error('objective')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Progress Made *</label>
                                @if ($editAgreedMark)
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $annualReview->progress_made !!}
                                    </div>
                                @else
                                    <textarea class="summernote" id="progress_made" name="progress_made">
                                        {!! old('progress_made')??$annualReview->progress_made !!}
                                    </textarea>
                                    @error('progress_made')
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @endif
                                @enderror
                            </div>

                            <h3>Rated Marks</h3>

                            <div class="row">
                                <div class="form-group col-sm-4 @error('appraisee') has-error @enderror">
                                    <label for="appraisee">Apraisee</label>
                                    <input type="text" @if($editAgreedMark) disabled @endif value="{{ old('appraisee')??($annualReview->ratedMark->appraisee??null) }}" class="form-control" @if(!$editAgreedMark)  name="appraisee" @endif>
                                    @error('appraisee')
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                @if ($editAgreedMark)
                                <div class="form-group col-sm-4">
                                    <label for="supervisor">Supervisor</label>
                                    <input type="text" @if($editAgreedMark) disabled @endif value="{{ ($annualReview->ratedMark->supervisor??null) }}" class="form-control">
                                </div>
                                @endif
                                @if ($editAgreedMark)
                                    <div class="form-group col-sm-4 @error('agreed') has-error @enderror">
                                        <label for="agreed">Agreed</label>
                                        <input type="text" value="{{ old('agreed')??($annualReview->ratedMark->agreed??null) }}" class="form-control" name="agreed">
                                        @error('agreed')
                                        <span class="text-danger small">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                @endif
                            </div>

                            <input type="text" hidden name="task" value="{{ $editAgreedMark }}">
                            <div class="form-group">
                                <div class="">
                                    <a class="btn btn-info" href="{{ route('annual-review.index') }}">Back</a>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>

                        </form>

                        <div>
                            <h4>Rating:</h4>

                            <div class="col-md-4 col-sm-6">1   =    Outstanding performance</div>
                            <div class="col-md-4 col-sm-6">2   =    Performance above average</div>
                            <div class="col-md-4 col-sm-6">3   =    Average performance</div>
                            <div class="col-md-4 col-sm-6">4   =    Poor performance</div>
                            <div class="col-md-4 col-sm-6">5   =     Very poor performance</div>

                            <div>
                                <br><br><br>
                            </div>
                        </div>
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
