<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            @livewire('form.side-links', ['opras' => $opras], key($opras->id))

            <div class="col-md-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        @if ($opras->checkSectionTwo())
                            <div align="right">
                                <a href="{{ route('performance-agreement.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Add Performance Agreement"><i class="fa fa-plus"></i></a>
                            </div>

                        @elseif($opras->reviewSectionTwo())
                        <div class="alert alert-info" role="alert">
                            Fowarded to supervisor
                        </div>
                        @endif
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
                                            <a href="#" class="" data-toggle="modal" data-target="#{{$key}}" title="Show"><i class="fa fa-eye"></i></a>
                                            @if ($opras->checkSectionTwo())
                                                <a style="margin-left: 5px;" href="{{ route('performance-agreement.edit', $performance->getRouteKey()) }}" class="" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a style="margin-left: 5px;" href="javascript:void(0)" onclick="deleteData({{ $performance }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                <form hidden method="post" action="{{ route('performance-agreement.destroy', $performance->getRouteKey()) }}" id="form{{ $performance->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @if ($performance->comments)
                                                    <i style="margin-left: 15px;" class="text-danger fa fa-exclamation"></i>
                                                @endif
                                            @endif
                                        </td>

                                        <!-- Modal -->
                                        <div id="{{ $key }}" class="modal fade" role="dialog">
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

                        @if ($opras->checkSectionTwo())
                            <div align="right">
                                <form action="{{ route('performance-agreement.foward') }}" method="POST">
                                    @csrf

                                    <button type="submit" title="Foward to my supervisor" data-toggle="tooltip" data-placement="left" class="btn btn-warning"><i class="fa fa-send"></i></button>
                                </form>
                            </div>
                        @endif
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

<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script>
    function deleteData(performance) {
        if (confirm('Delete entire row ?')) {
            $('#form'+performance.id).submit()
        }
    }
</script>


@endsection
