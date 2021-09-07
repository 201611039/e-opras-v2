<div>
    <h3 class="form-header"><span>Reward/Measure/Sanction</span></h3>

    <div class="form-group">
        <label>Supervisor {{ $rewardMeasure->category??'Measure Reward or Sanction' }}</label>
        <div class="well">
            {!! ($rewardMeasure->description??'No comments') !!}
        </div>
    </div>

    <hr>
    
    <h3 class="form-header"><span>Declaration</span></h3>

    <p>I, <b>{{$opras->user->full_name}}</b> hereby declare that the information given in this form is true to the best of my knowledge</p>
</div>
