<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            @livewire('form.side-links', ['opras' => $opras], key($opras->id))

            <div class="col-md-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="form-group">
                            <label>Supervisor {{ $rewardMeasure->category??'Measure Reward or Sanction' }}</label>
                            <div class="well">
                                {!! ($rewardMeasure->description??'No comments') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
