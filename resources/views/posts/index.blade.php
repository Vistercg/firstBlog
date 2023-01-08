@extends('layouts.layout')

@section('title', 'FirstBlog - Freelance and life :: Home')

@section('header')

    <section id="cta" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 align-self-center">
                    <h2>Блог начинающего фрилансера</h2>
                    <p class="lead"> Вы пришли на блог фрилансера, а если быть точным, то на на сайт, посвященный
                        фрилансу и другим способам заработка в Интернете.</p>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="newsletter-widget text-center align-self-center">
                        <h3>Подпишись сегодня!</h3>
                        <p>Подпишись на еженедельную рассылку новостей и получай обновления по электронной почте.</p>
                        <form class="form-inline" method="post" action="{{ route('home') }}">
                            <input type="email" name="email" placeholder="Введи свой email.." required
                                   class="form-control"/>
                            <input type="submit" value="Подписаться" class="btn btn-default btn-block"/>
                        </form>
                    </div><!-- end newsletter -->
                </div>
            </div>
        </div>
    </section>

@endsection

@section('content')

    <div class="page-wrapper">
        <div class="blog-custom-build">
            @foreach($posts as $post)
                <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">
                            <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                            <!-- end hover -->
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="https://vk.com/share.php?url={{ 'http://first.blog/article/' . $post->slug }}" class="btn btn-social-icon btn-vk"><i class="fa fa-vk"></i> <span
                                            class="down-mobile">Поделиться в Вконтакте</span></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                        <h4><a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">{{ $post->title }}</a></h4>
                        <p>{!! $post->description !!}</p>
                        <small><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}" title="">{{ $post->category->title }}</a></small>
                        <small><a>{{ $post->getPostDate() }}</a></small>
                        <small><a><i class="fa fa-eye"></i>{{ $post->views }}</a></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->

                <hr class="invis">
            @endforeach

        </div>
    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                {{ $posts->links() }}
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->

@endsection
