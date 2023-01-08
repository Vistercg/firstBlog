@extends('layouts.layout')

@section('title', $post->title . 'FirstBlog - Freelance and life :: Home')

@section('content')

    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">На главную</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('categories.single', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                </li>
                <li class="breadcrumb-item active">{{ mb_substr($post->title, 0, 25) }}...</li>
            </ol>

            <span class="color-yellow"><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}"
                                          title="">{{ $post->category->title }}</a></span>

            <h3>{{ $post->title }}</h3>

            <div class="blog-meta big-meta">
                <small>{{ $post->getPostDate() }}</small>
                <small><a class="fa fa-eye"></i>{{ $post->views }}</a></small>
            </div><!-- end meta -->

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="https://vk.com/share.php?url={{ 'posts.single' . $post->slug }}"
                           class="btn btn-social-icon btn-vk"><i class="fa fa-vk"></i> <span
                                class="down-mobile">Поделиться в Вконтакте</span></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        <div class="single-post-media">
            <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
        </div><!-- end media -->

        <div class="blog-content">
            {!! $post->content !!}
        </div><!-- end content -->

        <div class="blog-title-area">
            @if($post->tags->count())
                <div class="tag-cloud-single">
                    <span>Тэги</span>
                    @foreach($post->tags as $tag)
                        <small><a href="{{ route('tags.single', ['slug' => $tag->slug]) }}"
                                  title="">{{ $tag->title }}</a></small>
                    @endforeach
                </div><!-- end meta -->
            @endif

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="https://vk.com/share.php?url={{ 'posts.single' . $post->slug }}"
                           class="btn btn-social-icon btn-vk"><i class="fa fa-vk"></i> <span
                                class="down-mobile">Поделиться в Вконтакте</span></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">Вам так же может понравиться</h4>
            <div class="row">
                @foreach($popular_posts as $postPopular)
                    <div class="col-lg-6">
                        <div class="blog-box">
                            <div class="post-media">
                                <a href="{{ route('posts.single', ['slug' => $postPopular->slug]) }}" title="">
                                    <img src="{{ $postPopular->getImage() }}" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span class=""></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="{{ route('posts.single', ['slug' => $postPopular->slug]) }}" title="">{{ $postPopular->title }}</a></h4>
                                <small><a href="{{ route('posts.single', ['slug' => $postPopular->slug]) }}" title="">{{ $postPopular->category->title }}</a></small>
                                <small><a href="" title="">{{ $post->getPostDate() }}</small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                    </div><!-- end col -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end custom-box -->

        <hr class="invis1">
    </div><!-- end page-wrapper -->

@endsection

