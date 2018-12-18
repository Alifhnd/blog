@extends('layouts.home')
@section('content')
    <div class="card">
        <div class="card-title">
            <h4>{{trans('message.user_list')}} </h4>
        </div>
        <div class="card-body">
            @include('partials.success')
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{trans('message.name')}}</th>
                        <th>{{trans('message.email')}}</th>
                        <th>{{trans('message.add_created_at')}}</th>
                        <th>{{trans('message.status')}}</th>
                        <th>{{trans('message.operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <span class="badge badge-{{$user->status == 0 ? 'success' : 'danger'}}">
                                {{$user->status == 0 ?trans('message.active'): trans('message.inactive')}}
                            </span>
                        </td>
                        <td>
                            <a href="{{route('admin.users.delete' , [$user->id])}}">{{trans('message.delete')}}</a>
                            <a href="{{route('admin.users.edit', [$user->id])}}">{{trans('message.edit')}}</a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
