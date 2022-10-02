@extends('layouts.master')
@section('PageTitle', $breadcrumb['title'])
@section('PageContent')
    @includeIf('layouts.inc.breadcrumb')



    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('branches.update', $branch->id) }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingNameInput" name="name[en]"
                                        value="{{ old('name[en]', $branch->name['en']) }}"
                                        placeholder="@lang('English Name')" />
                                    <label for="floatingNameInput">@lang('English Name')</label>
                                    @error('name[en]')
                                        <span style="color:red;">
                                            {{ $errors->first('name[en]') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingName2Input" name="name[ar]"
                                        value="{{ old('name[ar]', $branch->name['ar']) }}"
                                        placeholder="@lang('Arbic Name')" />
                                    <label for="floatingName2Input">@lang('Arbic Name')</label>
                                    @error('name[ar]')
                                        <span style="color:red;">
                                            {{ $errors->first('name[ar]') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="main_order_id"
                                        value="{{ old('main_order_id', $branch->main_order_id) }}"
                                        placeholder="@lang('Main order ID')" />
                                    <label>@lang('Main order ID')</label>
                                    @error('main_order_id')
                                        <span style="color:red;">
                                            {{ $errors->first('main_order_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="backup_order_id"
                                        value="{{ old('backup_order_id', $branch->backup_order_id) }}"
                                        placeholder="@lang('Backup order ID')" />
                                    <label>@lang('Backup order ID')</label>
                                    @error('backup_order_id')
                                        <span style="color:red;">
                                            {{ $errors->first('backup_order_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="area"
                                        value="{{ old('area', $branch->area) }}" placeholder="@lang('Area')" />
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
                                    <input type="text" class="form-control" name="sector"
                                        value="{{ old('sector', $branch->sector) }}" placeholder="@lang('Sector')" />
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
                                    <textarea class="form-control" name="address" placeholder="@lang('Address')">{{ old('address', $branch->address) }}</textarea>
                                    <label>@lang('Address')</label>
                                    @error('address')
                                        <span style="color:red;">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ old('phone', $branch->phone) }}" placeholder="@lang('Phone')" />
                                    <label>@lang('Phone')</label>
                                    @error('phone')
                                        <span style="color:red;">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="financial_code"
                                        value="{{ old('financial_code', $branch->financial_code) }}"
                                        placeholder="@lang('Financial code')" />
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
                                    <select class="form-control" name="network_id" placeholder="@lang('Network provider')">
                                        @foreach ($networks as $network)
                                            <option @if (old('network_id', $branch->network_id) == $network->id) selected @endif
                                                value="{{ $network->id }}">{{ $network->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Network provider')</label>
                                    @error('network_id')
                                        <span style="color:red;">
                                            {{ $errors->first('network_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="wan_ip"
                                        value="{{ old('wan_ip', $branch->wan_ip) }}" placeholder="@lang('Wan IP')" />
                                    <label>@lang('Wan IP')</label>
                                    @error('wan_ip')
                                        <span style="color:red;">
                                            {{ $errors->first('wan_ip') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="lan_ip"
                                        value="{{ old('lan_ip', $branch->lan_ip) }}" placeholder="@lang('Lan IP')" />
                                    <label>@lang('Lan IP')</label>
                                    @error('lan_ip')
                                        <span style="color:red;">
                                            {{ $errors->first('lan_ip') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="tunnel_ip"
                                        value="{{ old('tunnel_ip', $branch->tunnel_ip) }}"
                                        placeholder="@lang('Tunnel IP')" />
                                    <label>@lang('Tunnel IP')</label>
                                    @error('tunnel_ip')
                                        <span style="color:red;">
                                            {{ $errors->first('tunnel_ip') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="additional_ips"
                                        value="{{ old('additional_ips', $branch->additional_ips) }}"
                                        placeholder="@lang('Additional IPs (comma separated)')" />
                                    <label>@lang('Additional IPs') <small>@lang('(comma separated)')</small></label>
                                    @error('additional_ips')
                                        <span style="color:red;">
                                            {{ $errors->first('additional_ips') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="project_id" placeholder="@lang('Project')">
                                        @foreach ($projects as $project)
                                            <option @if (old('project_id', $branch->project_id) == $project->id) selected @endif
                                                value="{{ $project->id }}">{{ $project->name }}</option>
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
                                    <input type="text" class="form-control" name="line_capacity"
                                        value="{{ old('line_capacity', $branch->line_capacity) }}"
                                        placeholder="@lang('Line capacity') }}" />
                                    <label>@lang('Line capacity')</label>
                                    @error('line_capacity')
                                        <span style="color:red;">
                                            {{ $errors->first('line_capacity') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="notes" value="{{ old('notes', $branch->notes) }}"
                                        placeholder="@lang('Notes')">{{ old('notes', $branch->notes) }}</textarea>
                                    <label>@lang('Notes')</label>
                                    @error('notes')
                                        <span style="color:red;">
                                            {{ $errors->first('notes') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="post_number"
                                        value="{{ old('post_number', $branch->post_number) }}"
                                        placeholder="@lang('Post number') }}" />
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
                                            <option @if (old('branch_level_id', $branch->branch_level_id) == $level->id) selected @endif
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
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="technical_support_name"
                                        value="{{ old('technical_support_name', $branch->technical_support_name) }}"
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
                                        value="{{ old('technical_support_phone', $branch->technical_support_phone) }}"
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
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="branch_manager_name"
                                        value="{{ old('branch_manager_name', $branch->branch_manager_name) }}"
                                        placeholder="@lang('Branch manager name') }}" />
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
                                        value="{{ old('branch_manager_phone', $branch->branch_manager_phone) }}"
                                        placeholder="@lang('Branch manager phone') }}" />
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
                            <div class="col-md-12">
                                <h4>@lang('Working days')</h4>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-1 mx-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="working_days[]"
                                                value="Sat" @if (is_array($branch->working_days) && in_array('Sat', old('working_days', $branch->working_days))) checked @endif>
                                            Saturday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 mx-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="working_days[]"
                                                value="Sun" @if (is_array($branch->working_days) && in_array('Sun', old('working_days', $branch->working_days))) checked @endif>
                                            Sunday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 mx-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="working_days[]"
                                                value="Mon" @if (is_array($branch->working_days) && in_array('Mon', old('working_days', $branch->working_days))) checked @endif>
                                            Monday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 mx-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="working_days[]"
                                                value="Tue" @if (is_array($branch->working_days) && in_array('Tue', old('working_days', $branch->working_days))) checked @endif>
                                            Tuesday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 mx-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="working_days[]"
                                                value="Wed" @if (is_array($branch->working_days) && in_array('Wed', old('working_days', $branch->working_days))) checked @endif>
                                            Wednesday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 mx-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="working_days[]"
                                                value="Thu" @if (is_array($branch->working_days) && in_array('The', old('working_days', $branch->working_days))) checked @endif>
                                            Thursday
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1 mx-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="working_days[]"
                                                value="Fri" @if (is_array($branch->working_days) && in_array('Fri', old('working_days', $branch->working_days))) checked @endif>
                                            Friday
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" name="start_time"
                                        value="{{ old('start_time', $branch->start_time) }}"
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
                                    <input type="time" class="form-control" name="end_time"
                                        value="{{ old('end_time', $branch->end_time) }}"
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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="ups_installation"
                                        value="{{ old('ups_installation', $branch->ups_installation) }}"
                                        placeholder="@lang('UPS installation') }}" />
                                    <label>@lang('UPS installation')</label>
                                    @error('ups_installation')
                                        <span style="color:red;">
                                            {{ $errors->first('ups_installation') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="modeling"
                                        value="{{ old('modeling', $branch->modeling) }}"
                                        placeholder="@lang('Modeling') }}" />
                                    <label>@lang('Modeling')</label>
                                    @error('modeling')
                                        <span style="color:red;">
                                            {{ $errors->first('modeling') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="line_type_id" placeholder="@lang('Line Type')">
                                        @foreach ($lineTypes as $lineType)
                                            <option @if (old('line_type_id', $branch->line_type_id) == $lineType->id) selected @endif
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
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="router_id" placeholder="@lang('Router')">
                                        @foreach ($routers as $router)
                                            <option @if (old('router_id', $branch->router_id) == $router->id) selected @endif
                                                value="{{ $router->id }}">{{ $router->name }} -- {{ $router->number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label>@lang('Router')</label>
                                    @error('router_id')
                                        <span style="color:red;">
                                            {{ $errors->first('router_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="ip_notes" value="{{ old('ip_notes', $branch->ip_notes) }}"
                                        placeholder="@lang('IP Notes')">{{ old('ip_notes', $branch->ip_notes) }}</textarea>
                                    <label>@lang('IP Notes')</label>
                                    @error('ip_notes')
                                        <span style="color:red;">
                                            {{ $errors->first('ip_notes') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"
                                            name="installation_and_commissioning" value="1"
                                            @if (old('installation_and_commissioning', $branch->installation_and_commissioning)) checked @endif>
                                        @lang('Operation and operation position of the project')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="postal_user_id"
                                        value="{{ old('postal_user_id', $branch->postal_user_id) }}"
                                        placeholder="@lang('Postal user ID') }}" />
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
                                        value="{{ old('counter_user_id', $branch->counter_user_id) }}"
                                        placeholder="@lang('counter user ID') }}" />
                                    <label>@lang('Counter user ID')</label>
                                    @error('Counter_user_id')
                                        <span style="color:red;">
                                            {{ $errors->first('counter_user_id') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="viop_no"
                                        value="{{ old('viop_no', $branch->viop_no) }}"
                                        placeholder="@lang('VIOP no.') }}" />
                                    <label>@lang('VIOP no.')</label>
                                    @error('viop_no')
                                        <span style="color:red;">
                                            {{ $errors->first('viop_no') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="atm_ip"
                                        value="{{ old('atm_ip', $branch->atm_ip) }}"
                                        placeholder="@lang('ATM IP') }}" />
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
                                        <input class="form-check-input" type="checkbox" name="atm_exists" value="1"
                                            @if (old('atm_exists', $branch->atm_exists)) checked @endif>
                                        ATM exists
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row" style=" margin-top: 20px; ">
                            <div style="text-align: right">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary w-md">@lang('Submit')</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>


@endsection
