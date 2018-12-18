@extends('layouts.home')
@section('content')
    <div class="card">
        <div class="card-title">
            <h4>{{trans('post::message.posts_list')}} </h4>
        </div>
        <div class="card-body">
            @include('partials.success')
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان</th>
                        <th>{{trans('post::message.author')}}</th>
                        <th>{{trans('post::message.add_created_at')}}</th>
                        <th>{{trans('post::message.status')}}</th>
                        <th>{{trans('post::message.operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach($posts as $post)
                           <tr>
                               <th scope="row">{{$post->post_id}}</th>
                               <td>{{$post->post_title}}</td>
                               <td>{{$post->post_author}}</td>
                               <td>{{$post->created_at}}</td>
                               <td>
            <span class="badge badge-{{$post->post_status == 1 ? 'success' : 'danger'}}">
                {{$post->post_status == 1 ?trans('post::message.active'): trans('post::message.inactive')}}
            </span>
                               </td>
                               <td>
                                   <a href="{{route('posts.delete' , [$post->post_id])}}">{{trans('post::message.delete')}}</a>
                                   <a href="{{route('posts.edit', [$post->post_id])}}">{{trans('post::message.edit')}}</a>
                               </td>
                           </tr>
                           @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
