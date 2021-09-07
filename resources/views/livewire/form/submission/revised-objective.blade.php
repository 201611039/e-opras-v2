<div>
    <h3 class="form-header"><span>Revised Objectives</span></h3>

    @if ($opras->revisedObjectives->count())
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
            @foreach ($opras->revisedObjectives as $key => $revisedObjectives)
                <tr class="gradeX">
                    <td>{{ $key+1 }}</td>
                    <td>{!! str_limit($revisedObjectives->objective, 10, '...') !!}</td>
                    <td>{!! str_limit($revisedObjectives->target, 10, '...') !!}</td>
                    <td>{!! str_limit($revisedObjectives->criteria, 10, '...') !!}</td>
                    <td>{!! str_limit($revisedObjectives->resource, 10, '...') !!}</td>

                    <td class="text-left">
                        <a href="#" class="" data-toggle="modal" data-target="#revised-{{$key}}" title="Show"><i class="fa fa-eye"></i></a>
                        @if ($opras->checkSectionFour())
                            <a style="margin-left: 5px;" href="{{ route('revised-objectives.edit', $revisedObjectives->getRouteKey()) }}" class="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a style="margin-left: 5px;" href="javascript:void(0)" onclick="deleteData({{ $revisedObjectives }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            <form hidden method="post" action="{{ route('revised-objectives.destroy', $revisedObjectives->getRouteKey()) }}" id="form{{ $revisedObjectives->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            @if ($revisedObjectives->comments)
                                <i style="margin-left: 15px;" class="text-danger fa fa-exclamation"></i>
                            @endif
                        @endif
                    </td>

                    <!-- Modal -->
                    <div id="revised-{{ $key }}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Revised Objectives</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Agreed Objectives </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $revisedObjectives->objective !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Performance Targets </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $revisedObjectives->target !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Performance Criteria </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $revisedObjectives->criteria !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Agreed Resource </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $revisedObjectives->resource !!}
                                    </div>
                                </div>

                                @if ($revisedObjectives->comments)
                                <div class="form-group">
                                    <label>Reason for Supervisor decline </label>
                                    <div class="well" style="word-wrap: break-word;">
                                        {!! $revisedObjectives->comments !!}
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
    @else
    <div class="alert alert-danger ">
        This section is skipped
    </div>
    @endif
</div>
