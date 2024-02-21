@extends('frontend.layouts.app')

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(images/backgrounds/page-header-bg.jpg)">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('user-index') }}">Home</a></li>
                    <li><a href="{{ route('user-projects') }}">projects</a></li>
                    <li class="current">detail project</a></li>
                </ul>
                <h2>Detail Project</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->    

    <!--Project Details Start-->
    <section class="project-details mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__img">
                        <img src="/images/resources/project-details-img.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="project-details__content">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="project-details__content-left">
                            <h3 class="project-details__content-title">{{ $project->project_name }}</h3>
                            <p class="project-details__content-text-1 mb-3">{!! $project->description !!}</p>
                            {{-- <ul class="list-unstyled project-details__points">
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>Take a look at our round up of the best shows</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>It has survived not only five centuries</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>Lorem Ipsum has been the ndustry standard dummy text</p>
                                    </div>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="project-details__content-right">
                            <div class="project-details__details-box">
                                <div class="project-details__details-info">
                                    <div class="project-details__details-info-single">
                                        <h5 class="project-details__details-info-client">Clients:</h5>
                                        <p class="project-details__details-info-name">{{ $project->company_name }}</p>
                                    </div>
                                    <div class="project-details__details-info-single">
                                        <h5 class="project-details__details-info-client">Kategori:</h5>
                                        <p class="project-details__details-info-name">{{ $project->service->service_name }}</p>
                                    </div>
                                    <div class="project-details__details-info-single">
                                        <h5 class="project-details__details-info-client">Tanggal:</h5>
                                        <p class="project-details__details-info-name">{{ \Carbon\Carbon::parse($project->created_at)->isoFormat('D MMMM Y') }}</p>
                                    </div>
                                </div>
                                <div class="project-details__details-social-list">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__pagination-box">
                        <ul class="project-details__pagination list-unstyled">
                            <li class="next">
                                <a href="#" aria-label="Previous"><i class="icon-arrow-left"></i>Previous</a>
                            </li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="previous">
                                <a href="#" aria-label="Next">Next<i class="icon-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!--Project Details End-->
@endsection