<div class="col-md-3" id="process">
    <div class="list-group">
        <a data-toggle="tooltip" title="Personal Information" data-placement="top" href="{{ route('personal-information.index') }}" class="list-group-item {{ $segment == 'personal-information'? 'active':'' }}">
            @if ($opras->sectionOne()->status??false)
                <span class="pull-right text-info">
                    <i class="fa fa-check-square-o"></i>
                </span>
            @else
                <span class="pull-right text-danger">
                    <i class="fa fa-times"></i>
                </span>
            @endif
            SECTION 1
        </a>

        <a data-toggle="tooltip" title="Performance Agreement" data-placement="top" href="{{ $opras->sectionOne()->status??false? route('performance-agreement.index'):'#' }}" class="list-group-item {{ $segment == 'performance-agreement'? 'active':'' }} {{ $opras->sectionOne()->status??false? '':'disabled' }}">
            @if ($opras->sectionTwo()->status??false)
                <span class="pull-right text-info">
                    <i class="fa fa-check-square-o"></i>
                </span>
            @else
                <span class="pull-right text-danger">
                    <i class="fa fa-times"></i>
                </span>
            @endif
            SECTION 2
        </a>

        <a data-toggle="tooltip" title="Mid-Year Review" data-placement="top" href="{{ $opras->sectionTwo()->status??false?route('mid-year-review.index'):'#' }}" class="list-group-item {{ $segment == 'mid-year-review'? 'active':''}} {{ $opras->sectionTwo()->status??false?'':'disabled' }}">
            @if ($opras->sectionThree()->status??false)
                <span class="pull-right text-info">
                    <i class="fa fa-check-square-o"></i>
                </span>
            @else
                <span class="pull-right text-danger">
                    <i class="fa fa-times"></i>
                </span>
            @endif
            SECTION 3
        </a>

        <a data-toggle="tooltip" title="Revised Objectives" data-placement="top" href="{{ $opras->sectionThree()->status??false?/* route('form.section.4') */ '#':'#' }}" class="list-group-item {{ $segment == 'revised-objectives'? 'active':'' }} {{ ($opras->sectionThree()->status??false)?'':'disabled' }}">
            @if ($opras->sectionFour()->status??false)
                <span class="pull-right text-info">
                    <i class="fa fa-check-square-o"></i>
                </span>
            @else
                <span class="pull-right text-danger">
                    <i class="fa fa-times"></i>
                </span>
            @endif
            SECTION  4
        </a>

        <a data-toggle="tooltip" title="Annual Performance Review" data-placement="top" href="{{ $opras->sectionFour()->status??false?/* route('form.section.5') */ '#':'#'  }}" class="list-group-item {{ $segment == 'annual-perfomance-review'? 'active':'' }}  {{ $opras->sectionFour()->status??false?'':'disabled' }}">
            @if ($opras->sectionFive()->status??false)
                <span class="pull-right text-info">
                    <i class="fa fa-check-square-o"></i>
                </span>
            @else
                <span class="pull-right text-danger">
                    <i class="fa fa-times"></i>
                </span>
            @endif
            SECTION 5
        </a>

        <a data-toggle="tooltip" title="Attribute of Good Performance" data-placement="top" href="{{ $opras->sectionFive()->status??false?/* route('form.section.6') */ '#':'#' }}" class="list-group-item {{ $segment == 'attribute-good-perfomance'? 'active':'' }} {{ $opras->sectionFive()->status??false?'':'disabled' }}">
            @if ($opras->sectionSix()->status??false)
                <span class="pull-right text-info">
                    <i class="fa fa-check-square-o"></i>
                </span>
            @else
                <span class="pull-right text-danger">
                    <i class="fa fa-times"></i>
                </span>
            @endif
            SECTION 6
        </a>

        <a data-toggle="tooltip" title="Overall Performance" data-placement="top" href="{{ $opras->sectionSix()->status??false?/* route('form.section.7') */ '#':'#' }}" class="list-group-item {{ $segment == 'overall-performance'? 'active':'' }} {{ $opras->sectionSix()->status??false?'':'disabled' }}">
            @if ($opras->section_7== 'complete??false')
                <span class="pull-right text-info">
                    <i class="fa fa-check-square-o"></i>
                </span>
            @else
                <span class="pull-right text-danger">
                    <i class="fa fa-times"></i>
                </span>
            @endif
            SECTION 7
        </a>

        <a data-toggle="tooltip" title="Reward or Measure or Sanction from Supervisor" data-placement="top" href="{{ $opras->sectionSeven()->status??false?/* route('form.section.8') */ '#':'#' }}" class="list-group-item {{ $segment == 'reward-measure-sanction'? 'active':'' }} {{ $opras->sectionSeven()->status??false?'':'disabled' }}">
            @if ($opras->sectionEight()->status??false)
                <span class="pull-right text-info">
                    <i class="fa fa-check-square-o"></i>
                </span>
            @else
                <span class="pull-right text-danger">
                    <i class="fa fa-times"></i>
                </span>
            @endif
            SECTION 8
        </a>

        <a data-toggle="tooltip" title="Evidence to Support your Overall Performance" data-placement="top" href="{{ $opras->sectionEight()->status??false?route('attachments.index'):'#' }}" class="list-group-item {{ $segment == 'attachments'? 'active':'' }} {{ $opras->sectionEight()->status??false?'':'disabled' }}">
            ATTACHMENTS
        </a>

        <a data-toggle="tooltip" title="Declaration and Submission" data-placement="top" href="{{ $opras->sectionEight()->status??false?route('form.submission'):'#' }}" class="list-group-item {{ $segment == 'submission'? 'active':'' }} {{ $opras->sectionEight()->status??false?'':'disabled' }}">
            FORM SUBMISSION
        </a>
    </div>
</div>
