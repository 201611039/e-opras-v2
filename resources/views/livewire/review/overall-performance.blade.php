<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div align="right">
                        <label for="overall-performance">Overall Performance:</label>
                        <input type="text" class="" disabled style="padding: 7px 5px; width:50px;" value="{{ $overallPerformance->overall_marks }}">
                    </div>

                    <form id="form" action="{{ route('review.overall-performance', $overallPerformance->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Appraisee Comments  <small></small></label>
                            <div class="well">
                                {!! ($overallPerformance->appraisee_comments??'No comments') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Supervisor Comments <small>(if any)</small></label>
                            <textarea class="summernote" id="supervisor_comments" name="supervisor_comments">
                                {{ old('supervisor_comments')??($overallPerformance->supervisor_comments??'') }}
                            </textarea>
                            @error('supervisor_comments')
                            <span class="text-danger small">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </form>

                    <div align="right">
                        <button type="button" onclick="$('#form').submit()" class="btn btn-info" title="Save" data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-save"></i>
                        </button>


                        <button type="button" wire:click="complete" title="Complete" data-toggle="tooltip" data-placement="left" class="btn btn-primary"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        ClassicEditor
            .create( document.querySelector( '#supervisor_comments' ) )
            .then( editor => {
                // console.log( editor );
                editor.isReadOnly = readOnly

                } )
                .catch( error => {
                    // console.error( error );
                } );
    });

</script>
@endsection
