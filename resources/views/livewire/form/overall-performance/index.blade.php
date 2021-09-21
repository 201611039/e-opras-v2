<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            @livewire('form.side-links', ['opras' => $opras], key($opras->id))

            <div class="col-md-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        @if($opras->reviewSectionSeven())
                        <div class="alert alert-info" role="alert">
                            Fowarded to supervisor
                        </div>
                        @endif

                        <div align="right">
                            <label for="overall-performance">Overall Performance:</label>
                            <input type="text" class="" disabled style="padding: 7px 5px; width:50px;" value="{{ $overallPerformance->overall_marks }}">
                        </div>

                        <form id="form" action="{{ route('overall-performance.update', $overallPerformance->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Appraisee Comments  <small>(if any)</small></label>
                                @if ($opras->sectionSeven()->status)
                                    <div class="well">
                                        {!! ($overallPerformance->supervisor_comments??'No comments') !!}
                                    </div>
                                @else
                                    <textarea class="summernote" id="appraisee_comments" name="appraisee_comments">
                                        {{ old('appraisee_comments')??($overallPerformance->appraisee_comments??'') }}
                                    </textarea>
                                @endif
                                @error('appraisee_comments')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            @if ($opras->sectionSeven()->status)
                                <div class="form-group">
                                    <label>Supervisor Comments  <small></small></label>
                                    <div class="well">
                                        {!! ($overallPerformance->supervisor_comments??'No comments') !!}
                                    </div>
                                </div>
                            @endif
                        </form>

                        <form id="foward" hidden action="{{ route('overall-performance.foward') }}" method="post">@csrf</form>

                        @if ($opras->checkSectionSeven())
                            <div align="right">
                                <button type="button" onclick="$('#form').submit()" class="btn btn-primary" title="Save" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-save"></i>
                                </button>


                                <button type="button" onclick="$('#foward').submit()" title="Foward to my supervisor" data-toggle="tooltip" data-placement="left" class="btn btn-warning"><i class="fa fa-send"></i></button>
                            </div>

                            <form hidden id="foward" action="{{ route('attribute-performance.foward') }}" method="POST">
                                @csrf
                            </form>
                        @endif
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
            .create( document.querySelector( '#appraisee_comments' ) )
            .then( editor => {
                // console.log( editor );
                var checkSection = @json($checkInput);

                if (checkSection) {
                    editor.isReadOnly = true
                }

            } )
            .catch( error => {
                // console.error( error );
            } );
    });

</script>
@endsection
