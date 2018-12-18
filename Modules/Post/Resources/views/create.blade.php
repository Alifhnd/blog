@extends('layouts.home')
@section('content')
    <div class="card">
        <div class="card-title">
            <h4>ایجاد مطلب جدید </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="basic-form p-10">
                        @include('partials.errors')
                        @include('partials.success')

                        <form method="post" action="{{route('posts.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="postTitle">{{trans('post::message.title')}}</label>
                                <input id="postTitle" name="postTitle" type="text"
                                       class="form-control input-default hasPersianPlaceHolder"
                                       value="{{old('postTitle')}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="postContent">{{trans('post::message.content')}}</label>
                                <textarea  id="postContent" name="postContent"
                                       class="form-control input-default "

                                >{{old('postContent')}}</textarea>
                            </div>
                             <div class="form-group">
                                 <label for="postTags">{{trans('post::message.tags')}}</label>
                                 <select multiple  style="width: 300px" name="postTags[]" id="postTags">
                                     @foreach($allTags as $tag)
                                         <option value="{{$tag->id}}">{{$tag->title}}</option>
                                         @endforeach

                                 </select>
                             </div>

                            <div class="form-group">
                                <label for="postStatus">{{trans('post::message.status')}}</label>
                                <select name="postStatus" id="postStatus" class="form-control ">
                                   @foreach($postStatuses as $postStatus => $postStatusTitle)
                                        <option value="{{$postStatus}}">{{$postStatusTitle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-t-20">
                                <button type="submit" class="btn btn-primary m-b-10 m-l-5">{{trans('post::message.add')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
