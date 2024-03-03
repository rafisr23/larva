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
                    <li>projects</li>
                </ul>
                <h2>projects</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Project One Start-->
    <section class="project-one">
        @if (isset($project) && count($project) > 0)
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="project-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                            <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li>
                            @foreach ($service as $item)
                                <li data-filter=".{{ $item->slug }}-slug"><span class="filter-text">{{ $item->service_name }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row filter-layout masonary-layout">
                    @foreach ($project as $item)
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item {{ $item->service->slug }}-slug">
                            <!--Portfolio One Single-->
                            <div class="project-one__single">
                                <div class="project-one__img">
                                    <img src="{{ count($item->projectImage) > 0 ? asset('storage/' . $item->projectImage[0]->file_path) : asset('images/resources/project-one-img-1.jpg') }}" alt="">
                                    <div class="project-one__hover">
                                        <p class="project-one__tagline">{{ $item->company_name }}</p>
                                        <h3 class="project-one__title"><a href="{{ route('user-project-detail', $item->slug) }}">{{ $item->project_name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <p>Belum ada project yang ditambahkan.</p>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <!--Project One End-->
@endsection