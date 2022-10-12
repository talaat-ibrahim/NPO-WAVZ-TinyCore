@extends('layouts.master')
@section('PageTitle', $breadcrumb['title'])
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/datatable/bootstrap.min.css') }}">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet" />
@endsection
@section('PageContent')
    @includeIf('layouts.inc.breadcrumb')

    <div style="margin-bottom: 14px; position: relative; display: flex; justify-content: space-between; align-items: center;">
       @if (auth()->user()->can('Branche_import-branches'))
        <form method="POST" enctype="multipart/form-data" action="{{ route('branches.import') }}" style="display: flex; justify-content: space-between; gap: 10px">
            @csrf
                <div style="height: 40px;">
                    <input type="file" class="form-control" name="file" />
                </div>
                <button type="submit" class="btn btn-success">@lang('Import')</button>
            </form>
       @endif
        @if (auth()->user()->can('Branche_export-branches'))
        <a href="" class="btn btn-info">@lang('Export')</a>
        @endif

        @if(auth()->user()->can('Branche_create-branches'))
            <a type="button" class="btn btn-primary float-start" href="{{ route('branches.create') }}">@lang('Create new branche')</a>
        @endif
    </div>
    @if (auth()->user()->can('Branche_search-filter-branches'))
    <div class="filter p-3 ">
        <form method="GET"  action="{{ route('branches.index') }}">
            <div class="card">
                
                <div class="card-body " >
                    <div class="row">
                        <div class="col-md-10 pt-2">
                            <div class="form-floating" >
                                <input type="text" class="form-control" style="height: 58px;" name="keyword" value="{{ request('keyword') }}"
                                    placeholder="@lang('Search...') }}" />
                                <label style="margin-top: -10px;">@lang('Search...')</label>
                            </div>
                        </div>
                        <div class="col-md-2 pt-3">
                            <button type="submit" class="btn btn-success">@lang('Search')</button>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    @endif
    @if (auth()->user()->can('Branche_filter-branches'))
    <div class="filter p-2 ">
        <form method="GET"  action="{{ route('branches.index') }}">
            <div class="card">
                <div class="card-header">
                    <button type="button" id="filter" class="btn btn-default"> <i class="fa fa-filter"></i> @lang('Filter')</button>
                </div>
                <div class="card-body " id="filter-body">
                    <div class="row">
                       
                        <div class="col-md-4 pt-2">
                            <div class="form-floating" >
                                <select class="form-control select2" name="project_id[]" placeholder="@lang('Project')"multiple>
                                    <option  disabled hidden value="">@lang('Select')</option>
                                    @foreach ($projects as $project)
                                        <option {{ !empty(request('project_id')) ?(in_array($project->id,request('project_id'))? 'selected' :''):'' }}
                                            value="{{$project->id}}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <label>@lang('Project')</label>

                            </div>
                        </div>
                        <div class="col-md-4 pt-2">
                            <div class="form-floating" >
                                <select class="form-control select2" name="ups_installation_id[]"placeholder="@lang('UPS installation') "multiple>
                                    <option  disabled hidden value="">@lang('Select')</option>
                                        @foreach ($upsInstallations as $ups)
                                            <option {{ !empty(request('ups_installation_id')) ?(in_array($ups->id,request('ups_installation_id'))? 'selected' :''):''}}
                                                value="{{ $ups->id }}">{{ $ups->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                <label>@lang('Ups Installation')</label>

                            </div>
                        </div>
                        <div class="col-md-4 pt-2">
                            <div class="form-floating" >
                                <select class="form-control select2" name="line_type_id[]"placeholder="@lang('Line Type') " multiple>
                                    <option  disabled hidden value="">@lang('Select')</option>
                                        @foreach ($lineTypes as $line)
                                            <option {{ !empty(request('line_type_id')) ?(in_array($line->id,request('line_type_id'))? 'selected' :''):''}}
                                                value="{{ $line->id }}">{{ $line->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                <label>@lang('Line Type')</label>

                            </div>
                        </div>
                        <div class="col-md-4 pt-2">
                            <div class="form-floating" >
                                <select class="form-control select2" name="sector[]"placeholder="@lang('Sector') " multiple>
                                    <option  disabled hidden value="">@lang('Select')</option>
                                        @foreach ($sectors as $key=>$sector)
                                            <option {{ !empty(request('sector')) ?(in_array($sector,request('sector'))? 'selected' :''):''}}
                                                value="{{ $sector }}">{{ $sector }}
                                            </option>
                                        @endforeach
                                    </select>
                                <label>@lang('Sector')</label>

                            </div>
                        </div>
                        <div class="col-md-4 pt-2">
                            <div class="form-floating" >
                                <style>
                                    .select2-selection__rendered{
                                        text-align: center !important
                                    }
                                </style>
                                    <select class="form-control select2" name="work_day[]"placeholder="@lang('Working Days') " multiple>
                                    <option  disabled hidden value="">@lang('Select')</option>
                                        @foreach ($days as $key=>$val)
                                            <option {{ !empty(request('work_day')) ?(in_array($key,request('work_day'))? 'selected' :''):'' }}
                                                value="{{ $key }}">{{ $val }}
                                            </option>
                                        @endforeach
                                    </select>
                                <label>@lang('Working Days')</label>

                            </div>
                        </div>
                        <div class="col-md-4 pt-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating" >
                                        <input type="time" class="form-control" name="start_time" value="{{ request()->start_time }}">
                                        <label>@lang('Start Time')</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating" >
                                        <input type="time" class="form-control" name="end_time" value="{{ request()->end_time }}">
                                        <label>@lang('End Time')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">@lang('Search')</button>
                    <a href="{{ route('branches.index') }}" class="btn bg-light btn-default">@lang('Clear')</a>

                </div>
            </div>
        </form>
    </div>
    @endif
    @if ($lists->count() > 0)

        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless" id="branchesTable">
                            <thead>
                                <tr>
                                    <th scope="col">@lang(' Name')</th>
                                    <th scope="col">@lang('Project')</th>
                                    <th scope="col">@lang('Sector')</th>
                                    <th scope="col">@lang('Area')</th>
                                    <th scope="col">@lang('Ups Installations')</th>
                                    <th scope="col">@lang('Line Type')</th>
                                    <th scope="col">@lang('Wan IP')</th>
                                    <th scope="col">@lang('Lan IP')</th>
                                    <th scope="col">@lang('Telephone')</th>
                                    <th scope="col">@lang('address')</th>
                                    <th scope="col">@lang('Main Order ID')</th>
                                    <th scope="col">@lang('Backup Order ID')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lists as $list)
                                    <tr>
                                        <td>
                                            <a href="{{ route('branches.edit', $list->id) }}">
                                                {{ $list->name ?? '' }}
                                            </a>
                                        </td>
                                       
                                        <td>
                                            {{ optional($list->project)->name}}
                                        </td>
                                        <td>
                                            {{ $list->sector }}
                                        </td>
                                        <td>
                                            {{ $list->area }}
                                        </td>
                                       
                                        <td>
                                            {{ optional($list->upsInstallation)->name}}
                                        </td>
                                        <td>
                                            {{ optional($list->lineType)->name}}
                                        </td>
                                        <td>
                                            {{ $list->wan_ip }}
                                        </td>
                                        <td>
                                            {{ $list->lan_ip }}
                                        </td>
                                        <td>
                                            {{ $list->telephone }}
                                        </td>
                                        <td>
                                            {{ $list->address }}
                                        </td>
                                        <td>
                                            {{ $list->main_order_id }}
                                        </td>
                                        <td>
                                            {{ $list->backup_order_id }}
                                        </td>
                                        <td style="display: inline-flex;">
                                           @if (auth()->user()->can('Branche_terminal-branches'))
                                            <a style="margin-right: 5px;" class="btn btn-outline-secondary btn-sm edit"
                                                href="{{ route('branches.commander', $list->id) }}">
                                                <i class="bx bx-terminal"></i>
                                            </a>
                                            @endif
                                           @if (auth()->user()->can('Branche_read-branches'))
                                            <a style="margin-right: 5px;" class="btn btn-outline-secondary btn-sm edit"
                                                href="{{ route('branches.show', $list->id) }}">
                                                <i class="bx bx-zoom-in"></i>
                                            </a>
                                           @endif
                                           @if (auth()->user()->can('Branche_update-branches'))
                                            <a style="margin-right: 5px;" class="btn btn-outline-secondary btn-sm edit"
                                                href="{{ route('branches.edit', $list->id) }}">
                                                <i class="bx bx-pencil"></i>
                                            </a>
                                           @endif
                                           @if (auth()->user()->can('Branche_delete-branches'))
                                                {!! action_table_delete(route('branches.destroy', $list->id), $list->id) !!}
                                           @endif


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ $lists->links('layouts.inc.paginator') }} --}}
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-4">
                            <div class="maintenance-img">
                                <img src="{{ url('assets/images/123.svg') }}" alt=""
                                    class="img-fluid mx-auto d-block">
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-5">@lang("Let's get started")</h4>
                    <p class="text-muted">@lang("Oops, We don't have data").</p>
                </div>
            </div>
        </div>


    @endif

@endsection
@push('scripts')
<script src="{{ asset('assets/js/datatable/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.js"></script>    
<script src="{{ asset('assets/js/datatable/jszip.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.bootstrap.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

    <script>
        $('#filter').on('click' , function (){
            $('#filter-body').slideToggle('slow');
        });

        $('.select2').select2({});


        $(function () {
            $('#branchesTable').DataTable({
            'order': [[1, 'desc']],
                    responsive: true,
                    "dom": 'lBfrtip',
                    "buttons": [
                            'copy', 'csv', 'excel', 'pdf', 'print',
                    ]
            });
        });
    </script>
@endpush
