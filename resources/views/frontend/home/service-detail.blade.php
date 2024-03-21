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
					<li><a href="{{ route('user-services') }}">Layanan</a></li>
					<li>Detail Layanan</li>
				</ul>
				<h2>{{ $service->service_name }}</h2>
			</div>
		</div>
	</section>
	<!--Page Header End-->

	<!--Services Details Start-->
	<section class="service-details">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-5">
					<div class="service-details__sidebar">
						{{-- <div class="service-details__sidebar-service">
							<h4 class="service-details__sidebar-title">Categories</h4>
							<ul class="service-details__sidebar-service-list list-unstyled">
								<li><a href="mobile-application.html">Mobile Application <span
											class="icon-arrow-right"></span></a></li>
								<li><a href="digital-marketing.html">Digital Marketing <span
											class="icon-arrow-right"></span></a></li>
								<li><a href="graphic-designing.html">Graphic Designing <span
											class="icon-arrow-right"></span></a></li>
								<li><a href="website-development.html">Website Development <span
											class="icon-arrow-right"></span></a></li>
								<li><a href="social-marketing.html">Social Marketing <span
											class="icon-arrow-right"></span></a></li>
								<li><a href="content-writing.html">Content Writting <span
											class="icon-arrow-right"></span></a></li>
							</ul>
						</div> --}}
						<div class="service-details__need-help">
							<div class="service-details__need-help-bg">
							</div>
							<div class="service-details__need-help-icon">
								<span class="icon-phone-call"></span>
							</div>
							<h2 class="service-details__need-help-title">Best Quality <br> services</h2>
							<div class="service-details__need-help-contact">
								<p>Hubungi Kami Kapan Saja</p>
								<a href="https://wa.me/{{ $contact->phone }}">{{ $contact->phone }}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-lg-7">
					<div class="service-details__right">
						<div class="service-details__img">
							<img class="lazy " data-src="{{ isset($service->serviceImage[0]) ? asset('storage/' . $service->serviceImage[0]->file_path) : ''}}" alt="">
						</div>
						<div class="service-details__content">
							<h3 class="service-details__title">{{ $service->service_name }}</h3>
							<p class="service-details__text">{!! $service->description !!}</p>
						</div>
						<div class="row">
                            <div class="swiper swiper--eager">
                                <div class="swiper-wrapper">
                                    @foreach ($service->serviceImage as $item)
                                    <div class="swiper-slide col-xl-4" style="width: 320px;">
                                        {{-- <img
                                            alt="Stivaletti"
                                            src="https://via.placeholder.com/220x280?text=S01E01"
                                            srcset="https://via.placeholder.com/440x560?text=S01E01 2x"
                                            width="220"
                                            height="280"
                                        /> --}}
                                        <img alt="loading image.." class="lazy" data-src="{{ asset('storage/' . $item->file_path) }}" width="300"/>
                                    </div>
                                    <div class="">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
							{{-- @foreach ($service->serviceImage as $item)
								<div class="col-xl-3 mb-3">
									<div class="project-detail-img">
										<img src="{{ asset('storage/' . $item->file_path) }}" alt="" loading="lazy">
                                        <img alt="A lazy image" class="lazy" data-src="{{ asset('storage/' . $item->file_path) }}" />
									</div>
								</div>
							@endforeach --}}
						</div>
                        <h4 class="service-details__benefits-title mt-5">Range Harga</h4>
						<ul class="service-details__points list-unstyled mt-2">
							<li>
								<h4>{{ "Rp " . number_format($service->min_price, 0, ",", "."); }}</h4>
								{{-- <div class="service-details__points-count"></div> --}}
							</li>
							<li>
								<h4>{{ "Rp " . number_format($service->max_price, 0, ",", "."); }}</h4>
								{{-- <div class="service-details__points-count"></div> --}}
							</li>
						</ul>
						{{-- <div class="service-details__benefits">
							<div class="row">
								<div class="col-xl-6">
									<div class="service-details__benefits-content">
										<h3 class="service-details__benefits-title">Our Benefits</h3>
										<p class="service-details__benefits-text">{{ $service->tagline }}</p>
										<ul class="list-unstyled service-details__benefits-list">
											<li>
												<div class="icon">
													<span class="icon-check"></span>
												</div>
												<div class="text">
													<p>Nsectetur cing elit</p>
												</div>
											</li>
											<li>
												<div class="icon">
													<span class="icon-check"></span>
												</div>
												<div class="text">
													<p>Suspe ndisse suscip sagittis leo</p>
												</div>
											</li>
											<li>
												<div class="icon">
													<span class="icon-check"></span>
												</div>
												<div class="text">
													<p>Entum estib dignissim posuere</p>
												</div>
											</li>
											<li>
												<div class="icon">
													<span class="icon-check"></span>
												</div>
												<div class="text">
													<p>If you are going to use a pass</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="service-details__benefits-img">
										<img src="{{ isset($service->serviceImage[0]) ? asset('storage/' . $service->serviceImage[0]->file_path) : 'images/resources/service-details__benefits-img.jpg' }}" alt="">
									</div>
								</div>
							</div>
						</div> --}}
						{{-- <div class="service-details__faq">
							<div class="accrodion-grp" data-grp-name="faq-one-accrodion">
								<div class="accrodion active">
									<div class="accrodion-title">
										<h4>We Help to Create Visual Strategies</h4>
									</div>
									<div class="accrodion-content">
										<div class="inner">
											<p>There are many variations of passages the majority have suffered
												alteration in some fo injected humour, simply free text available in
												the market of loram ipsum where it is not or randomised words
												believable.</p>
										</div><!-- /.inner -->
									</div>
								</div>
								<div class="accrodion">
									<div class="accrodion-title">
										<h4>Motion Graphics & Animations</h4>
									</div>
									<div class="accrodion-content">
										<div class="inner">
											<p>There are many variations of passages the majority have suffered
												alteration in some fo injected humour, simply free text available in
												the market of loram ipsum where it is not or randomised words
												believable.</p>
										</div><!-- /.inner -->
									</div>
								</div>
								<div class="accrodion last-chiled">
									<div class="accrodion-title">
										<h4>We Help to Achieve Mutual Goals</h4>
									</div>
									<div class="accrodion-content">
										<div class="inner">
											<p>There are many variations of passages the majority have suffered
												alteration in some fo injected humour, simply free text available in
												the market of loram ipsum where it is not or randomised words
												believable.</p>
										</div><!-- /.inner -->
									</div>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Services Details End-->
@endsection