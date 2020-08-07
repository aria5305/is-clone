@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-3 p-md-5">
            <img src="https://i.redd.it/h5ey1njag4w41.jpg"  height="100px" class="rounded-circle">
        </div>
        

        <div class="col-xs-12 col-md-9 pt-md-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user -> username}}</h1>
                <a href="/insta/public/p/create" class="">Add new post</a>
            </div>
            <a href="/insta/public/profile/{{$user->id}}/edit" class="">Edit Profile</a>
            <div class="d-flex">
                <div class="pr-5"><strong>{{$user ->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>2.25k</strong> Followers</div>
                <div class="pr-5"><strong>1k</strong>  Following</div>
            </div>

            <div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div> 
                <div>{{$user->profile -> description}}</div> 
                <div><a href="#">{{$user->profile -> url}}</a></div>

            </div>
        </div>
    </div>

    <div class="row pt-5">
    @foreach($user-> posts as $post)
        <div class="col-4 pb-4">
            <a href="/insta/public/p/{{$post ->id}}">
                <img class="w-100" src="{{ asset('/storage/' . $post ->Image)}}">
            </a>
        </div>
    @endforeach 
    
     

         <!-- <div class="col-4">
            <img class="w-100"src="https://img.webmd.com/dtmcms/live/webmd/consumer_assets/site_images/article_thumbnails/other/cat_relaxing_on_patio_other/1800x1200_cat_relaxing_on_patio_other.jpg">
        </div>

        <div class="col-4">
            <img class="w-100"src="https://img.webmd.com/dtmcms/live/webmd/consumer_assets/site_images/article_thumbnails/other/cat_relaxing_on_patio_other/1800x1200_cat_relaxing_on_patio_other.jpg">
        </div>  -->
    </div>
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
