@extends('layouts.master')
@push('styles')
    <style>
        .hide{
            display: none
        }
    </style>
@endpush
@section('PageTitle', $breadcrumb['title'])
@section('PageContent')
    @includeIf('layouts.inc.breadcrumb')

    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('branches.store') }}" method="post" enctype="multipart/form-data">



                        <div class="row">
                            <h5><b>@lang('Branch Info'):</b></h5>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingName2Input" name="name"
                                        value="{{ old('name') }}" placeholder="@lang(' Name')" />
                                    <label for="floatingName2Input">@lang(' Name')</label>
                                    @error('name')
                                        <span style="color:red;">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="main_order_id"
                                        value="{{ old('main_order_id') }}" placeholder="@lang('Main order ID')" />
                                    <label>@lang('Main order ID')</label>
                                    @error('main_order_id')
                                        <span style="color:red;">
                                            {{ $errors->first('main_order_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="backup_order_id"
                                        value="{{ old('backup_order_id') }}" placeholder="@lang('Backup order ID')" />
                                    <label>@lang('Backup order ID')</label>
                                    @error('backup_order_id')
                                        <span style="color:red;">
                                            {{ $errors->first('backup_order_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="modeling" value="{{ old('modeling') }}"
                                        placeholder="@lang('modeling')" />
                                    <label>@lang('modeling')</label>
                                    @error('modeling')
                                        <span style="color:red;">
                                            {{ $errors->first('modeling') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="area" value="{{ old('area') }}"
                                        placeholder="@lang('Area')" />
                                    <label>@lang('Area')</label>
                                    @error('area')
                                        <span style="color:red;">
                                            {{ $errors->first('area') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="sector" value="{{ old('sector') }}"
                                        placeholder="@lang('Sector')" />
                                    <label>@lang('Sector')</label>
                                    @error('sector')
                                        <span style="color:red;">
                                            {{ $errors->first('sector') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="address" value="{{ old('address') }}" placeholder="@lang('Address')"></textarea>
                                    <label>@lang('Address')</label>
                                    @error('address')
                                        <span style="color:red;">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4" style="display: flex">
                                <div class="form-floating mb-3" style="width: 30%">
                                    <select class="form-control" name="government_id" required placeholder="@lang('Government ') ">
                                        @foreach ($governments as $goverment)
                                            <option selected="{{ old('government_id') == $goverment->id }}"
                                                value="{{ $goverment->id }}">{{ $goverment->name }}
                                                --{{ $goverment->code }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label>@lang('Government')</label>
                                    @error('government_id')
                                        <span style="color:red;">
                                            {{ $errors->first('government_id') }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3" style="width: 70%">

                                    <input type="number" required class="form-control" name="telephone"
                                        value="{{ old('telephone') }}" placeholder="@lang('telephone')"aria-describedby="basic-addon1"aria-label="telephone" />
                                    <label>@lang('telephone')</label>
                                    @error('telephone')
                                        <span style="color:red;">
                                            {{ $errors->first('telephone') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="financial_code"
                                        value="{{ old('financial_code') }}" placeholder="@lang('Financial code')" />
                                    <label>@lang('Financial code')</label>
                                    @error('financial_code')
                                        <span style="color:red;">
                                            {{ $errors->first('financial_code') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="network_id" placeholder="@lang('ISP Id')">
                                        @foreach ($networks as $network)
                                            <option selected="{{ old('network_id') == $network->id }}"
                                                value="{{ $network->id }}">{{ $network->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>@lang('ISP Id')</label>
                                    @error('network_id')
                                        <span style="color:red;">
                                            {{ $errors->first('network_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="project_id" placeholder="@lang('Project')">
                                        @foreach ($projects as $project)
                                            <option selected="{{ old('project_id') == $project->id }}"
                                                value="{{$project->id}}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Project')</label>
                                    @error('project_id')
                                        <span style="color:red;">
                                            {{ $errors->first('project_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="line_capacity_id"
                                        placeholder="@lang('Line capacity')">
                                        @foreach ($lineCapacities as $line)
                                            <option selected="{{ old('line_capacity_id') == $line->id }}"
                                                value="{{ $line->id }}">{{ $line->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label>@lang('Line capacity')</label>
                                    @error('line_capacity')
                                        <span style="color:red;">
                                            {{ $errors->first('line_capacity') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="post_number"
                                        value="{{ old('post_number') }}" placeholder="@lang('Post number') }}" />
                                    <label>@lang('Post number')</label>
                                    @error('post_number')
                                        <span style="color:red;">
                                            {{ $errors->first('post_number') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="branch_level_id" placeholder="@lang('Level')">
                                        @foreach ($levels as $level)
                                            <option selected="{{ old('branch_level_id') == $level->id }}"
                                                value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Level')</label>
                                    @error('branch_level_id')
                                        <span style="color:red;">
                                            {{ $errors->first('branch_level_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="notes" value="{{ old('notes') }}" placeholder="@lang('Notes')"></textarea>
                                    <label>@lang('Notes')</label>
                                    @error('notes')
                                        <span style="color:red;">
                                            {{ $errors->first('notes') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="viop_no"
                                        value="{{ old('viop_no') }}" placeholder="@lang('VIOP no.') }}" />
                                    <label>@lang('VIOP no.')</label>
                                    @error('viop_no')
                                        <span style="color:red;">
                                            {{ $errors->first('viop_no') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="line_type_id" placeholder="@lang('Line Type')">
                                        @foreach ($lineTypes as $lineType)
                                            <option selected="{{ old('line_type_id') == $lineType->id }}"
                                                value="{{ $lineType->id }}">{{ $lineType->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Line Type')</label>
                                    @error('line_type_id')
                                        <span style="color:red;">
                                            {{ $errors->first('line_type_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="router_model_id" placeholder="@lang('Router')">
                                        @foreach ($routers as $router)
                                            <option selected="{{ old('router_model_id') == $router->id }}"
                                                value="{{ $router->id }}">{{ $router->name }} -- {{ $router->number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Router')</label>
                                    @error('router_model_id')
                                        <span style="color:red;">
                                            {{ $errors->first('router_model_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="router_serial"
                                        value="{{ old('router_serial') }}" placeholder="@lang('Router Serial') }}" />
                                    <label>@lang('Router Serial')</label>
                                    @error('router_serial')
                                        <span style="color:red;">
                                            {{ $errors->first('router_serial') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="entuity_systemname"
                                        value="{{ old('entuity_systemname') }}" placeholder="@lang('Entuity Systemname') }}" />
                                    <label>@lang('Entuity Systemname')</label>
                                    @error('entuity_systemname')
                                        <span style="color:red;">
                                            {{ $errors->first('entuity_systemname') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="ups_installation_id"
                                        placeholder="@lang('UPS installation') ">
                                        @foreach ($upsInstallations as $ups)
                                            <option selected="{{ old('ups_installation_id') == $ups->id }}"
                                                value="{{ $ups->id }}">{{ $ups->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label>@lang('UPS installation')</label>
                                    @error('ups_installation_id')
                                        <span style="color:red;">
                                            {{ $errors->first('ups_installation') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="entuity_status_id"
                                        placeholder="@lang('Entutiy Status ') ">
                                        @foreach ($entuityStaus as $statu)
                                            <option selected="{{ old('entuity_status_id') == $statu->id }}"
                                                value="{{ $statu->id }}">{{ $statu->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label>@lang('Entutiy Status')</label>
                                    @error('entuity_status_id')
                                        <span style="color:red;">
                                            {{ $errors->first('entuity_status_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="switch_model_id"
                                        placeholder="@lang('Switch Model ') ">
                                        @foreach ($switchModels as $model)
                                            <option selected="{{ old('switch_model_id') == $model->id }}"
                                                value="{{ $model->id }}">{{ $model->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label>@lang('Switch Model')</label>
                                    @error('switch_model_id')
                                        <span style="color:red;">
                                            {{ $errors->first('switch_model_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="switch_serial"
                                        value="{{ old('switch_serial') }}" placeholder="@lang('Switch Serial') }}" />
                                    <label>@lang('Switch Serial')</label>
                                    @error('switch_serial')
                                        <span style="color:red;">
                                            {{ $errors->first('switch_serial') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="switch_nots" value="{{ old('switch_nots') }}" placeholder="@lang('Switch Notes')"></textarea>
                                    <label>@lang('Switch Nots')</label>
                                    @error('switch_nots')
                                        <span style="color:red;">
                                            {{ $errors->first('switch_nots') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <hr>

                        <div class="row">
                            <h5><b>@lang('Branch Ips'):</b></h5>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="wan_ip"
                                        value="{{ old('wan_ip') }}" placeholder="@lang('Wan IP')" />
                                    <label>@lang('Wan IP')</label>
                                    @error('wan_ip')
                                        <span style="color:red;">
                                            {{ $errors->first('wan_ip') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="lan_ip"
                                        value="{{ old('lan_ip') }}" placeholder="@lang('Lan IP')" />
                                    <label>@lang('Lan IP')</label>
                                    @error('lan_ip')
                                        <span style="color:red;">
                                            {{ $errors->first('lan_ip') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="tunnel_ip"
                                        value="{{ old('tunnel_ip') }}" placeholder="@lang('Tunnel IP')" />
                                    <label>@lang('Tunnel IP')</label>
                                    @error('tunnel_ip')
                                        <span style="color:red;">
                                            {{ $errors->first('tunnel_ip') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="additional_ips"
                                        value="{{ old('additional_ips') }}" placeholder="@lang('Additional IPs (comma separated)')" />
                                    <label>@lang('Additional IPs') <small>@lang('(comma separated)')</small></label>
                                    @error('additional_ips')
                                        <span style="color:red;">
                                            {{ $errors->first('additional_ips') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="ip_notes" value="{{ old('ip_notes') }}" placeholder="@lang('IP Notes')"></textarea>
                                    <label>@lang('IP Notes')</label>
                                    @error('ip_notes')
                                        <span style="color:red;">
                                            {{ $errors->first('ip_notes') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-floating mb-3 hide " id="atm-ip">
                                    <input type="text" class="form-control" name="atm_ip"
                                        value="{{ old('atm_ip') }}" placeholder="@lang('ATM IP') }}" />
                                    <label>@lang('ATM IP')</label>
                                    @error('atm_ip')
                                        <span style="color:red;">
                                            {{ $errors->first('atm_ip') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check mt-3">
                                    <label class="form-check-label">
                                        <input class="form-check-input" id="atm-exists" type="checkbox" name="atm_exists"
                                            value="1">
                                        ATM exists
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <h5><b>@lang('Technical Info '):</b></h5>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="technical_support_name"
                                        value="{{ old('technical_support_name') }}"
                                        placeholder="@lang('Technical support name') }}" />
                                    <label>@lang('Technical support name')</label>
                                    @error('technical_support_name')
                                        <span style="color:red;">
                                            {{ $errors->first('technical_support_name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="technical_support_phone"
                                        value="{{ old('technical_support_phone') }}"
                                        placeholder="@lang('Technical support phone') }}" />
                                    <label>@lang('Technical support phone')</label>
                                    @error('technical_support_phone')
                                        <span style="color:red;">
                                            {{ $errors->first('technical_support_phone') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <h5><b>@lang('Manager Info'):</b></h5>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="branch_manager_name"
                                        value="{{ old('branch_manager_name') }}" placeholder="@lang('Branch manager name') }}" />
                                    <label>@lang('Branch manager name')</label>
                                    @error('branch_manager_name')
                                        <span style="color:red;">
                                            {{ $errors->first('branch_manager_name') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="branch_manager_phone"
                                        value="{{ old('branch_manager_phone') }}" placeholder="@lang('Branch manager phone') }}" />
                                    <label>@lang('Branch manager phone')</label>
                                    @error('branch_manager_phone')
                                        <span style="color:red;">
                                            {{ $errors->first('branch_manager_phone') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <h5><b>@lang('Branch Schedular'):</b></h5>
                            {{-- <div class="col-md-12">
                                <h4>@lang('Working days')</h4>
                            </div> --}}

                            <div class="row mt-4">
                                <table class="mx-2">
                                    <thead>
                                        <tr>
                                           @foreach ($days as $key => $value)
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input onclick="showInput(this)" data-day="{{ $key }}" class="form-check-input" type="checkbox"
                                                            name="working_days[{{ $key }}]" value="{{ $key }}">
                                                        {{ $value }}
                                                    </label>
                                                </div>
                                            </td>
                                           @endforeach


                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div class="row pt-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input  id="start-time" type="time" class="form-control"
                                                name="start_time" value="{{ old('start_time') }}"
                                                placeholder="@lang('Start time') }}" />
                                            <label>@lang('Start time')</label>
                                            @error('start_time')
                                                <span style="color:red;">
                                                    {{ $errors->first('start_time') }}
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input  id="end-time" type="time" class="form-control"
                                                name="end_time" value="{{ old('end_time') }}"
                                                placeholder="@lang('End time') }}" />
                                            <label>@lang('End time')</label>
                                            @error('end_time')
                                                <span style="color:red;">
                                                    {{ $errors->first('end_time') }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>






                        {{-- <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"
                                            name="installation_and_commissioning" value="1">
                                        @lang('Operation and operation position of the project')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr> --}}

                        {{-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="postal_user_id"
                                        value="{{ old('postal_user_id') }}" placeholder="@lang('Postal user ID') }}" />
                                    <label>@lang('Postal user ID')</label>
                                    @error('postal_user_id')
                                        <span style="color:red;">
                                            {{ $errors->first('postal_user_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="counter_user_id"
                                        value="{{ old('counter_user_id') }}" placeholder="@lang('counter user ID') }}" />
                                    <label>@lang('Counter user ID')</label>
                                    @error('Counter_user_id')
                                        <span style="color:red;">
                                            {{ $errors->first('counter_user_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div> --}}

                        <div class="row" style=" margin-top: 20px; ">
                            <div style="text-align: right">
                                @csrf
                                <button type="submit" class="btn btn-primary w-md">@lang('Submit')</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>


@endsection
@push('scripts')
    <script>

        $(function () {
        $("#atm-exists").click(function () {
            if ($(this).is(":checked")) {
                $("#atm-ip").removeClass('hide');
            } else {
                $("#atm-ip").addClass('hide');
            }
        });
    })

    function showInput(element){
        var day = $(element).data('day');
        if ($(element).is(":checked")) {
                $("#start-time-"+day).removeAttr('disabled');
                $("#end-time-"+day).removeAttr('disabled');
            } else {
                $("#start-time-"+day).attr('disabled', 'true');
                $("#end-time-"+day).attr('disabled','true');
            }
    }
    </script>

@endpush
