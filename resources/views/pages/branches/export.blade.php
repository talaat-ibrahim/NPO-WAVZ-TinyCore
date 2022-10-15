<table class="table project-list-table table-nowrap align-middle table-borderless">
    <thead>
        <tr>








            modeling
            ups_installation_id
            network_id
            line_type_id
            line_capacity_id
            entuity_status_id
            added_on_entuity
            lan_ip
            additional_ips
            ip_notes
            notes
            wan_ip
            tunnel_ip
            router_serial
            router_model_id
            entuity_systemname
            switch_serial
            switch_model_id
            switch_ip
            switch_nots
            atm_exists
            atm_ip
            installation_and_commissioning


            <th scope="col">@lang('name')</th>
            <th scope="col">@lang('area')</th>
            <th scope="col">@lang('sector')</th>
            <th scope="col">@lang('financial_code')</th>
            <th scope="col">@lang('post_number')</th>
            <th scope="col">@lang('technical_support_phone')</th>
            <th scope="col">@lang('technical_support_name')</th>
            <th scope="col">@lang('branch_manager_phone')</th>
            <th scope="col">@lang('branch_manager_name')</th>
            <th scope="col">@lang('telephone')</th>
            <th scope="col">@lang('viop_no')</th>
            <th scope="col">@lang('branch_level_id')</th>
            <th scope="col">@lang('working_days')</th>
            <th scope="col">@lang('start_time')</th>
            <th scope="col">@lang('end_time')</th>
            <th scope="col">@lang('address')</th>
            <th scope="col">@lang('main_order_id')</th>
            <th scope="col">@lang('backup_order_id')</th>
            <th scope="col">@lang('project_id')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lists as $list)
            <tr>
                <td>
                    {{ $list->name ?? '' }}
                </td>

                <td>
                    {{ optional($list->project)->name }}
                </td>
                <td>
                    {{ $list->sector }}
                </td>
                <td>
                    {{ $list->area }}
                </td>

                <td>
                    {{ optional($list->upsInstallation)->name }}
                </td>
                <td>
                    {{ optional($list->lineType)->name }}
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
            </tr>
        @endforeach
    </tbody>
</table>
