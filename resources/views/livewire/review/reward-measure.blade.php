<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form action="{{ route('store.reward-measure-sanction', $opras->slug) }}" id="form" method="post">
                        @csrf
                        <div class="form-group @error('category') has-error @enderror">
                            <label for="category">Should be given</label>
                            <select name="category" class="form-control" id="category">
                                <option disabled selected>Choose</option>
                                <option {{ old('category')?(old('category') == 'reward'? 'selected':''):(($rewardMeasure->category??false) == 'reward'? 'selected':'') }} value="reward" >Reward</option>
                                <option {{ old('category')?(old('category') == 'measure'? 'selected':''):(($rewardMeasure->category??false) == 'measure'? 'selected':'') }} value="measure">Measure</option>
                                <option {{ old('category')?(old('category') == 'sanction'? 'selected':''):(($rewardMeasure->category??false) == 'sanction'? 'selected':'') }} value="sanction">Sanction</option>
                            </select>
                            @error('category')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Supervisor {{ $rewardMeasure->category??'Measure Reward or Sanction' }}</label>
                            <textarea class="summernote" id="description" name="description">
                                {{ old('description')??($rewardMeasure->description??'') }}
                            </textarea>
                            @error('description')
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
                        <button class="btn btn-primary" onclick="complete()" title="Complete" data-toggle="tooltip" data-placement="top"><i class="fa fa-check"></i></button>
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
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                // console.log( editor );

            } )
            .catch( error => {
                // console.error( error );
            } );
    });


    function complete() {
        if (confirm('Are you sure?')) {
            Livewire.emit('complete');
        }
    }
</script>
@endsection
