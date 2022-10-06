@extends('layouts.master')
@section('PageTitle', $breadcrumb['title'])
@section('PageContent')
    @includeIf('layouts.inc.breadcrumb')



    <div class="row">
        <div class="col-8 mx-auto mt-3">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('roles.store')}}" method="post" enctype="multipart/form-data">
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingNameInput" name="name"
                                placeholder="@lang('Name')" />
                            <label for="floatingNameInput">@lang('Name')</label>
                            @error('name')
                                <span style="color:red;">
                                    {{ $errors->first('name') }}
                                </span>
                            @enderror
                        </div>

                        <div class="">
                            @foreach ($permissions as $category => $listPermissions)
                            <ul class="w3-ul">
                                <li>
                                    <b class="w3-large w3-text-deep-purple" >
                                        <input type="checkbox"
                                        onclick="$(this).parent().parent().find('.sub-list .checkbox').click()"
                                        class="w3-check selectedBoxPerm checkCategory" id="CheckAll">
                                        {{  $category }}
                                    </b>
                                    <br>
                                    <ul class="w3-ul sub-list">
                                        @foreach($listPermissions as $permission)
                                        <li style="border-bottom: 0px" >
                                            <label class=""></label>
                                                @php $old = old('permissions') @endphp
                                                <input type="checkbox" class="w3-check selectedBoxPerm checkbox" name="permissions[]" value="{{ $permission->id }}" {{ isset($old) ? (in_array($permission->id , old('permissions')) ? 'checked' : '') : '' }} {{ isset($rolePermissions) ? (in_array($permission->id , $rolePermissions) ? 'checked' : '') : '' }}>
                                                <span></span>
                                                {{ app()->getLocale() == 'ar' ? $permission->description : $permission->display_name }}
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <br>
                            </ul>
                            @endforeach
                        </div>
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
