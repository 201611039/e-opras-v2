<div>
    <h3 class="form-header"><span>Attribute of Good Performance</span></h3>

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
                @if ($attributePerformance->supervisorMarkFlag() || $attributePerformance->agreedMarkFlag())
                    <th width="20">Supervisor</th>
                @endif
                @if($attributePerformance->supervisorMarkFlag() || $attributePerformance->agreedMarkFlag())
                    <th>Agreed</th>
                @endif
            </tr>
            </thead>

            <tbody>
                <tr>
                    <td rowspan="3">WORKING RELATIONSHIPS</td>
                    <td>Ability to work in team</td>
                    <td><input type="number" name="appraisee_team_work" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_team_work')??($attributePerformance->teamWorkMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->teamWorkMark->supervisor))
                        <td><input type="number" disabled name="supervisor_team_work" class="supervisor form-control" value="{{ old('supervisor_team_work')??($attributePerformance->teamWorkMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="team_work" class="form-control" value="{{ old('team_work')??($attributePerformance->teamWorkMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to get on with other staff</td>
                    <td><input type="number" name="appraisee_interaction" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_interaction')??($attributePerformance->interactionMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->interactionMark->supervisor))
                        <td><input type="number" disabled name="supervisor_interaction" class="supervisor form-control" value="{{ old('supervisor_interaction')??($attributePerformance->interactionMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="interaction" class="form-control" value="{{ old('interaction')??($attributePerformance->interactionMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to gain respect from others</td>
                    <td><input type="number" name="appraisee_respect" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_respect')??($attributePerformance->respectMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->respectMark->supervisor))
                        <td><input type="number" disabled name="supervisor_respect" class="supervisor form-control" value="{{ old('supervisor_respect')??($attributePerformance->respectMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="respect" class="form-control" value="{{ old('respect')??($attributePerformance->respectMark->agreed??'') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td rowspan="4">COMMUNICATION AND LISTENING</td>
                    <td>Ability to express in writing</td>
                    <td><input type="number" name="appraisee_writting" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_writting')??($attributePerformance->writtingMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->writtingMark->supervisor))
                        <td><input type="number" disabled name="supervisor_writting" class="supervisor form-control" value="{{ old('supervisor_writting')??($attributePerformance->writtingMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="writting" class="form-control" value="{{ old('writting')??($attributePerformance->writtingMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to express orally</td>
                    <td><input type="number" name="appraisee_speak" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_speak')??($attributePerformance->speakMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->speakMark->supervisor))
                        <td><input type="number" disabled name="supervisor_speak" class="supervisor form-control" value="{{ old('supervisor_speak')??($attributePerformance->speakMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="speak" class="form-control" value="{{ old('speak')??($attributePerformance->speakMark->agreed??'') }}"></td>
                    @endif
                </tr>
                </tr>
                <tr>
                    <td>Ability to listen and comprehend</td>
                    <td><input type="number" name="appraisee_listen" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_listen')??($attributePerformance->listenMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->listenMark->supervisor))
                        <td><input type="number" disabled name="supervisor_listen" class="supervisor form-control" value="{{ old('supervisor_listen')??($attributePerformance->listenMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="listen" class="form-control" value="{{ old('listen')??($attributePerformance->listenMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to train and develop subordinates</td>
                    <td><input type="number" name="appraisee_train" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_train')??($attributePerformance->trainMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->trainMark->supervisor))
                        <td><input type="number" disabled name="supervisor_train" class="supervisor form-control" value="{{ old('supervisor_train')??($attributePerformance->trainMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="train" class="form-control" value="{{ old('train')??($attributePerformance->trainMark->agreed??'') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td rowspan="3">MANAGEMENT AND LEADERSHIP</td>
                    <td>Ability to plan and organize</td>
                    <td><input type="number" name="appraisee_plan_organize" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_plan_organize')??($attributePerformance->planOrganizeMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->planOrganizeMark->supervisor))
                        <td><input type="number" disabled name="supervisor_plan_organize" class="supervisor form-control" value="{{ old('supervisor_plan_organize')??($attributePerformance->planOrganizeMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="plan_organize" class="form-control" value="{{ old('plan_organize')??($attributePerformance->planOrganizeMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to lead, motivate and resolve conflicts</td>
                    <td><input type="number" name="appraisee_lead" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_lead')??($attributePerformance->leadMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->leadMark->supervisor))
                        <td><input type="number" disabled name="supervisor_lead" class="supervisor form-control" value="{{ old('supervisor_lead')??($attributePerformance->leadMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="lead" class="form-control" value="{{ old('lead')??($attributePerformance->leadMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to initiate and innovate</td>
                    <td><input type="number" name="appraisee_innitiate_innovate" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_innitiate_innovate')??($attributePerformance->innitiateInnovateMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->innitiateInnovateMark->supervisor))
                        <td><input type="number" disabled name="supervisor_innitiate_innovate" class="supervisor form-control" value="{{ old('supervisor_innitiate_innovate')??($attributePerformance->innitiateInnovateMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="innitiate_innovate" class="form-control" value="{{ old('innitiate_innovate')??($attributePerformance->innitiateInnovateMark->agreed??'') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td rowspan="2">PERFOMANCE IN TERMS OF QUALITY</td>
                    <td>Ability to deliver accurate and high quality output timely</td>
                    <td><input type="number" name="appraisee_output" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_output')??($attributePerformance->outputMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->outputMark->supervisor))
                        <td><input type="number" disabled name="supervisor_output" class="supervisor form-control" value="{{ old('supervisor_output')??($attributePerformance->outputMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="output" class="form-control" value="{{ old('output')??($attributePerformance->outputMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability for resilience and persistence</td>
                    <td><input type="number" name="appraisee_persistence" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_persistence')??($attributePerformance->persistenceMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->persistenceMark->supervisor))
                        <td><input type="number" disabled name="supervisor_persistence" class="supervisor form-control" value="{{ old('supervisor_persistence')??($attributePerformance->persistenceMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="persistence" class="form-control" value="{{ old('persistence')??($attributePerformance->persistenceMark->agreed??'') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td rowspan="2">PERFORMANCE IN TERMS OF QUANTITY</td>
                    <td>Ability to meet demand</td>
                    <td><input type="number" name="appraisee_demand" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_demand')??($attributePerformance->demandMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->demandMark->supervisor))
                        <td><input type="number" disabled name="supervisor_demand" class="supervisor form-control" value="{{ old('supervisor_demand')??($attributePerformance->demandMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="demand" class="form-control" value="{{ old('demand')??($attributePerformance->demandMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to handle extra work</td>
                    <td><input type="number" name="appraisee_extra_work" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_extra_work')??($attributePerformance->extraWorkMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->extraWorkMark->supervisor))
                        <td><input type="number" disabled name="supervisor_extra_work" class="supervisor form-control" value="{{ old('supervisor_extra_work')??($attributePerformance->extraWorkMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="extra_work" class="form-control" value="{{ old('extra_work')??($attributePerformance->extraWorkMark->agreed??'') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td rowspan="2">RESPONSIBILITY AND JUDGEMENT</td>
                    <td>Ability to accept and fulfil responsibility</td>
                    <td><input type="number" name="appraisee_responsibility" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_responsibility')??($attributePerformance->responsibilityMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->responsibilityMark->supervisor))
                        <td><input type="number" disabled name="supervisor_responsibility" class="supervisor form-control" value="{{ old('supervisor_responsibility')??($attributePerformance->responsibilityMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="responsibility" class="form-control" value="{{ old('responsibility')??($attributePerformance->responsibilityMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to make right decisions</td>
                    <td><input type="number" name="appraisee_decisions" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_decisions')??($attributePerformance->decisionsMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->decisionsMark->supervisor))
                        <td><input type="number" disabled name="supervisor_decisions" class="supervisor form-control" value="{{ old('supervisor_decisions')??($attributePerformance->decisionsMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="decisions" class="form-control" value="{{ old('decisions')??($attributePerformance->decisionsMark->agreed??'') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td>CUSTOMER FOCUS</td>
                    <td>Ability to respond well to the customer</td>
                    <td><input type="number" name="appraisee_customer" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_customer')??($attributePerformance->customerMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->customerMark->supervisor))
                        <td><input type="number" disabled name="supervisor_customer" class="supervisor form-control" value="{{ old('supervisor_customer')??($attributePerformance->customerMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="customer" class="form-control" value="{{ old('customer')??($attributePerformance->customerMark->agreed??'') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td rowspan="3">LOYALITY</td>
                    <td>Ability to demonstrate follower ship skills</td>
                    <td><input type="number" name="appraisee_followership" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_followership')??($attributePerformance->followershipMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->followershipMark->supervisor))
                        <td><input type="number" disabled name="supervisor_followership" class="supervisor form-control" value="{{ old('supervisor_followership')??($attributePerformance->followershipMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="followership" class="form-control" value="{{ old('followership')??($attributePerformance->followershipMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to provide ongoing support to supervisor(s)</td>
                    <td><input type="number" name="appraisee_support" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_support')??($attributePerformance->supportMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->supportMark->supervisor))
                        <td><input type="number" disabled name="supervisor_support" class="supervisor form-control" value="{{ old('supervisor_support')??($attributePerformance->supportMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="support" class="form-control" value="{{ old('support')??($attributePerformance->supportMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to comply with lawful instructions of supervisors</td>
                    <td><input type="number" name="appraisee_instructions" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_instructions')??($attributePerformance->instructionsMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->instructionsMark->supervisor))
                        <td><input type="number" disabled name="supervisor_instructions" class="supervisor form-control" value="{{ old('supervisor_instructions')??($attributePerformance->instructionsMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="instructions" class="form-control" value="{{ old('instructions')??($attributePerformance->instructionsMark->agreed??'') }}"></td>
                    @endif
                </tr>


                <tr>
                    <td rowspan="3">INTEGRITY</td>
                    <td>Ability to devote working time exclusively to work related duties</td>
                    <td><input type="number" name="appraisee_working" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_working')??($attributePerformance->workingMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->workingMark->supervisor))
                        <td><input type="number" disabled name="supervisor_working" class="supervisor form-control" value="{{ old('supervisor_working')??($attributePerformance->workingMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="working" class="form-control" value="{{ old('working')??($attributePerformance->workingMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to provide quality services without need for any inducements</td>
                    <td><input type="number" name="appraisee_services" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_services')??($attributePerformance->servicesMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->servicesMark->supervisor))
                        <td><input type="number" disabled name="supervisor_services" class="supervisor form-control" value="{{ old('supervisor_services')??($attributePerformance->servicesMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="services" class="form-control" value="{{ old('services')??($attributePerformance->servicesMark->agreed??'') }}"></td>
                    @endif
                </tr>
                <tr>
                    <td>Ability to apply knowledge abilities to benefit Government and not for personal gains</td>
                    <td><input type="number" name="appraisee_government" class="form-control appraisee" @if($appraiseeInputDisabled) disabled @endif value="{{ old('appraisee_government')??($attributePerformance->governmentMark->appraisee??'') }}"></td>

                    @if (isset($attributePerformance->governmentMark->supervisor))
                        <td><input type="number" disabled name="supervisor_government" class="supervisor form-control" value="{{ old('supervisor_government')??($attributePerformance->governmentMark->supervisor??'') }}"></td>
                    @endif
                    @if(isset($attributePerformance->teamWorkMark->agreed) || $appraisee)
                        <td><input disabled  type="number" name="government" class="form-control" value="{{ old('government')??($attributePerformance->governmentMark->agreed??'') }}"></td>
                    @endif
                </tr>

            </tbody>
        </table>
    </div>
</div>
