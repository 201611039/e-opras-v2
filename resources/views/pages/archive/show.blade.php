@extends('layouts.app')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
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


                    <div align=right>
                        <a href="{{ route('opras-form.print', $opras->slug) }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

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

