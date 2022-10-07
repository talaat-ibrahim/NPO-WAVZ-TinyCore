<table class="table project-list-table table-nowrap align-middle table-borderless">
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
