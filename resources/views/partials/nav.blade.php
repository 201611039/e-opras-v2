@php
$navigations = [[
	'name' => 'Dashboard', 'roles' => ['dashboard'], 'icon' => 'fa fa-th-large', 'url' => url('/')
    ], [
        'name' => 'Role', 'icon' => 'fa fa-shield', 'roles' => ['role-edit', 'role-create', 'role-view', 'role-delete',], 'segment' => 'roles', 'url' => route('roles.index'), 'childrens' => null
    ], [
        'name' => 'User', 'icon' => 'fa fa-user', 'roles' => ['user-edit', 'user-create', 'user-view', 'user-delete',], 'segment' => 'users', 'url' => route('users.index'), 'childrens' => null
    ], [
        'name' => 'Opras', 'icon' => 'fa fa-folder', 'roles' => ["annual-review-create",
        "annual-review-delete", "annual-review-edit", "annual-review-review", "annual-review-view", "attachment-create", "attachment-delete", "attachment-edit", "attachment-review", "attachment-view", "attribute-good-performance-create", "attribute-good-performance-delete", "attribute-good-performance-edit", "attribute-good-performance-review", "attribute-good-performance-view", "mid-year-review-create", "mid-year-review-delete", "mid-year-review-edit", "mid-year-review-review", "mid-year-review-view", "opras-archive", "opras-create", "opras-delete", "opras-view", "overall-perfomance-create", "overall-perfomance-delete", "overall-perfomance-edit", "overall-perfomance-review", "overall-perfomance-view", "performance-agreement-create", "performance-agreement-delete", "performance-agreement-edit", "performance-agreement-review", "performance-agreement-view", "personal-information-create", "personal-information-delete", "personal-information-edit", "personal-information-review", "personal-information-view", "revised-objective-create", "revised-objective-delete", "revised-objective-edit", "revised-objective-review", "revised-objective-view", "sanction-reward-create", "sanction-reward-delete", "sanction-reward-edit", "sanction-reward-review", "sanction-reward-view"], 'segment' => 'users', 'url' => '#', 'childrens' => [
            [
                'name' => 'Review', 'icon' => 'fa fa-tasks', 'roles' => ["personal-information-review",
                "performance-agreement-review", "mid-year-review-review", "revised-objective-review", "annual-review-review", "attribute-good-performance-review", "overall-perfomance-review", "sanction-reward-review", "attachment-review",], 'segment' => 'review', 'url' => route('review.index')
            ], [
                'name' => 'Form', 'icon' => 'fa fa-list-alt', 'roles' => ["personal-information-view",
                "performance-agreement-view", "mid-year-review-view", "revised-objective-view", "annual-review-view", "attribute-good-performance-view", "overall-perfomance-view", "sanction-reward-view", "attachment-view", "opras-view"], 'segment' => 'opras-form', 'url' => route('opras.index')
            ], [
                'name' => 'Archive', 'icon' => 'fa fa-archive', 'roles' => ["opras-archive"], 'segment' => 'archive', 'url' => route('users.index')
            ]
        ]
    ]
];
    $navigations = collect($navigations);
@endphp


<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" width="50" src="{{ Auth::user()->image_path == ''? asset('img/profiles/user.png') : asset(Auth::user()->image_path) }}" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->full_name }}</strong>
                         </span> <span class="text-muted text-xs block">{{ request()->user()->role }} <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('users.show', request()->user()->slug) }}"> <i class="fa fa-user"></i>  Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('user.password') }}"> <i class="fa fa-shield"></i>  Change Pasword</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-nav').submit();">
                                <i class="fa fa-sign-out"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-nav" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    MUST
                </div>
            </li>

            @foreach ($navigations as $navigation)
            @php
                if(isset($navigation['childrens'])) {
                    $nav = $navigation['childrens'];
                } else {$nav = [$navigation];}
            @endphp
            @canany($navigation['roles']??[])
            <li class="{{ collect($nav)->contains('segment',$segment_1)? 'active':'' }}">
                <a href="{!! $navigation['url'] !!}"><i class="{{ $navigation['icon'] }}"></i> <span class="nav-label">{!! $navigation['name'] !!} </span> @isset($navigation['childrens']) <span class="fa arrow"></span> @endisset</a>
                @isset($navigation['childrens'])
                <ul class="nav nav-second-level collapse">
                        @foreach ($navigation['childrens'] as $level_2)
                        @php
                            if(isset($level_2['childrens'])) {
                                $nav = $level_2['childrens'];
                            } else {$nav = [$level_2];}
                        @endphp

                        @canany($level_2['roles']??[])
                        <li class="{{ collect($nav)->contains('segment', $segment_1) || collect($nav)->contains('segment', $segment_2)? 'active':'' }}">
                            <a href="{!! $level_2['url'] !!}"> <i class="{{ $level_2['icon'] }}"></i> {!! $level_2['name'] !!} <span class="{{ isset($level_2['childrens'])?'fa arrow':'' }}"></span></a>
                            @isset($level_2['childrens'])
                                <ul class="nav nav-third-level">
                                @foreach ($level_2['childrens'] as $level_3)
                                    @php
                                        if(isset($level_3['childrens'])) {
                                            $nav = $level_3['childrens'];
                                        } else {$nav = [$level_3];}
                                    @endphp
                                    @canany($level_3['roles']??[])
                                    <li>
                                        <a href="{{ $level_3['url'] }}" style="{{ collect($nav)->contains('segment', $segment_1) || collect($nav)->contains('segment', $segment_2)? 'color:#ffffff;':'' }}">{!! $level_3['name'] !!}</a>
                                    </li>
                                    @endcanany
                                @endforeach
                                </ul>
                            @endisset
                        </li>
                        @endcanany
                        @endforeach
                    </ul>
                @endisset
            </li>
            @endcanany
            @endforeach

        </ul>

    </div>
</nav>
