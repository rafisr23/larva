@extends('frontend.layouts.app')

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: {{ isset($headerImage) ? 'url(../storage/' . $headerImage[0]->file_path . ')' : 'url(../images/backgrounds/page-header-bg.jpg)' }}">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('user-index') }}">Beranda</a></li>
                    <li>Blog</li>
                </ul>
                <h2>Blog Posts</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{ isset($blog->header_image) ? asset('storage/' . $blog->header_image) : asset('images/blog/blog-details-img-1.jpg') }}" alt="{{ $blog->title }}">
                            <div class="blog-details__date-box">
                                <p>{{ \Carbon\Carbon::parse($blog->published_at)->locale('id')->isoFormat('D MMMM Y') }}</p>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                <li><a href="{{ route('blog.index', ['user'=> $blog->user->username]) }}"><i class="far fa-user-circle"></i> By {{ $blog->user->name }}</a></li>
                                <li><span>/</span></li>
                                <li><a href="{{ route('blog.index', ['category'=> $blog->category->slug]) }}"><i class="far fa-folder"></i> {{ $blog->category->name }}</a>
                                </li>
                                <li><span>/</span></li>
                                <li><a href="#"><i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($blog->published_at)->locale('id')->isoFormat('D MMMM Y') }}</a>
                                </li>
                            </ul>
                            <h3 class="blog-details__title">{{ $blog->title }}</h3>
                            <p class="blog-details__text-1">{!! $blog->content !!}</p>
                        </div>
                        <div class="blog-details__bottom">
                            <p class="blog-details__tags">
                                <span>Tags</span>
                                @foreach ($blog->tags as $tag)
                                    <a href="#">{{ $tag->name }}</a>
                                    
                                @endforeach
                            </p>
                            <div class="blog-details__social-list">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="{{ $contact->instagram }}"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        {{-- <div class="blgo-details__pagenation-box">
                            <ul class="list-unstyled blog-details__pagenation">
                                <li>How much A website  <br> cost to build</li>
                                <li>We Design the Latest <br> trendy Designs</li>
                            </ul>
                        </div> --}}
                        {{-- <div class="comment-one">
                            <h3 class="comment-one__title">2 Comments</h3>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="{{ asset('images/blog/comment-1-1.jpg') }}" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Kevin Martin</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting unchanged. It was popularised in the sheets containing lorem ipsum is simply free text.</p>
                                    <a href="blog-details.html" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="{{ asset('images/blog/comment-1-1.jpg') }}" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Kevin albert</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting unchanged. It was popularised in the sheets containing lorem ipsum is simply free text.</p>
                                    <a href="blog-details.html" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h3 class="comment-form__title">Leave a Comment</h3>
                            <form action="" class="comment-one__form contact-form-validated" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Your name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email address" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <textarea name="message" placeholder="Write message"></textarea>
                                        </div>
                                        <button type="submit" class="thm-btn comment-form__btn">Submit a Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Search here">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Blog Terbaru</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($latestBlogs as $latestBlog)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ isset($latestBlog->thumbnail_image) ? asset('storage/' . $latestBlog->thumbnail_image) : asset('images/blog/lp-1-1.jpg') }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="blog-details.html" class="sidebar__post-content-meta"><i class="far fa-folder"></i> {{ $latestBlog->category->name }}</a>
                                                <a href="{{ route('blog.show', $latestBlog->slug) }}">{{ $latestBlog->title }}</a>
                                            </h3>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Kategori</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('blog.index', ['category' => $category->slug]) }}">{{ $category->name }} <span class="icon-arrow-right"></span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__tags">
                            <h3 class="sidebar__title">Tags</h3>
                            <div class="sidebar__tags-list">
                                @foreach ($tags as $tag)
                                    <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="sidebar__single sidebar__comments">
                            <h3 class="sidebar__title">comments</h3>
                            <ul class="sidebar__comments-list list-unstyled">
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A wordpress commenter on <br> launch new mobile app</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>John Doe on Template:</p>
                                        <h5>Comments</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A wordpress commenter on <br> launch new mobile app</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>John Doe on Template:</p>
                                        <h5>Comments</h5>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection