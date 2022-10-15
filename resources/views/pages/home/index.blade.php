@extends('layouts.master')
@section('PageTitle',__('Home'))
@section('PageContent')
@includeIf('layouts.inc.breadcrumb')
<b>@lang('Dashbord')</b>
<br>
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            @foreach ($statistic as $item)
                <div class="col-md-{{$item['col']}}">
                    <a href="{{ $item['route'] }}">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">{{$item['title']}}</p>
                                        <h4 class="mb-0">
                                            {{$item['count']}}
                                        </h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx {{ $item['icon'] }} font-size-24"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<br>
<div class="row">
    @if (auth()->user()->can('Branche_read-branches'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('branches.index') }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Branches')</b>
                        <span class="float-end">{{ $branchesCount }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if (auth()->user()->can('Branche_read-terminal'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('terminals.index') }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Terminal')</b>
                        <span class="float-end">{{ $terminalCount    }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif

    @if (auth()->user()->can('Branche_read-users'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('users.index')  }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Users')</b>
                        <span class="float-end">{{ $usersCount }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if (auth()->user()->can('Branche_read-roles'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('roles.index') }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Roles')</b>
                        <span class="float-end">{{ $rolesCount }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if (auth()->user()->can('Branche_read-network'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('networks.index') }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Network Providers')</b>
                        <span class="float-end">{{ $networkCount }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if (auth()->user()->can('Branche_read-project'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('projects.index') }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Projects')</b>
                        <span class="float-end">{{ $projectCount }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if(auth()->user()->can('Branche_read-branch-level'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('levels.index') }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Branche Level')</b>
                        <span class="float-end">{{ $branchLevelCount }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if(auth()->user()->can('Branche_read-line-type'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('line-types.index') }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Connecting Line Type')</b>
                        <span class="float-end">{{ $lineTypeCount }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if(auth()->user()->can('Branche_read-switch-model'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('switch-model.index') }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Switch Model')</b>
                        <span class="float-end">{{ $switchModelCount }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @if(auth()->user()->can('Branche_read-line-capacity'))
    <div class="col-md-4 pt-2">
        <a href="{{ route('line-capacities.index') }}">
            <div class="card">
                <div class="card-body">
                    <div>
                        <b>@lang('Line Capacity')</b>
                        <span class="float-end">{{ $lineCapacityCount }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
</div>



@endsection
@push('scripts')

@endpush
