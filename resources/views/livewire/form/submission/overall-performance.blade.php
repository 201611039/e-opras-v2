<div>
    <h3 class="form-header"><span>Overall Perfromance</span></h3>

    <div align="right">
        <label for="overall-performance">Overall Performance:</label>
        <input type="text" class="" disabled style="padding: 7px 5px; width:50px;" value="{{ $overallPerformance->overall_marks }}">
    </div>

    <div class="form-group">
        <label>Appraisee Comments </label>
        @if ($opras->sectionSeven())
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

    @if ($opras->sectionSeven())
        <div class="form-group">
            <label>Supervisor Comments  <small></small></label>
            <div class="well">
                {!! ($overallPerformance->supervisor_comments??'No comments') !!}
            </div>
        </div>
    @endif
</div>
