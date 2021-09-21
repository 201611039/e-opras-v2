<div>
    <h3 class="form-header"><span>Performance Agreements</span></h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover dataTables" >
        <thead>
        <tr>
            <th>#</th>
            <th>Objectives</th>
            <th>Performance Targets</th>
            <th>Performance Criteria</th>
            <th>Resources</th>
            <th class="text-left">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($opras->performanceAgreements as $key => $performance)
                <tr class="gradeX">
                    <td>{{ $key+1 }}</td>
                    <td>{!! str_limit($performance->objective, 10, '...') !!}</td>
                    <td>{!! str_limit($performance->target, 10, '...') !!}</td>
                    <td>{!! str_limit($performance->criteria, 10, '...') !!}</td>
                    <td>{!! str_limit($performance->resource, 10, '...') !!}</td>

                    <td class="text-left">
                        <a href="#" class="" data-toggle="modal" data-target="#performance-{{$key}}" title="Show"><i class="fa fa-eye"></i></a>
                    </td>

                    <!-- Modal -->
                    <div id="performance-{{ $key }}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Performance Agreement</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Agreed Objectives </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $performance->objective !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Performance Targets </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $performance->target !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Performance Criteria </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $performance->criteria !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Agreed Resource </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $performance->resource !!}
                                    </div>
                                </div>

                                @if ($performance->comments)
                                <div class="form-group">
                                    <label>Reason for Supervisor decline </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $performance->comments !!}
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
