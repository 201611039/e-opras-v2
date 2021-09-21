<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            @livewire('form.side-links', ['opras' => $opras], key($opras->id.str_random(15)))

            <div class="col-md-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        @livewire('form.submission.personal-information', ['opras' => $opras], key($opras->id.str_random(15)))

                        <hr>

                        @livewire('form.submission.performance-agreement', ['opras' => $opras], key($opras->id.str_random(15)))

                        <hr>

                        @livewire('form.submission.mid-year-review', ['opras' => $opras], key($opras->id.str_random(15)))

                        <hr>

                        @livewire('form.submission.revised-objective', ['opras' => $opras], key($opras->id.str_random(15)))

                        <hr>

                        @livewire('form.submission.annual-review', ['opras' => $opras], key($opras->id.str_random(15)))

                        <hr>

                        @livewire('form.submission.attribute-performance', ['opras' => $opras], key($opras->id.str_random(15)))

                        <hr>

                        @livewire('form.submission.overall-performance', ['opras' => $opras], key($opras->id.str_random(15)))

                        <hr>

                        @livewire('form.submission.reward-measure-sanction', ['opras' => $opras], key($opras->id.str_random(15)))

                        @if (!$opras->status)
                        <form id="form" action="{{ route('submission.store', $opras->slug) }}" method="POST">
                            @csrf

                            <div align="right">
                                <a href="javascript:void(0)" onclick="submitForm()" title="Complete" data-toggle="tooltip" data-placement="top" class="btn btn-primary"><i class="fa fa-check"></i></a>
                            </div>
                        </form>

                        @else

                        <button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('css')
    <style>
        .form-header {
            color: #3F80C2;
            padding-bottom: 10px;
        }

        .form-header span {
            border-bottom: 2px #76797B solid;
        }
    </style>
@endsection

@section('js')
    <script>
        function submitForm() {
            if (confirm('Are you sure?')) {
                $('#form').submit()
            }
        }
    </script>
@endsection
