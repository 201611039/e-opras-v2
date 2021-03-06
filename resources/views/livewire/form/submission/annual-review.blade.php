<div>
    <h3 class="form-header"><span>Annual Performance Review</span></h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover dataTables" >
        <thead>
        <tr>
            <th rowspan="2">#</th>
            <th rowspan="2">Objectives</th>
            <th rowspan="2">Progress</th>
            <th colspan="3" class="text-center">Rated Mark</th>
            <th rowspan="2" class="text-center">Action</th>
        </tr>
        <tr>
            <th width="20">Appraisee</th>
            <th width="20">Supervisor</th>
            <th width="20">Agreed</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($opras->annualReviews as $key => $annualReview)
                <tr class="gradeX">
                    <td>{{ $key+1 }}</td>
                    <td>{!! str_limit($annualReview->objective, 10, '...') !!}</td>
                    <td>{!! str_limit($annualReview->progress_made, 10, '...') !!}</td>

                    <td>{{ $annualReview->ratedMark->appraisee??null }}</td>
                    <td>{{ $annualReview->ratedMark->supervisor??null }}</td>
                    <td>{{ $annualReview->ratedMark->agreed??null }}</td>

                    <td class="text-center">
                        <a href="#" class="" data-toggle="modal" data-target="#annual-{{$key}}" title="Show"><i class="fa fa-eye"></i></a>
                        @if ($opras->checkSectionFive())
                            <a style="margin-left: 5px;" href="{{ route('annual-review.edit', $annualReview->getRouteKey()) }}" class="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            @if ($annualReview->comments)
                                <i style="margin-left: 15px;" class="text-danger fa fa-exclamation"></i>
                            @endif
                        @endif
                    </td>

                    <!-- Modal -->
                    <div id="annual-{{ $key }}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Annual Performance Review</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Agreed Objectives </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $annualReview->objective !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Progress </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $annualReview->progress_made !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Appraisee Rated Mark</label>
                                            <div class="well">
                                                {!! $annualReview->ratedMark->appraisee??null !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Supervisor Rated Mark</label>
                                            <div class="well">
                                                {!! $annualReview->ratedMark->supervisor??null !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Agreed Rated Mark</label>
                                            <div class="well">
                                                {!! $annualReview->ratedMark->agreed??null !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($annualReview->comments)
                                    <div class="form-group">
                                        <label>Comments </label>
                                        <div class="well" style="word-wrap: break-word;">
                                            {!! $annualReview->comments !!}
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                        </div>
                    </div>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
