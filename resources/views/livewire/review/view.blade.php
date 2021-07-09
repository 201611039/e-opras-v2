<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1">Pending <span class="label label-danger">{{ $pendingForms->count() }}</span></a></li>
                    <li class=""><a data-toggle="tab" href="#tab-2">Completed</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3">All</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            @livewire('review.table', ['rows' => $pendingForms], key(str_random(5)))
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <strong>Donec quam felis</strong>

                            <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body">
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
