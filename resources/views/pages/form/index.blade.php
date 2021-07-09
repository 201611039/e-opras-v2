@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            @if ($opras)
                @livewire('form.side-links', ['opras' => request()->user()->myOpras()], key(request()->user()->myOpras()->id))
            @else
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                        <p>No opras form created</p>
                        <form action="{{ route('opras.form') }}" method="post">
                            @csrf

                            <button class="btn btn-primary">Create Opras Form</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


@endsection
