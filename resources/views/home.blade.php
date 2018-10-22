@extends('layouts.app')

@section('content')
	<section class="slider">
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="{{ asset('images/sliders/web--01.png') }}" alt="First slide">
			      <div class="carousel-caption d-none d-md-block">
				    <h5 style="float: right; color: white; text-align: right;">أدعم ... أعطى <br> ياحتاجون مساعدتك</h5>
				    <h4 style=" display: inline-block; color: white; text-align: left;">راعى مصر <br> للخير </h4>
				  </div>
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="{{ asset('images/sliders/web--01.png') }}" alt="Second slide">
			      <div class="carousel-caption d-none d-md-block">
				    <h5 style="float: right; color: white; text-align: right;">أدعم ... أعطى <br> ياحتاجون مساعدتك</h5>
				    <h4 style=" display: inline-block; color: white; text-align: left;">راعى مصر <br> للخير </h4>
				  </div>
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="{{ asset('images/sliders/web--01.png') }}" alt="Third slide">
			      <div class="carousel-caption d-none d-md-block">
				    <h5 style="float: right; color: white; text-align: right;">أدعم ... أعطى <br> ياحتاجون مساعدتك</h5>
				    <h4 style=" display: inline-block; color: white; text-align: left;">راعى مصر <br> للخير </h4>
				  </div>
			    </div>
			  </div>
			</div>
	</section>

	<div class="cp-main-content" style="background: url( {{ asset('images/web-31.png') }} ) top center; z-index: 11; background-size: contain;">

		<section class="cp-welcome-section cp-welcome-section_v2 pd-tb100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<h5><a href="../index.html">{{ @$about[0]->title_ar }}</a></h5>
										<p>{{ @$about[0]->description_ar }}</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<h5><a href="../index.html">{{ @$vision[0]->title_ar }}</a></h5>
										<p>{{ @$vision[0]->description_ar }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="cp-welcome-section cp-welcome-section_v2 pd-tb100 services no-top-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
						<div class="cp-heading-outer cp-heading-outer_v3">
							<h5 ><img src="{{ asset('images/web-28.png') }}" alt="">الخدمات المباشرة</h5>
						</div>
					</div>
					<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
						<div class="row">
							@foreach($liveServices as $liveService)
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<p>{{ $liveService->title_ar }}</p>
										<p>{{ $liveService->number }}</p>
									</div>
								</div>
							</div>
							@endforeach
							<!-- <div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<p>التعليم</p>
										<p>4,000,000</p>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<p>الصحة</p>
										<p>4,000,000</p>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<p>البحث العلمى</p>
										<p>4,000,000</p>
									</div>
								</div>
							</div> 
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<p>مناحى الحياة</p>
										<p>4,000,000</p>
									</div>
								</div>
							</div> 
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<p>الجميع</p>
										<p>4,000,000</p>
									</div>
								</div>
							</div>  -->
					</div>
				</div>
			</div>
		</section>

		<section class="cp-welcome-section cp-welcome-section_v2 pd-tb100 no-top-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
						<div class="row">
							<div class="col-lg-1 col-md-6 col-sm-12">
							</div>
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<img src="{{ asset('images/web-04.png') }}">
										<p>التعليم</p>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<img src="{{ asset('images/web-05.png') }}">
										<p>التكافل الاجتماعى</p>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<img src="{{ asset('images/web-06.png') }}">
										<p>الصحة</p>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<img src="{{ asset('images/web-07.png') }}">
										<p>البحث العلمى</p>
									</div>
								</div>
							</div> 
							<div class="col-lg-2 col-md-6 col-sm-12">
								<div class="cp-donation-box">
									<div class="cp-text">
										<img src="{{ asset('images/web-08.png') }}">
										<p>مناحى الحياة</p>
									</div>
								</div>
							</div> 
					</div>
				</div>
			</div>
		</section>

		<section class="cp-causes-section cp-causes-masonary-section pd-tb100 no-top-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
						<div class="cp-heading-outer cp-heading-outer_v3">
							<h5 ><img src="{{ asset('images/web-27.png') }}" alt="">أخبار راعى مصر</h5>
						</div>
					</div>
				</div>
				<div class="cp-causes-inner-outer">
					<div class="cp-masonary-layout">
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-01.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<ul class="meta-listed">
										<li><i class="fa fa-user" aria-hidden="true"></i> راعى مصر</li>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> 30 Nov, 2016</li>
									</ul>
									<h5><a href="../falah/cause-detail.html">التطوير المستمر</a></h5>
									<div class="cp-progressbar-outer">
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .	
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-md-img-01.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<ul class="meta-listed">
										<li><i class="fa fa-user" aria-hidden="true"></i> راعى مصر </li>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> 30 Nov, 2016</li>
									</ul>
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-03.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<ul class="meta-listed">
										<li><i class="fa fa-user" aria-hidden="true"></i> راعى مصر </li>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> 30 Nov, 2016</li>
									</ul>
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-md-img-02.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<ul class="meta-listed">
										<li><i class="fa fa-user" aria-hidden="true"></i> راعى مصر </li>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> 30 Nov, 2016</li>
									</ul>
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-02.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<ul class="meta-listed">
										<li><i class="fa fa-user" aria-hidden="true"></i> راعى مصر </li>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> 30 Nov, 2016</li>
									</ul>
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-md-img-03.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<ul class="meta-listed">
										<li><i class="fa fa-user" aria-hidden="true"></i> راعى مصر </li>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> 30 Nov, 2016</li>
									</ul>
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-07.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<ul class="meta-listed">
										<li><i class="fa fa-user" aria-hidden="true"></i> راعى مصر </li>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> 30 Nov, 2016</li>
									</ul>
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-md-img-04.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<ul class="meta-listed">
										<li><i class="fa fa-user" aria-hidden="true"></i> راعى مصر </li>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> 30 Nov, 2016</li>
									</ul>
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-09.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<ul class="meta-listed">
										<li><i class="fa fa-user" aria-hidden="true"></i> راعى مصر </li>
										<li><i class="fa fa-clock-o" aria-hidden="true"></i> 30 Nov, 2016</li>
									</ul>
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cp-btns-holder text-center">
						<a href="../falah/cause.html" class="cp-btn-style_v3">عرض المزيد من الأخبار</a>
					</div>
				</div>
			</div>
		</section>

		<section class="cp-causes-section cp-causes-masonary-section pd-tb100">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
						<div class="cp-heading-outer cp-heading-outer_v3">
							<h5 ><img src="{{ asset('images/web-29.png') }}" alt="">التمويل الجماعى</h5>
						</div>
					</div>
				</div>
				<div class="cp-causes-inner-outer">
					<div class="cp-masonary-layout">
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-01.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										<div class="cp-progressbar-inner">
												<span class="percentage bar-left">1,000,000 ج.م</span>
											<div class="progress-bar" style="width: 80%;">
												<span class="percentage">1,000,000 ج.م</span>
											</div>
										</div>
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
									<div class="bottom-holder">
										<a href="../falah/cause-detail.html" class="cp-btn-style btn-donors">أتبرع الأن</a>
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-md-img-01.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										<div class="cp-progressbar-inner">
												<span class="percentage bar-left">1,000,000 ج.م</span>
											<div class="progress-bar" style="width: 45%;">
												<span class="percentage">1,000,000 ج.م</span>
											</div>
										</div>
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
									<div class="bottom-holder">
										<a href="../falah/cause-detail.html" class="cp-btn-style btn-donors">أتبرع الأن</a>
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-03.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										<div class="cp-progressbar-inner">
												<span class="percentage bar-left">1,000,000 ج.م</span>
											<div class="progress-bar" style="width: 40%;">
												<span class="percentage">1,000,000 ج.م</span>
											</div>
										</div>
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
									<div class="bottom-holder">
										<a href="../falah/cause-detail.html" class="cp-btn-style btn-donors">أتبرع الأن</a>
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-md-img-02.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										<div class="cp-progressbar-inner">
												<span class="percentage bar-left">1,000,000 ج.م</span>
											<div class="progress-bar" style="width: 90%;">
												<span class="percentage">1,000,000 ج.م</span>
											</div>
										</div>
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
									<div class="bottom-holder">
										<a href="../falah/cause-detail.html" class="cp-btn-style btn-donors">أتبرع الأن</a>
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-02.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										<div class="cp-progressbar-inner">
												<span class="percentage bar-left">1,000,000 ج.م</span>
											<div class="progress-bar" style="width: 75%;">
												<span class="percentage">1,000,000 ج.م</span>
											</div>
										</div>
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
									<div class="bottom-holder">
										<a href="../falah/cause-detail.html" class="cp-btn-style btn-donors">أتبرع الأن</a>
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-md-img-03.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										<div class="cp-progressbar-inner">
												<span class="percentage bar-left">1,000,000 ج.م</span>
											<div class="progress-bar" style="width: 55%;">
												<span class="percentage">1,000,000 ج.م</span>
											</div>
										</div>
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
									<div class="bottom-holder">
										<a href="../falah/cause-detail.html" class="cp-btn-style btn-donors">أتبرع الأن</a>
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-07.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										<div class="cp-progressbar-inner">
												<span class="percentage bar-left">1,000,000 ج.م</span>
											<div class="progress-bar" style="width: 56%;">
												<span class="percentage">1,000,000 ج.م</span>
											</div>
										</div>
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
									<div class="bottom-holder">
										<a href="../falah/cause-detail.html" class="cp-btn-style btn-donors">أتبرع الأن</a>
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-md-img-04.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										<div class="cp-progressbar-inner">
												<span class="percentage bar-left">1,000,000 ج.م</span>
											<div class="progress-bar" style="width: 79%;">
												<span class="percentage">1,000,000 ج.م</span>
											</div>
										</div>
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
									<div class="bottom-holder">
										<a href="../falah/cause-detail.html" class="cp-btn-style btn-donors">أتبرع الأن</a>
									</div>
								</div>
							</div>
						</div>
						<div class="cp-masonary-item">
							<div class="cp-causes-item">
								<figure class="cp-thumb">
									<img src="{{ asset('images/resources/causes-img-09.jpg') }}" alt="">
								</figure>
								<div class="cp-text">
									<h5><a href="../falah/cause-detail.html">فاعليات راعى مصر</a></h5>
									<div class="cp-progressbar-outer">
										<div class="cp-progressbar-inner">
												<span class="percentage bar-left">1,000,000 ج.م</span>
											<div class="progress-bar" style="width: 92%;">
												<span class="percentage">1,000,000 ج.م</span>
											</div>
										</div>
										نحن نعمل لخدمة المجتمع المصرى و خاصة الطبقة الفقيرة منه من خلال انشطة مختلفة و متنوعة .
									</div>
									<div class="bottom-holder">
										<a href="../falah/cause-detail.html" class="cp-btn-style btn-donors">أتبرع الأن</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cp-btns-holder text-center">
						<a href="../falah/cause.html" class="cp-btn-style_v3">عرض المزيد من التمويل الاجتماعى</a>
					</div>
				</div>
			</div>
		</section>
		<section class="cp-newsletter-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="cp-news-letter-inner" style="    
							background: url({{ asset('images/web-12.png)') }} top center;
						    z-index: 11;
						    background-size: contain;
						    height: 185px;
						    background-repeat: no-repeat;
							background-size: 100% 100%;">
							<div class="news-text col-xs-offset-3 col-xs-6" >
								<h2>ياحتاجون مساعدتك</h2>
								<h3>ابداء بأحد برامجنا و قدم المساعدة</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="cp-sponsors-section pd-tb100 slider-1" >
			<div class="container">
				<div class="row" style="direction: rtl">
					<div class="col-lg-3 col-md-12 col-sm-12 col-xs-6 ">
						<div class="cp-heading-outer cp-heading-outer_v3">
							<h5 ><img src="{{ asset('images/web-30.png') }}" alt="">الصور</h5>
						</div>
					</div>
				</div>
				<div id="cp-photos-slider" class="owl-carousel" style="direction: ltr;">
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-01.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-02.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-03.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-04.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-05.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-06.png') }}" alt=""></a>
					</div>
				</div>
			</div>
		</section>

		<section class="cp-sponsors-section pd-tb100" >
			<div class="container">
				<h2>الداعمين</h2>
				<div id="cp-sponsors-slider" class="owl-carousel" style="direction: ltr;">
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-01.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-02.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-03.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-04.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-05.png') }}" alt=""></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ asset('images/resources/sponsors-img-06.png') }}" alt=""></a>
					</div>
				</div>
			</div>
		</section>

	</div>
@endsection
