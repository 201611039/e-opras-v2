<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><span class="text-danger">{{ $opras->user->full_name }}</span> Performance Agreements</h5>
                </div>
                <div class="ibox-content">
                    @if ($message)
                        <div class="alert alert-{{ $message[1] }} alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{ $message[0] }}
                        </div>
                    @endif

                    @if ($showModal)
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
                            @foreach ($opras->performanceAgreement as $key => $performance)
                                <tr class="gradeX">
                                    <td>{{ $key+1 }}</td>
                                    <td>{!! str_limit($performance->objective, 10, '...') !!}</td>
                                    <td>{!! str_limit($performance->target, 10, '...') !!}</td>
                                    <td>{!! str_limit($performance->criteria, 10, '...') !!}</td>
                                    <td>{!! str_limit($performance->resource, 10, '...') !!}</td>

                                    <td class="text-left">
                                        <a href="#" data-toggle="modal" data-target="#{{$key}}" title="Show"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" style="margin-left: 5px;" data-toggle="modal" data-target="#comment" title="Comment"><i wire:click="selected({{ $performance->id }})" class="fa fa-comment"></i></a>
                                        @if ($performance->comments)
                                            <i style="margin-left: 15px;" class="text-danger fa fa-exclamation"></i>
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

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>

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

    <script>
        Livewire.on('addComment', () => {
            $(document).ready(function () {
                var elements = document.querySelectorAll('.summernote');

                elements.forEach(element => {
                    ClassicEditor
                    .create( element )
                    .then( editor => {

                    } )
                    .catch( error => {
                        console.error( error );
                    } );
                });
            });
        })
    </script>
@endsection
