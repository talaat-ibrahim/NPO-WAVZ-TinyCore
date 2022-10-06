@extends('layouts.master')
@section('PageTitle',$breadcrumb['title'])
@section('PageContent')
@includeIf('layouts.inc.breadcrumb')



<div class="row">
    <div class="col-8 mx-auto mt-3">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingNameInput" value="{{ old('name',$user->name) }}" name="name" placeholder="@lang('Name')" />
                        <label for="floatingNameInput">@lang('Name')</label>
                        @error('name')
                            <span style="color:red;">
                                {{ $errors->first('name') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmailInput" name="email" placeholder="@lang('Email Address')" value="{{ old('email',$user->email) }}">
                        <label for="floatingEmailInput">@lang('Email Address')</label>
                        @error('email')
                            <span style="color:red;">
                                {{ $errors->first('email') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPasswordInput" name="password" placeholder="@lang('Password')" />
                        <label for="floatingPasswordInput">@lang('Password')</label>
                        @error('password')
                            <span style="color:red;">
                                {{ $errors->first('password') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="floatingBirthdaysInput" name="birthdays" placeholder="@lang('Birthdays')"  value="{{ old('birthdays',$user->birthdays) }}">
                        <label for="floatingBirthdaysInput">@lang('Birthdays')</label>
                        @error('birthdays')
                            <span style="color:red;">
                                {{ $errors->first('birthdays') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingnationality_idInput" name="nationality_id" placeholder="@lang('nationality_id')"  value="{{ old('nationality_id',$user->nationality_id) }}">
                        <label for="floatingnationality_idInput">@lang('nationality_id')</label>
                        @error('nationality_id')
                            <span style="color:red;">
                                {{ $errors->first('nationality_id') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingaddressInput" name="address" placeholder="@lang('address')"  value="{{ old('address',$user->address) }}">
                        <label for="floatingaddressInput">@lang('address')</label>
                        @error('address')
                            <span style="color:red;">
                                {{ $errors->first('address') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingtel2Input" name="tel1" placeholder="@lang('tel2')"  value="{{ old('tel2',$user->tel1) }}">
                        <label for="floatingtel1Input">@lang('tel1')</label>
                        @error('tel1')
                            <span style="color:red;">
                                {{ $errors->first('tel1') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingtel2Input" name="tel2" placeholder="@lang('tel2')"  value="{{ old('tel2',$user->tel2) }}">
                        <label for="floatingtel2Input">@lang('tel2')</label>
                        @error('tel2')
                            <span style="color:red;">
                                {{ $errors->first('tel2') }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" name="role_id" placeholder="@lang('Role')" required>
                            <option selected disabled hidden value="">@lang('Select')</option>
                            @foreach ($roles as $role)
                                <option {{ $roleId == $role->id ?'selected':''}}
                                    value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <label>@lang('Role')</label>
                       
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
