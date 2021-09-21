<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opras</title>
    <style>
        body {
            /* font-family: 'Quicksand', sans-serif; */
            font-size: 30px;
            text-align: justify;
            padding: 20px 50px !important;
        }

        @page {
            margin: 100px 25px;
        }

        .header,
        .footer {
            width: 100%;
            position: fixed;
        }
        .header {
            top: 0px;
        }

        .footer {
            bottom: 0px;
        }

        .pagenum:before {
            content: counter(page);
        }

        .container, .contain {
            padding: 20px 40px;
        }

        .container {
            max-height: 90%;
        }

        .border {
            /* border: solid black 5px;
            margin: 0px 10px; */
        }

        tr,td {
            vertical-align: top;
        }

        .box {
            border:1px solid black;
            padding: 10px 5px;
            margin-top: 40px;
            height: 40px;
        }

        small {
            font-size: 25px;
            align-content: center;
        }

        th.rated-mark {
           width: 100 !important;
        }

        th.no {
           width: 20% !important;
        }


        table{
            width:100%;
            border-collapse:collapse;
            border:1px solid black;
            word-wrap:break-word;
        }

        .mb-1 {
            margin-bottom: 3px;
        }

        th {
            padding:6px 12px;
        }

        td {
            padding:6px 12px;
        }

        .dotted {
            text-decoration: dotted;
            text-decoration-style: dotted;
            text-underline-position: under;
        }

        li {
            margin-bottom:20px;
        }

        .page-break {
            page-break-after: always;
        }

        .content {
            max-width: 100%;
            /* display:grid; */
        }

    </style>
