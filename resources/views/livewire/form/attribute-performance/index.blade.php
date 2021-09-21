<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            @livewire('form.side-links', ['opras' => $opras], key($opras->id))

            <div class="col-md-9" id="app">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        @if($opras->reviewSectionSix())
                        <div class="alert alert-info" role="alert">
                            Fowarded to supervisor
                        </div>
                        @endif
                        @if($opras->attributePerformance->comments)
                        <div class="alert alert-danger" role="alert">
                            <h4>Declined by supervisor because of:</h4>
                            {!! $opras->attributePerformance->comments??false !!}
                        </div>
                        @endif
                        <form id="form" action="{{ route('attribute-performance.update', $opras->slug) }}" method="post">
                            @csrf @method('PUT')

                            {{-- Check appraisee form whether to disable or not --}}
                            @if ($opras->attributePerformance->agreedMarkFlag())
                            @php
                                $appraisee = true
                            @endphp
                            @elseif(isset($opras->attributePerformance->teamWorkMark->appraisee) && (auth()->id() !== $opras->user_id))
                                @php
                                    $appraisee = true
                                @endphp

                            @else
                                @php
                                    $appraisee = false
                                @endphp
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered" >
                                    <thead>
                                    <tr>
                                        <th width="30" rowspan="2">MAIN FACTORS</th>
                                        <th rowspan="2">QUALITY ATTRIBUTE</th>
                                        <th colspan="3" class="text-center">RATED MARK</th>
                                    </tr>
                                    <tr>
                                            <th width="20">Appraisee</th>
                                        @if ($opras->attributePerformance->supervisorMarkFlag() || $opras->attributePerformance->agreedMarkFlag())
                                            <th width="20">Supervisor</th>
                                        @endif
                                        @if($opras->attributePerformance->supervisorMarkFlag() || $opras->attributePerformance->agreedMarkFlag())
                                            <th>Agreed</th>
                                        @endif
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td rowspan="3">WORKING RELATIONSHIPS</td>
                                            <td>Ability to work in team</td>
                                            <td><input type="number" name="appraisee_team_work" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_team_work')??($opras->attributePerformance->teamWorkMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->teamWorkMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_team_work" class="supervisor form-control" value="{{ old('supervisor_team_work')??($opras->attributePerformance->teamWorkMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="team_work" class="form-control" value="{{ old('team_work')??($opras->attributePerformance->teamWorkMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to get on with other staff</td>
                                            <td><input type="number" name="appraisee_interaction" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_interaction')??($opras->attributePerformance->interactionMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->interactionMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_interaction" class="supervisor form-control" value="{{ old('supervisor_interaction')??($opras->attributePerformance->interactionMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="interaction" class="form-control" value="{{ old('interaction')??($opras->attributePerformance->interactionMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to gain respect from others</td>
                                            <td><input type="number" name="appraisee_respect" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_respect')??($opras->attributePerformance->respectMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->respectMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_respect" class="supervisor form-control" value="{{ old('supervisor_respect')??($opras->attributePerformance->respectMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="respect" class="form-control" value="{{ old('respect')??($opras->attributePerformance->respectMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>


                                        <tr>
                                            <td rowspan="4">COMMUNICATION AND LISTENING</td>
                                            <td>Ability to express in writing</td>
                                            <td><input type="number" name="appraisee_writting" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_writting')??($opras->attributePerformance->writtingMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->writtingMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_writting" class="supervisor form-control" value="{{ old('supervisor_writting')??($opras->attributePerformance->writtingMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="writting" class="form-control" value="{{ old('writting')??($opras->attributePerformance->writtingMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to express orally</td>
                                            <td><input type="number" name="appraisee_speak" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_speak')??($opras->attributePerformance->speakMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->speakMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_speak" class="supervisor form-control" value="{{ old('supervisor_speak')??($opras->attributePerformance->speakMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="speak" class="form-control" value="{{ old('speak')??($opras->attributePerformance->speakMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>Ability to listen and comprehend</td>
                                            <td><input type="number" name="appraisee_listen" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_listen')??($opras->attributePerformance->listenMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->listenMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_listen" class="supervisor form-control" value="{{ old('supervisor_listen')??($opras->attributePerformance->listenMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="listen" class="form-control" value="{{ old('listen')??($opras->attributePerformance->listenMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to train and develop subordinates</td>
                                            <td><input type="number" name="appraisee_train" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_train')??($opras->attributePerformance->trainMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->trainMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_train" class="supervisor form-control" value="{{ old('supervisor_train')??($opras->attributePerformance->trainMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="train" class="form-control" value="{{ old('train')??($opras->attributePerformance->trainMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>


                                        <tr>
                                            <td rowspan="3">MANAGEMENT AND LEADERSHIP</td>
                                            <td>Ability to plan and organize</td>
                                            <td><input type="number" name="appraisee_plan_organize" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_plan_organize')??($opras->attributePerformance->planOrganizeMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->planOrganizeMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_plan_organize" class="supervisor form-control" value="{{ old('supervisor_plan_organize')??($opras->attributePerformance->planOrganizeMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="plan_organize" class="form-control" value="{{ old('plan_organize')??($opras->attributePerformance->planOrganizeMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to lead, motivate and resolve conflicts</td>
                                            <td><input type="number" name="appraisee_lead" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_lead')??($opras->attributePerformance->leadMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->leadMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_lead" class="supervisor form-control" value="{{ old('supervisor_lead')??($opras->attributePerformance->leadMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="lead" class="form-control" value="{{ old('lead')??($opras->attributePerformance->leadMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to initiate and innovate</td>
                                            <td><input type="number" name="appraisee_innitiate_innovate" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_innitiate_innovate')??($opras->attributePerformance->innitiateInnovateMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->innitiateInnovateMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_innitiate_innovate" class="supervisor form-control" value="{{ old('supervisor_innitiate_innovate')??($opras->attributePerformance->innitiateInnovateMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="innitiate_innovate" class="form-control" value="{{ old('innitiate_innovate')??($opras->attributePerformance->innitiateInnovateMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>


                                        <tr>
                                            <td rowspan="2">PERFOMANCE IN TERMS OF QUALITY</td>
                                            <td>Ability to deliver accurate and high quality output timely</td>
                                            <td><input type="number" name="appraisee_output" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_output')??($opras->attributePerformance->outputMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->outputMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_output" class="supervisor form-control" value="{{ old('supervisor_output')??($opras->attributePerformance->outputMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="output" class="form-control" value="{{ old('output')??($opras->attributePerformance->outputMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability for resilience and persistence</td>
                                            <td><input type="number" name="appraisee_persistence" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_persistence')??($opras->attributePerformance->persistenceMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->persistenceMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_persistence" class="supervisor form-control" value="{{ old('supervisor_persistence')??($opras->attributePerformance->persistenceMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="persistence" class="form-control" value="{{ old('persistence')??($opras->attributePerformance->persistenceMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>


                                        <tr>
                                            <td rowspan="2">PERFORMANCE IN TERMS OF QUANTITY</td>
                                            <td>Ability to meet demand</td>
                                            <td><input type="number" name="appraisee_demand" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_demand')??($opras->attributePerformance->demandMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->demandMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_demand" class="supervisor form-control" value="{{ old('supervisor_demand')??($opras->attributePerformance->demandMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="demand" class="form-control" value="{{ old('demand')??($opras->attributePerformance->demandMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to handle extra work</td>
                                            <td><input type="number" name="appraisee_extra_work" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_extra_work')??($opras->attributePerformance->extraWorkMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->extraWorkMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_extra_work" class="supervisor form-control" value="{{ old('supervisor_extra_work')??($opras->attributePerformance->extraWorkMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="extra_work" class="form-control" value="{{ old('extra_work')??($opras->attributePerformance->extraWorkMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>


                                        <tr>
                                            <td rowspan="2">RESPONSIBILITY AND JUDGEMENT</td>
                                            <td>Ability to accept and fulfil responsibility</td>
                                            <td><input type="number" name="appraisee_responsibility" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_responsibility')??($opras->attributePerformance->responsibilityMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->responsibilityMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_responsibility" class="supervisor form-control" value="{{ old('supervisor_responsibility')??($opras->attributePerformance->responsibilityMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="responsibility" class="form-control" value="{{ old('responsibility')??($opras->attributePerformance->responsibilityMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to make right decisions</td>
                                            <td><input type="number" name="appraisee_decisions" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_decisions')??($opras->attributePerformance->decisionsMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->decisionsMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_decisions" class="supervisor form-control" value="{{ old('supervisor_decisions')??($opras->attributePerformance->decisionsMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="decisions" class="form-control" value="{{ old('decisions')??($opras->attributePerformance->decisionsMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>


                                        <tr>
                                            <td>CUSTOMER FOCUS</td>
                                            <td>Ability to respond well to the customer</td>
                                            <td><input type="number" name="appraisee_customer" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_customer')??($opras->attributePerformance->customerMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->customerMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_customer" class="supervisor form-control" value="{{ old('supervisor_customer')??($opras->attributePerformance->customerMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="customer" class="form-control" value="{{ old('customer')??($opras->attributePerformance->customerMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>


                                        <tr>
                                            <td rowspan="3">LOYALITY</td>
                                            <td>Ability to demonstrate follower ship skills</td>
                                            <td><input type="number" name="appraisee_followership" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_followership')??($opras->attributePerformance->followershipMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->followershipMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_followership" class="supervisor form-control" value="{{ old('supervisor_followership')??($opras->attributePerformance->followershipMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="followership" class="form-control" value="{{ old('followership')??($opras->attributePerformance->followershipMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to provide ongoing support to supervisor(s)</td>
                                            <td><input type="number" name="appraisee_support" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_support')??($opras->attributePerformance->supportMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->supportMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_support" class="supervisor form-control" value="{{ old('supervisor_support')??($opras->attributePerformance->supportMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="support" class="form-control" value="{{ old('support')??($opras->attributePerformance->supportMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to comply with lawful instructions of supervisors</td>
                                            <td><input type="number" name="appraisee_instructions" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_instructions')??($opras->attributePerformance->instructionsMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->instructionsMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_instructions" class="supervisor form-control" value="{{ old('supervisor_instructions')??($opras->attributePerformance->instructionsMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="instructions" class="form-control" value="{{ old('instructions')??($opras->attributePerformance->instructionsMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>


                                        <tr>
                                            <td rowspan="3">INTEGRITY</td>
                                            <td>Ability to devote working time exclusively to work related duties</td>
                                            <td><input type="number" name="appraisee_working" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_working')??($opras->attributePerformance->workingMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->workingMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_working" class="supervisor form-control" value="{{ old('supervisor_working')??($opras->attributePerformance->workingMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="working" class="form-control" value="{{ old('working')??($opras->attributePerformance->workingMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to provide quality services without need for any inducements</td>
                                            <td><input type="number" name="appraisee_services" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_services')??($opras->attributePerformance->servicesMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->servicesMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_services" class="supervisor form-control" value="{{ old('supervisor_services')??($opras->attributePerformance->servicesMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="services" class="form-control" value="{{ old('services')??($opras->attributePerformance->servicesMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ability to apply knowledge abilities to benefit Government and not for personal gains</td>
                                            <td><input type="number" name="appraisee_government" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_government')??($opras->attributePerformance->governmentMark->appraisee??'') }}"></td>

                                            @if (isset($opras->attributePerformance->governmentMark->supervisor))
                                                <td><input type="number" disabled name="supervisor_government" class="supervisor form-control" value="{{ old('supervisor_government')??($opras->attributePerformance->governmentMark->supervisor??'') }}"></td>
                                            @endif
                                            @if(isset($opras->attributePerformance->teamWorkMark->agreed) || $appraisee)
                                                <td><input {{-- @if($supervisorInputDisabled) disabled @endif --}} type="number" name="government" class="form-control" value="{{ old('government')??($opras->attributePerformance->governmentMark->agreed??'') }}"></td>
                                            @endif
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </form>

                        @if ($opras->checkSectionSix())
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
    <script>
        $(function () {
            var underReview =  @json($underReview);
            var complete =  @json($complete);

            if(underReview || complete) {
                $('input').attr('disabled', 'true');
            }
        });
    </script>
@endsection
