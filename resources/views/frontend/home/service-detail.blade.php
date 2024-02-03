@extends('frontend.layouts.app')

@section('content')
	<!--Page Header Start-->
	<section class="page-header">
		<div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
		</div>
		<div class="container">
			<div class="page-header__inner">
				<ul class="thm-breadcrumb list-unstyled">
					<li><a href="index.html">Home</a></li>
					<li><a href="services.html">Services</a></li>
					<li>Service Details</li>
				</ul>
				<h2>{{ $type }}</h2>
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
						<div class="service-details__sidebar-service">
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
						</div>
						<div class="service-details__need-help">
							<div class="service-details__need-help-bg"
								style="background-image: url(assets/images/backgrounds/service-details-need-help-bg.jpg)">
							</div>
							<div class="service-details__need-help-icon">
								<span class="icon-phone-call"></span>
							</div>
							<h2 class="service-details__need-help-title">Best Quality <br> services</h2>
							<div class="service-details__need-help-contact">
								<p>Call us Anytime</p>
								<a href="tel:926668880000">+ 92 666 888 0000</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-lg-7">
					<div class="service-details__right">
						<div class="service-details__img">
							<img src="assets/images/resources/service-details-img-4.jpg" alt="">
						</div>
						<div class="service-details__content">
							<h3 class="service-details__title">Website Development</h3>
							<p class="service-details__text">Lorem ipsum is simply free text used by copytyping
								refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et
								quasi architecto beatae vitae dicta sunt explicabo. Aelltes port lacus quis enim var
								sed efficitur turpis gilla sed sit amet finibus eros. Lorem Ipsum is simply dummy
								text of the printing and typesetting industry. Lorem Ipsum has been the ndustry
								standard dummy text ever since the 1500s, when an unknown printer took a galley of
								type and scrambled it to make a type specimen book. It has survived not only five
								centuries. Lorem Ipsum is simply dummy text of the new design printng and type
								setting Ipsum Take a look at our round up of the best shows coming soon to your
								telly box has been the is industrys. Lorem Ipsum is simply dummy text of the
								printing and typesetting industry. Lorem Ipsum has industr standard dummy text ever
								since the 1500s, when an unknown printer took a galley of type and scrambled it to
								make a type specimen book. It has survived not only five centuries, but also the
								leap into electronic typesetting, remaining essentially unchanged. It was
								popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
								passages, and more recently with desktop publishing software like Aldus PageMaker
								including versions of.</p>
						</div>
						<ul class="service-details__points list-unstyled">
							<li>
								<h4>high quality project</h4>
								<div class="service-details__points-count"></div>
							</li>
							<li>
								<h4>Fast & relaible service</h4>
								<div class="service-details__points-count"></div>
							</li>
						</ul>
						<div class="service-details__benefits">
							<div class="row">
								<div class="col-xl-6">
									<div class="service-details__benefits-content">
										<h3 class="service-details__benefits-title">Our Benefits</h3>
										<p class="service-details__benefits-text">Duis aute irure dolor in simply
											free text exist on reprehende voluptate velit esse cillum.</p>
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
										<img src="assets/images/resources/service-details__benefits-img.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="service-details__faq">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Services Details End-->
@endsection