</head>
<body>
    @php
        $year = \App\Models\Year::active();
    @endphp
    <div class="content">
        <div class="border">
            <div class="contain">
                <div>
                    <center>
                        <img src="{{ public_path(). '/img/logo.jpg' }}" sizes="150"><br><br>
                        <span><b>MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</b></span><br>
                        <span>(CHUO KIKUU CHA SAYANSI NA TEKNOLOJIA MBEYA)</span>
                        <br><br>

                        <span><b>OPEN PERFORMANCE REVIEW AND APPRAISAL FORM</b></span><br>
                        <span>(To be filled in Triplicate)</span><br>

                        <span>From:  July…{{ $year->created_at->year }}… to June…{{ $year->created_at->year+1 }}…</span>
                    </center>
                </div>

                <br>

                <span>This form is intended to meet the requirements of the performance management system and development process.</span>

                <h4>NOTES ON HOW TO FILL THIS FORM:</h4>
                <ol>
                    <li>This Form must be filled by all members of staff, at the end of the year, once fully completed, the DVCs should send original to the Vice Chancellor, Deans, Principals and Directors should send original to the DVC-ARC; Directors and Heads of Administrative Department should send original copies to the DVC-PFA. Heads of Academic Departments should send originals to Principals, Deans and Directors.  The other staff should send originals to their respective Heads of Departments.</li>
                    <li>Where appropriate, each box shall carry only one letter or figure.  Letters to be in capitals.</li><br>
                    <li>Personal/Agreed objectives are derived from the Organisation’s work plan (Strategic plan, Annual operating plans or Action plans) and are expected to be implemented in the current year.</li><br>
                    <li>Personal/Agreed objectives are derived from the Organisation’s work plan (Strategic plan, Annual operating plans or Action plans) and are expected to be implemented in the current year.</li><br>
                    <li>Sections 2, 3 and 4 of this Form shall be filled by the Appraisee in consultation with the Supervisor and sections 5-6 in the presence of a third party if necessary.</li><br>
                    <li>Please note that appraisals that are rated as 1 are the best performers and appraisals rated as 5 are the worst performers.  These should be brought to the attention of top management and usually to the attention of the Vice Chancellor.</li><br>
                </ol>
            </div>
        </div>
        <br><br>
        <div class="border">
            <div class="contain">
                <center>
                    <h3>SECTION 1:  PERSONAL INFORMATION</h3>
                </center>
                <table style="border: 0px;">
                    <tbody>
                        <tr>
                            <td align="center">
                                <span>Faculty/ Directorate</span>
                            </td>
                            <td colspan="2">
                                <span><div class="box">{{$opras->personalInformation->directorate->name}}</div></span>
                            </td>
                            <td align="center">
                                Present Station
                            </td>
                            <td colspan="2">
                                <div class="box">{{$opras->personalInformation->station->name}}</div>
                            </td>
                        </tr>
                        <tr class="mb-1">
                            <td align="center">Name in Full</td>
                            <td align="left"><div class="box">{{$opras->user->surname}}</div><br><small>Surname</small></td>
                            <td align="left"><div class="box">{{$opras->user->first_name}}</div><br><small>First Name</small></td>
                            <td align="left"><div class="box">{{$opras->user->middle_name??''}}</div><br><small>Middle Name</small></td>
                            <td colspan="2" align="right"><span class="box">M</span> <br> <small>Gender</small></td>
                        </tr>
                        <tr class="mb-1">
                            <td></td>
                            <td>Academic Qualification</td>
                            <td colspan="2" align="center"><div class="box">{{$opras->personalInformation->academic_qualification??''}}</div></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="mb-1">
                            <td align="center">Duty Post</td>
                            <td colspan="2"><div class="box">{{$opras->personalInformation->post->name??''}}</div></td>
                            <td align="center">Substantive Post</td>
                            <td colspan="2"><div class="box">{{$opras->personalInformation->substantive_post??''}}</div></td>
                        </tr>
                        <tr class="mb-1">
                            <td align="center">Date of First Appointment</td>
                            <td colspan="2"><div class="box">{{$opras->user->profile->first_appointment->format('d-m-Y')??''}}</div></td>
                            <td align="center">Date of Appointment to Present Post</td>
                            <td colspan="2"><div class="box">{{$opras->personalInformation->first_appointment_present_post->format('d-m-Y')??''}}</div></td>
                        </tr>
                        <tr class="mb-1">
                            <td align="center">Salary Scale</td>
                            <td><div class="box">{{$opras->personalInformation->salary_scale??''}}</div></td>
                            <td align="center">Period served under Present Supervisor</td>
                            <td><div class="box">{{$opras->personalInformation->period??'' }} Months</div></td>
                            <td align="center">Date of Birth</td>
                            <td><div class="box" style="height: 70px;">{{$opras->user->profile->date_of_birth->format('d-m-Y')??''}}</div></td>
                        </tr>
                        <tr>
                            <td>Terms of Service</td>
                            <td colspan="2"><div class="box">{{title_case($opras->personalInformation->term_of_service)??''}}</div></td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>

        <div class="footer">
            <table style="border: 0px;">
                <tbody>
                    <tr>
                        <td align="left" style="width:33.3">OPRAES V1.0</td>
                        <td align="center" style="width:33.3">Page <span class="pagenum"></span></td>
                        <td align="right" style="width:33.3">Printed On: {{now()->format('D d F Y H:i')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>

        <div class="border">
            <div class="container">
                <center>
                    <h3>SECTION 2: PERFORMANCE AGREEMENT

                        <br><small><i>To be filled by the Appraisee in consultation with the Supervisor</i></small><br>
                    </h3>
                </center>
                <table border="1">
                    <thead>
                        <tr>
                            <th class="">2.1 S/N</th>
                            <th>2.2 Agreed Objectives</th>
                            <th>2.3 Agreed Performance Targets</th>
                            <th>2.4 Agreed Performance Criteria</th>
                            <th>2.5 Agreed Resources</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opras->performanceAgreements as $key => $performanceAgreement)

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{!!$performanceAgreement->objective!!}</td>
                                <td>{!!$performanceAgreement->target!!}</td>
                                <td>{!!$performanceAgreement->criteria!!}</td>
                                <td>{!!$performanceAgreement->resource!!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br><br>

                <table style="border: 0px;">
                    <tbody>
                        <tr>
                            <td align="left" colspan="2" style="width:50"><h4>2.6 Appraisee</h4></td>
                            <td align="left" colspan="2" style="width:50"><h4>2.7 Supervisor</h4></td>
                        </tr>
                        <tr style="margin-bottom:4px;">
                            <td align="left" style="width:35"><span class="dotted">{{strtoupper($opras->user->full_name)}}</span> <br> <small>Name</small></td>
                            <td align="left" style="width:15">.............. <br> <small>Signed</small></td>
                            <td align="left" style="width:35"><span class="dotted">{{strtoupper($opras->personalInformation->supervisor->full_name)}}</span> <br> <small>Name</small></td>
                            <td align="left" style="width:15">.............. <br> <small>Signed</small></td>
                        </tr>
                        <tr>
                            <td align="left" colspan="2" style="width:50"><span class="dotted">{{$performanceAgreement->created_at->format('d-m-Y')}}</span> <br> <small>Date</small></td>
                            <td align="left" colspan="2" style="width:50"><span class="dotted">{{$performanceAgreement->updated_at->format('d-m-Y')}}</span> <br> <small>Date</small> </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="footer">
            <table style="border: 0px;">
                <tbody>
                    <tr>
                        <td align="left" style="width:33.3">OPRAES V1.0</td>
                        <td align="center" style="width:33.3">Page <span class="pagenum"></span></td>
                        <td align="right" style="width:33.3">Printed On: {{now()->format('D d F Y H:i')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>

        <div class="border">
            <div class="container">
                <center>
                    <h3>SECTION 3: MID-YEAR REVIEW (DECEMBER ....{{ $year->created_at->year }}/{{ $year->created_at->year+1 }}......)
                        <br>
                        <small><i>To be filled by the Appraisee in consultation with the Supervisor</i></small>
                        <br>
                    </h3>
                </center>
                <table border="1">
                    <thead>
                        <tr>
                            <th class="">3.1 S/N</th>
                            <th>3.2 Agreed Objectives</th>
                            <th>3.3 Progress Towards Targets</th>
                            <th>3.4 Factors Affecting Performance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opras->midYearReviews as $key => $midYearReview)

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{!!$midYearReview->objective!!}</td>
                                <td>{!!$midYearReview->progress_made!!}</td>
                                <td>{!!$midYearReview->factor_affecting_performance!!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br><br>

                <table style="border: 0px;">
                    <tbody>
                        <tr>
                            <td align="left" colspan="2" style="width:50"><h4>3.5 Appraisee</h4></td>
                            <td align="left" colspan="2" style="width:50"><h4>3.6 Supervisor</h4></td>
                        </tr>
                        <tr style="margin-bottom:4px;">
                            <td align="left" style="width:35"><span class="dotted">{{strtoupper($opras->user->full_name)}}</span> <br> <small>Name</small></td>
                            <td align="left" style="width:15">.............. <br> <small>Signed</small></td>
                            <td align="left" style="width:35"><span class="dotted">{{strtoupper($opras->personalInformation->supervisor->full_name)}}</span> <br> <small>Name</small></td>
                            <td align="left" style="width:15">.............. <br> <small>Signed</small></td>
                        </tr>
                        <tr>
                            <td align="left" colspan="2" style="width:50"><span class="dotted">{{$midYearReview->created_at->format('d-m-Y')}}</span> <br> <small>Date</small></td>
                            <td align="left" colspan="2" style="width:50"><span class="dotted">{{$midYearReview->updated_at->format('d-m-Y')}}</span> <br> <small>Date</small> </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        @if (count($opras->revisedObjectives))

        <div class="footer">
            <table style="border: 0px;">
                <tbody>
                    <tr>
                        <td align="left" style="width:33.3">OPRAES V1.0</td>
                        <td align="center" style="width:33.3">Page <span class="pagenum"></span></td>
                        <td align="right" style="width:33.3">Printed On: {{now()->format('D d F Y H:i')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>

        <div class="border">
            <div class="container">
                <center>
                    <h3>SECTION 4: REVISED OBJECTIVES
                        <br>
                        <small><i>To be filled by the Appraisee in consultation with the Supervisor</i></small>
                        <br>
                    </h3>
                </center>
                <table border="1">
                    <thead>
                        <tr>
                            <th class="">4.1 S/N</th>
                            <th>4.2 Agreed Revised Objective(s)</th>
                            <th>4.3 Agreed Performance Targets</th>
                            <th>4.4 Agreed Performance Criteria</th>
                            <th>4.5 Agreed Resources</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opras->revisedObjectives as $key => $revisedObjective)

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{!!$revisedObjective->objective!!}</td>
                                <td>{!!$revisedObjective->target!!}</td>
                                <td>{!!$revisedObjective->criteria!!}</td>
                                <td>{!!$revisedObjective->resource!!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br><br>

                <table style="border: 0px;">
                    <tbody>
                        <tr>
                            <td align="left" colspan="2" style="width:50"><h4>4.6 Appraisee</h4></td>
                            <td align="left" colspan="2" style="width:50"><h4>4.7 Supervisor</h4></td>
                        </tr>
                        <tr style="margin-bottom:4px;">
                            <td align="left" style="width:35"><span class="dotted">{{strtoupper($opras->user->full_name)}}</span> <br> <small>Name</small></td>
                            <td align="left" style="width:15">.............. <br> <small>Signed</small></td>
                            <td align="left" style="width:35"><span class="dotted">{{strtoupper($opras->personalInformation->supervisor->full_name)}}</span> <br> <small>Name</small></td>
                            <td align="left" style="width:15">.............. <br> <small>Signed</small></td>
                        </tr>
                        <tr>
                            <td align="left" colspan="2" style="width:50"><span class="dotted">{{$revisedObjective->created_at->format('d-m-Y')}}</span> <br> <small>Date</small></td>
                            <td align="left" colspan="2" style="width:50"><span class="dotted">{{$revisedObjective->updated_at->format('d-m-Y')}}</span> <br> <small>Date</small> </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        @endif


        <div class="footer">
            <table style="border: 0px;">
                <tbody>
                    <tr>
                        <td align="left" style="width:33.3">OPRAES V1.0</td>
                        <td align="center" style="width:33.3">Page <span class="pagenum"></span></td>
                        <td align="right" style="width:33.3">Printed On: {{now()->format('D d F Y H:i')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>

        <div class="border">
            <div class="container">
                <center>
                    <h3>SECTION 5: ANNUAL PERFORMANCE REVIEW & APPRAISAL (JUNE ……{{ $year->created_at->year }}/{{ $year->created_at->year+1 }}....)
                        <br>
                        <small><i>To be filled by the Appraisee and the Supervisor</i></small>
                        <br>
                    </h3>
                </center>
                <table border="1">
                    <thead>
                        <tr>
                            <th rowspan="2" class="">5.1 S/N</th>
                            <th rowspan="2">5.2 Agreed Objective(s)</th>
                            <th rowspan="2">5.3 Progress made</th>
                            <th colspan="3" class="" align="">5.4 Rated Mark</th>
                        </tr>
                        <tr>
                            <th>Appraisee</th>
                            <th>Supervisor</th>
                            <th>Agreed Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalAppraisee = 0;
                            $totalSupervisor = 0;
                            $totalAgreed = 0;
                        @endphp
                        @foreach ($opras->annualReviews as $key => $annualReview)

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{!!$annualReview->objective!!}</td>
                                <td>{!!$annualReview->progress_made!!}</td>
                                <td>{!!$annualReview->ratedMark->appraisee!!}</td>
                                <td>{!!$annualReview->ratedMark->supervisor!!}</td>
                                <td>{!!$annualReview->ratedMark->agreed!!}</td>
                            </tr>
                            @php
                                $totalAppraisee = $totalAppraisee + $annualReview->ratedMark->appraisee;
                                $totalSupervisor = $totalSupervisor + $annualReview->ratedMark->supervisor;
                                $totalAgreed = $totalAgreed + $annualReview->ratedMark->agreed;
                            @endphp
                        @endforeach

                            <tr>
                                <td colspan="3">TOTAL</td>
                                <td>{{$totalAppraisee}}</td>
                                <td>{{$totalSupervisor}}</td>
                                <td>{{$totalAgreed}}</td>
                            </tr>

                    </tbody>
                </table>
                <br><br>
                Rating:
                <table style="border: 0px;">
                    <tbody>
                        <tr>
                            <td align="left" style="width:33.3">1 = Outstanding performance</td>
                            <td align="left" style="width:33.3">2 = Performance above average</td>
                            <td align="left" style="width:33.3">3 = Average performance</td>
                        </tr>
                        <tr>
                            <td align="left" style="width:33.3">4 = Poor performance</td>
                            <td align="left" style="width:33.3">5 = Very poor performance</td>
                            <td align="left" style="width:33.3"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="footer">
            <table style="border: 0px;">
                <tbody>
                    <tr>
                        <td align="left" style="width:33.3">OPRAES V1.0</td>
                        <td align="center" style="width:33.3">Page <span class="pagenum"></span></td>
                        <td align="right" style="width:33.3">Printed On: {{now()->format('D d F Y H:i')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>

        <div class="border">
            <div class="container">
                <center>
                    <h3>SECTION 6: ATTRIBUTES OF GOOD PERFORMANCE
                        <br>
                        <small><i>To be filled by the Appraisee and the Supervisor</i></small>
                        <br>
                    </h3>
                </center>

                <table border="1">
                    <thead>
                    <tr>
                        <th rowspan="2" class="">6.1 S/N</th>
                        <th rowspan="2">6.2 MAIN FACTORS</th>
                        <th rowspan="2">6.3 QUALITY ATTRIBUTE</th>
                        <th colspan="3" class="" align="center">6.4 RATED MARK</th>
                    </tr>
                    <tr>
                            <th>Appraisee</th>
                            <th>Supervisor</th>
                            <th>Agreed</th>
                    </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td rowspan="3">1</td>
                            <td rowspan="3">WORKING RELATIONSHIPS</td>
                            <td>Ability to work in team</td>
                            <td>{{$opras->attributePerformance->teamWorkMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->teamWorkMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->teamWorkMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to get on with other staff</td>
                            <td>{{$opras->attributePerformance->interactionMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->interactionMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->interactionMark->agreed}}</td>
                        </tr>
                        </tr>
                        <tr>
                            <td>Ability to gain respect from others</td>
                            <td>{{$opras->attributePerformance->respectMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->respectMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->respectMark->agreed}}</td>
                        </tr>


                        <tr>
                            <td rowspan="4">2</td>
                            <td rowspan="4">COMMUNICATION AND LISTENING</td>
                            <td>Ability to express in writing</td>
                            <td>{{$opras->attributePerformance->writtingMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->writtingMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->writtingMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to express orally</td>
                            <td>{{$opras->attributePerformance->speakMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->speakMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->speakMark->agreed}}</td>
                        </tr>
                        </tr>
                        <tr>
                            <td>Ability to listen and comprehend</td>
                            <td>{{$opras->attributePerformance->listenMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->listenMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->listenMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to train and develop subordinates</td>
                            <td>{{$opras->attributePerformance->trainMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->trainMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->trainMark->agreed}}</td>
                        </tr>


                        <tr>
                            <td rowspan="3">3</td>
                            <td rowspan="3">MANAGEMENT AND LEADERSHIP</td>
                            <td>Ability to plan and organize</td>
                            <td>{{$opras->attributePerformance->planOrganizeMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->planOrganizeMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->planOrganizeMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to lead, motivate and resolve conflicts</td>
                            <td>{{$opras->attributePerformance->leadMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->leadMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->leadMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to initiate and innovate</td>
                            <td>{{$opras->attributePerformance->innitiateInnovateMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->innitiateInnovateMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->innitiateInnovateMark->agreed}}</td>
                        </tr>


                        <tr>
                            <td rowspan="4">4</td>
                            <td rowspan="4">PERFOMANCE IN TERMS OF QUALITY</td>
                            <td>Ability to deliver accurate and high quality output timely</td>
                            <td>{{$opras->attributePerformance->outputMark->appraisee}}</td>
                            <td>{{$opras->attributePerformance->outputMark->supervisor}}</td>
                            <td>{{$opras->attributePerformance->outputMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability for resilience and persistence</td>
                            <td>{{$opras->attributePerformance->persistenceMark->appraisee}}</td>
                            <td>{{$opras->attributePerformance->persistenceMark->supervisor}}</td>
                            <td>{{$opras->attributePerformance->persistenceMark->agreed}}</td>
                        </tr>
                        <tr></tr>
                        <tr></tr>

                        <tr>
                            <td rowspan="2">5</td>
                            <td rowspan="2">PERFORMANCE IN TERMS OF QUANTITY</td>
                            <td>Ability to meet demand</td>
                            <td>{{$opras->attributePerformance->demandMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->demandMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->demandMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to handle extra work</td>
                            <td>{{$opras->attributePerformance->extraWorkMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->extraWorkMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->extraWorkMark->agreed}}</td>
                        </tr>


                        <tr>
                            <td rowspan="2">6</td>
                            <td rowspan="2">RESPONSIBILITY AND JUDGEMENT</td>
                            <td>Ability to accept and fulfil responsibility</td>
                            <td>{{$opras->attributePerformance->responsibilityMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->responsibilityMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->responsibilityMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to make right decisions</td>
                            <td>{{$opras->attributePerformance->decisionsMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->decisionsMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->decisionsMark->agreed}}</td>
                        </tr>


                        <tr>
                            <td>7</td>
                            <td>CUSTOMER FOCUS</td>
                            <td>Ability to respond well to the customer</td>
                            <td>{{$opras->attributePerformance->customerMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->customerMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->customerMark->agreed}}</td>
                        </tr>


                        <tr>
                            <td rowspan="3">8</td>
                            <td rowspan="3">LOYALITY</td>
                            <td>Ability to demonstrate follower ship skills</td>
                            <td>{{$opras->attributePerformance->followershipMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->followershipMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->followershipMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to provide ongoing support to supervisor(s)</td>
                            <td>{{$opras->attributePerformance->supportMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->supportMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->supportMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to comply with lawful instructions of supervisors</td>
                            <td>{{$opras->attributePerformance->instructionsMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->instructionsMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->instructionsMark->agreed}}</td>
                        </tr>


                        <tr>
                            <td rowspan="3">9</td>
                            <td rowspan="3">INTEGRITY</td>
                            <td>Ability to devote working time exclusively to work related duties</td>
                            <td>{{$opras->attributePerformance->workingMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->workingMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->workingMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to provide quality services without need for any inducements</td>
                            <td>{{$opras->attributePerformance->servicesMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->servicesMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->servicesMark->agreed}}</td>
                        </tr>
                        <tr>
                            <td>Ability to apply knowledge abilities to benefit Government and not for personal gains</td>
                            <td>{{$opras->attributePerformance->governmentMark->appraisee}}</td>

                                <td>{{$opras->attributePerformance->governmentMark->supervisor}}</td>
                                <td>{{$opras->attributePerformance->governmentMark->agreed}}</td>
                        </tr>

                        <tr>
                            <td colspan="3">Overall Performance</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>

                <br><br>
                Rating:
                <table style="border: 0px;">
                    <tbody>
                        <tr>
                            <td align="left" style="width:33.3">1 = Outstanding performance</td>
                            <td align="left" style="width:33.3">2 = Performance above average</td>
                            <td align="left" style="width:33.3">3 = Average performance</td>
                        </tr>
                        <tr>
                            <td align="left" style="width:33.3">4 = Poor performance</td>
                            <td align="left" style="width:33.3">5 = Very poor performance</td>
                            <td align="left" style="width:33.3"></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="footer">
            <table style="border: 0px;">
                <tbody>
                    <tr>
                        <td align="left" style="width:33.3">OPRAES V1.0</td>
                        <td align="center" style="width:33.3">Page <span class="pagenum"></span></td>
                        <td align="right" style="width:33.3">Printed On: {{now()->format('D d F Y H:i')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>

        <div class="border">
            <div class="container">
                <center>
                    <h3>SECTION 7: OVERALL PERFORMANCE (AVERAGE OF SECTIONS 5 & 6)
                        <span style="text-align:right; margin-left:100px; border:4px solid black; padding: 20px 15px;">{{$opras->overallPerformance->overall_marks}}</span>
                    </h3>
                </center>

                <table style="border: 0px;">
                    <tbody>
                        <tr style="margin-bottom:5px;">
                            <td colspan="3">COMMENTS BY APPRAISEE (if any):</td>
                        </tr>
                        <tr style="margin-bottom:20px;">
                            <td colspan="3">
                                <div style="border:2px solid black; padding: 20px 15px;">
                                    {!! $opras->overallPerformance->appraisee_comments??'No comments' !!}
                                </div>
                            </td>
                        </tr>
                        <tr style="margin-bottom:25px;">
                            <td align="center">{{strtoupper($opras->user->full_name)}}</span> <br> <small>Name of Appraisee</small></td>
                            <td align="center">.................... </span> <br> <small>Signature</small></td>
                            <td align="center">{!! $opras->overallPerformance->created_at->format('d-m-Y')??'' !!}</span> <br> <small>Date</small></td>
                        </tr>
                    </tbody>
                </table>

                <br><br>

                <table style="border: 0px;">
                    <tbody>
                        <tr style="margin-bottom:5px;">
                            <td colspan="3">COMMENTS BY OBSERVER  (if any):</td>
                        </tr>
                        <tr style="margin-bottom:20px;">
                            <td colspan="3">
                                <div style="border:2px solid black; padding: 20px 15px;">
                                    {!! $opras->overallPerformance->observer_comments??'No comments' !!}
                                </div>
                            </td>
                        </tr>
                        <tr style="margin-bottom:25px;">
                            <td align="center">........................</span> <br> <small>Name of Observer</small></td>
                            <td align="center">.................... </span> <br> <small>Signature</small></td>
                            <td align="center">{!! $opras->overallPerformance->created_at->format('d-m-Y')??'' !!}</span> <br> <small>Date</small></td>
                        </tr>
                    </tbody>
                </table>

                <br><br>

                <table style="border: 0px;">
                    <tbody>
                        <tr style="margin-bottom:5px;">
                            <td colspan="3">COMMENTS BY SUPERVISOR (if any):</td>
                        </tr>
                        <tr style="margin-bottom:20px;">
                            <td colspan="3">
                                <div style="border:2px solid black; padding: 20px 15px;">
                                    {!! $opras->overallPerformance->supervisor_comments??'No comments' !!}
                                </div>
                            </td>
                        </tr>
                        <tr style="margin-bottom:25px;">
                            <td align="center">{{strtoupper($opras->personalInformation->supervisor->full_name)}}</span> <br> <small>Name of Supervisor</small></td>
                            <td align="center">.................... </span> <br> <small>Signature</small></td>
                            <td align="center">{!! $opras->overallPerformance->updated_at->format('d-m-Y')??'' !!}</span> <br> <small>Date</small></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="footer">
            <table style="border: 0px;">
                <tbody>
                    <tr>
                        <td align="left" style="width:33.3">OPRAES V1.0</td>
                        <td align="center" style="width:33.3">Page <span class="pagenum"></span></td>
                        <td align="right" style="width:33.3">Printed On: {{now()->format('D d F Y H:i')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>

        <div class="border">
            <div class="container">
                <center>
                    <h3>SECTION 8:  EMPLOYEE REWARDS/DEVELOPMENTAL MEASURES/SANCTIONS
                    </h3>
                </center>

                <p>The supervisor will recommend the most appropriate reward, developmental measures or sanctions against the appraisee in accordance to the level of agreed performance targets.</p>

                <table style="border: 0px;">
                    <tbody>
                        <tr style="margin-bottom:5px;">
                            <td colspan="3">
                                <div style="border:2px solid black; padding: 20px 15px;">
                                    {!! $opras->rewardMeasureSanction->reward_measure_sanction??'' !!}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="footer">
            <table style="border: 0px;">
                <tbody>
                    <tr>
                        <td align="left" style="width:33.3">OPRAES V1.0</td>
                        <td align="center" style="width:33.3">Page <span class="pagenum"></span></td>
                        <td align="right" style="width:33.3">Printed On: {{now()->format('D d F Y H:i')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
