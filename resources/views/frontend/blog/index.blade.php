@extends('frontend.layouts.app')

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: {{ isset($headerImage) ? 'url(storage/' . $headerImage[0]->file_path . ')' : 'url(images/backgrounds/page-header-bg.jpg)' }}">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('user-index') }}">Beranda</a></li>
                    <li>Blog</li>
                </ul>
                <h2>Blog Posts</h2>
                @if (request('category'))
                    <h2>Kategori: {{ request('category') }}</h2>
                @endif
                @if (request('user'))
                    <h2>Penulis: {{ request('user') }}</h2>
                @endif
                @if (request('tag'))
                    <h2>Tag: {{ request('tag') }}</h2>
                @endif
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="blog-page">
        @if (isset($blogs) && count($blogs) > 0)
            <div class="container">
                <div class="row mb-5">
                    <form action="{{ route('blog.index') }}" class="sidebar__search-form" method="GET">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('user'))
                            <input type="hidden" name="user" value="{{ request('user') }}">
                        @endif
                        <input type="search" placeholder="Cari blog..." name="search" value="{{ request('search') }}">
                        <button type="submit"><i class="icon-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                            <!--Blog One Single-->
                            <div class="blog-one__single">
                                <div class="blog-one__img">
                                    <img src="{{ isset($blog->thumbnail_image) ? asset('storage/' . $blog->thumbnail_image) : asset('images/blog/blog-page-img-1.jpg') }}" alt="">
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        {{-- <span class="blog-one__plus"></span> --}}
                                    </a>
                                    <div class="blog-one__date">
                                        <p>{{ \Carbon\Carbon::parse($blog->published_at)->locale('id')->isoFormat('D MMMM Y') }}</p>
                                    </div>
                                </div>
                                <div class="blog-content h-100">
                                    <ul class="list-unstyled blog-one__meta">
                                        <li><a href="{{ route('blog.index', ['user'=> $blog->user->username]) }}"><i class="far fa-user-circle"></i> By {{ $blog->user->name }}</a></li>
                                        <li><span>/</span></li>
                                        <li><a href="{{ route('blog.index', ['category'=> $blog->category->slug]) }}"><i class="far fa-folder"></i> {{ $blog->category->name }}</a></li>
                                    </ul>
                                    <h3 class="blog-one__title">
                                        <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <div class="blog-one__read-btn">
                                        <a href="{{ route('blog.show', $blog->slug) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $blogs->links() }}
                {{-- <div class="blog-sidebar__load-more text-center">
                    <a href="blog-details.html" class="thm-btn blog-sidebar__load-more-btn">Load more posts</a>
                </div> --}}
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <p>Belum ada blog yang ditambahkan.</p>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection