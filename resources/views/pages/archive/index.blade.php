@extends('layouts.app')

@section('css')
	<!-- Data Tables -->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')

    @php
        // Get remark
        class Remark
        {
            public function getRemark($score)
            {
                if ($score >= 5 ) {
                    return 'Very poor performance';
                }
                if ($score >= 4 ) {
                    return 'Poor performance';
                }
                if ($score >= 3 ) {
                    return 'Average performance';
                }
                if ($score >= 2 ) {
                    return 'Performance above average';
                }
                if ($score >= 1 ) {
                    return 'Outstanding performance';
                }
            }

        }

        $remark = new Remark;

    @endphp

    <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Users List</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" >
                    <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>Year</th>
                        <th>Overall Mark</th>
                        <th>Remark</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach ($forms as $key => $form)
		                    <tr class="gradeX">
		                        <td>{{ $key+1 }}</td>
		                        <td>{{ $form->year->start->year. '/' .$form->year->end->year   }}</td>
		                        <td>{{ $form->overallPerformance->overall_marks }}</td>
		                        <td>
                                    {{ $remark->getRemark($form->overallPerformance->overall_marks) }}
                                </td>
		                        <td class="text-center">
		                        	<a href="{{ route('archive.show', $form->getRouteKey()) }}" class="" data-toggle="tooltip" data-placement="top" title="Show"><i class="fa fa-eye"></i></a>
		                        </td>
		                    </tr>
                    	@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection

@section('js')
	<!-- Data Tables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
@endsection
