@extends('layouts.home')
@section('content')
    <div class="card">
        <div class="card-title">
            <h4>{{trans('message.edit_user')}} </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="basic-form p-10">
                        @include('partials.errors')
                        @include('partials.success')

                        <form method="post" action="{{route('admin.users.update' , [$user->id])}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="userFullName">{{trans('message.name')}}</label>
                                <input id="userFullName" name="userFullName" type="text"
                                       class="form-control input-default hasPersianPlaceHolder"
                                       value="{{$user->name}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="userEmail">{{trans('message.email')}}</label>
                                <input id="userEmail" name="userEmail" type="email"
                                       class="form-control input-default hasPersianPlaceHolder"
                                       value="{{$user -> email}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="password">{{trans('message.password')}}</label>
                                <input id="password" name="password" type="password"
                                       class="form-control input-default hasPersianPlaceHolder">
                            </div>
                            <div class="form-group">
                                <label for="userRole">{{trans('message.role')}}</label>
                                <select id="userRole"  name="userRole" class="form-control persianText">
                                    @foreach($userRoles as $roleID => $roleTitle)
                                        <option value="{{$roleID}}"{{$user->role == $roleID ? 'selected' : ''}}>{{$roleTitle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-t-20">
                                <button type="submit" class="btn btn-primary m-b-10 m-l-5">{{trans('message.add')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
