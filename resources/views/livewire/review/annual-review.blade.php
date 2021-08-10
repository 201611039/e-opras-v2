<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        @if ($message)
                            <div class="alert alert-{{ $message[1] }} alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{ $message[0] }}
                            </div>
                        @endif

                        @if ($showModal)
                            @if ($confirmAnnualReview)
                            <div>
                                <div class="form-group">
                                    <label>Reasons *</label>
                                    <textarea class="form-control summernote" wire:model="comments"></textarea>
                                </div>

                                <div align="right">
                                    <button type="button" wire:click="saveComment" class="btn btn-primary" >Save</button>
                                </div>

                                <hr>
                            </div>
                            @else
                            <div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="appraisee">Apraisee</label>
                                        <input disabled type="text" value="{{ ($annualReviewModel->ratedMark->appraisee??null) }}" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-4 @if($error) has-error @endif">
                                        <label for="supervisor">Supervisor</label>
                                        <input type="text" wire:model="supervisorMark" class="form-control" name="supervisor">
                                        @if($error)
                                            <span class="text-danger small">
                                                {{ $error[0] }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div align="right">
                                    <button type="button" wire:click="saveMark" class="btn btn-primary" >Save</button>
                                </div>

                                <hr>
                            </div>
                            @endif
                        @endif


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
                                            <a href="javascript:void(0)" class="" data-toggle="modal" data-target="#{{$key}}" title="Show"><i class="fa fa-eye"></i></a>
                                            @if ($confirmAnnualReview)
                                                <a href="javascript:void(0)" style="margin-left: 5px;" data-toggle="modal" data-target="#comment" title="Comment"><i wire:click="selected({{ $annualReview->id }})" class="fa fa-comment"></i></a>
                                                @if ($annualReview->comments)
                                                    <i style="margin-left: 15px;" class="text-danger fa fa-exclamation"></i>
                                                @endif

                                            @else
                                                <a style="margin-left: 10px;" wire:click="selected({{ $annualReview->id }})" href="javascript:void(0)" title="Add rated mark"><i class="fa fa-check-circle"></i></a>
                                            @endif
                                        </td>

                                        <!-- Modal -->
                                        <div id="{{ $key }}" class="modal fade" role="dialog">
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
                                                        <label>Factors Affecting Performance </label>
                                                        <div class="well" style="word-wrap: break-word;">
                                                            {!! $annualReview->factor_affecting_performance !!}
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

                        <div align="right">
                            <button class="btn btn-primary" onclick="accept()" title="Accept" data-toggle="tooltip" data-placement="top"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="decline()" title="Decline" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('css')
	<!-- Data Tables -->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection


@section('js')

<script>
    function decline () {
        if (confirm('Are you sure?')) {
            Livewire.emit('decline');
        }
    }

    function accept() {
        if (confirm('Are you sure?')) {
            Livewire.emit('accept');
        }
    }
</script>


<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>

@endsection
