@extends('tienda.app')

@section('tienda_contenido')
<div class="container mt-80">
	<div class="row">
		<div class="col-12 mb-70">
			<div class="brk-sc-tiles-banner shadow" data-brk-library="component__widgets">
				<img src="{{ asset('img/bg-1920_1.jpg') }}" alt="alt" class="brk-sc-tiles-banner__bg">
				<div class="brk-sc-tiles-banner__overlay"></div>
				<div class="row">
					<div class="col-12 col-sm-8 col-lg-5">
						<div class="brk-sc-tiles-banner__info">
							<h3 class="brk-sc-tiles-banner__title brk-white-font-color font__family-montserrat font__size-36 font__weight-bold line__height-42 mb-25 letter-spacing--20">Los mejores productos para ti y tus amigos</h3>
							<div class="brk-sc-tags font__family-open-sans font__size-16 font__weight-normal line__height-26 d-flex align-items-center flex-wrap mb-20" data-brk-library="component__widgets">
								<a href="#" class="brk-sc-tags__item">T-Shirts</a>
								<a href="#" class="brk-sc-tags__item">Branding</a>
								<a href="#" class="brk-sc-tags__item">WooCommerce</a>
							</div>
							<a href="#" class="btn btn-inside-out btn-inside-out-invert btn-lg border-radius-30 font__family-open-sans font__weight-bold brk-sc-tiles-banner__btn pl-70 pr-70" data-brk-library="component__button">
								<span class="before">Leer más</span><span class="text">Click aquí</span><span class="after">Leer más</span>
							</a>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-lg-4">
						<div class="brk-sc-tiles-banner__img">
							@if($ultimoProducto?->imagen)
							<img src="{{ asset('storage/'.$ultimoProducto->imagen) }}">
							@else
							<img src="{{asset('img/shop/tshirt-brk.png')}}" alt="alt">
							@endif
						</div>
					</div>
					@if($productosTendencia->count()>2)
					<div class="col-12 col-lg-3">
						<div class="brk-sc-tiles-banner__links">
							<a href="#" class="brk-sc-tiles-banner__link">
								<span class="font__family-montserrat brk-white-font-color font__size-42 font__weight-light line__height-42 mr-35">01</span>
								<span class="brk-white-font-color font__size-16 font__weight-normal line__height-21">{{$productosTendencia[0]->nombre}}</span>
								<div class="brk-sc-tiles-banner__discount">
									<svg vxmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 461 483">
										<g>
											<path class="brk-fill-primary" d="M198.7,16.9c17-19.2,44.8-19.2,61.8,0c17,19.2,51.4,30.4,76.4,24.8c25-5.5,47.5,10.8,50,36.3
															c2.5,25.5,23.7,54.8,47.2,65c23.5,10.2,32.1,36.7,19.1,58.8c-13,22.1-13,58.2,0,80.3c13,22.1,4.4,48.5-19.1,58.8
															c-23.5,10.2-44.8,39.5-47.2,65c-2.5,25.5-25,41.9-50,36.3c-25-5.5-59.4,5.6-76.4,24.8c-17,19.2-44.8,19.2-61.8,0
															s-51.4-30.4-76.4-24.8c-25,5.5-47.5-10.8-50-36.3c-2.5-25.5-23.7-54.8-47.2-65s-32.1-36.7-19.1-58.8c13-22.1,13-58.2,0-80.3
															c-13-22.1-4.4-48.5,19.1-58.8s44.8-39.5,47.2-65c2.5-25.5,25-41.9,50-36.3C147.3,47.3,181.7,36.1,198.7,16.9z" />
										</g>
									</svg>
									<span class="brk-white-font-color font__family-montserrat font__size-14 font__weight-bold brk-sc-tiles-banner__discount-value">-10%</span>
								</div>
							</a>
							<a href="#" class="brk-sc-tiles-banner__link">
								<span class="font__family-montserrat brk-white-font-color font__size-42 font__weight-light line__height-42 mr-35">02</span>
								<span class="brk-white-font-color font__size-16 font__weight-normal line__height-21">{{$productosTendencia[1]->nombre}}</span>
								<div class="brk-sc-tiles-banner__discount">
									<svg vxmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 461 483">
										<g>
											<path class="brk-fill-secondary" d="M198.7,16.9c17-19.2,44.8-19.2,61.8,0c17,19.2,51.4,30.4,76.4,24.8c25-5.5,47.5,10.8,50,36.3
															c2.5,25.5,23.7,54.8,47.2,65c23.5,10.2,32.1,36.7,19.1,58.8c-13,22.1-13,58.2,0,80.3c13,22.1,4.4,48.5-19.1,58.8
															c-23.5,10.2-44.8,39.5-47.2,65c-2.5,25.5-25,41.9-50,36.3c-25-5.5-59.4,5.6-76.4,24.8c-17,19.2-44.8,19.2-61.8,0
															s-51.4-30.4-76.4-24.8c-25,5.5-47.5-10.8-50-36.3c-2.5-25.5-23.7-54.8-47.2-65s-32.1-36.7-19.1-58.8c13-22.1,13-58.2,0-80.3
															c-13-22.1-4.4-48.5,19.1-58.8s44.8-39.5,47.2-65c2.5-25.5,25-41.9,50-36.3C147.3,47.3,181.7,36.1,198.7,16.9z" />
										</g>
									</svg>
									<span class="brk-white-font-color font__family-montserrat font__size-14 font__weight-bold brk-sc-tiles-banner__discount-value">-10%</span>
								</div>
							</a>
							<a href="#" class="brk-sc-tiles-banner__link">
								<span class="font__family-montserrat brk-white-font-color font__size-42 font__weight-light line__height-42 mr-35">03</span>
								<span class="brk-white-font-color font__size-16 font__weight-normal line__height-21">{{$productosTendencia[2]->nombre}}</span>
							</a>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
		@if($descuentos->count()>0)
			<div class="col-12 col-lg-8 col-xl-9 order-xs-2 order-lg-1">
				<div class="brs-sidebar__title">
					<h3 class="font__family-montserrat font__size-21 font__weight-bold line__height-22">Descuentos</h3>
				</div>
				<div class="brk-border-btw-sidebar_right">
					<div class="brk-sc-sorting" data-brk-library="component__widgets,jquerySlider,component__form">
						<div class="brk-sc-view-swiper col-view mr-20">
							<a href="http://dev.nikadevs.com/berserk-html/shop-components-list.html" class="brk-sc-view-swiper__btn">
								<i class="fas fa-bars font__size-14"></i>
							</a>
							<a href="http://dev.nikadevs.com/berserk-html/shop-components-grid.html" class="brk-sc-view-swiper__btn">
								<i class="fas fa-th font__size-14"></i>
							</a>
						</div>
						<span class="brk-dark-font-color brk-sc-sorting__label font__family-open-sans font__size-14 font__weight-normal line__height-14 mr-15">Sort by</span>
						<div class="brk-sc-sorting__sort-select d-inline brk-form-round mr-20">
							<select name="select">
								<option value="Option 1">Date </option>
								<option value="Option 2">Popular </option>
							</select>
						</div>
						<span class="brk-dark-font-color brk-sc-sorting__label font__family-open-sans font__size-14 font__weight-normal line__height-14 mr-15">Show</span>
						<div class="brk-sc-sorting__show-count d-inline brk-form-round mr-30">
							<select name="select1">
								<option value="Option 1">10</option>
								<option value="Option 2">40</option>
								<option value="Option 2">All</option>
							</select>
						</div>
						<div class="brk-sc-price-slider font__family-open-sans line__height-24 text-uppercase font__weight-bold">
							<label for="lowest">$</label>
							<input type="text" class="brk-sc-price-slider__input sliderValue font__size-14" id="lowest" data-index="0" value="150">
							<span class="font__family-open-sans font__size-14 line__height-24 font__weight-normal font__weight-bold mr-1">—</span>
							<label for="highest">$</label>
							<input type="text" class="brk-sc-price-slider__input sliderValue font__size-14" id="highest" data-index="1" value="600">
							<div class="brk-sc-price-slider__container" data-min-value="2" data-max-value="9000"></div>
						</div>
					</div>
					<div class="row">
						@foreach($descuentos as $desc)
						<div class="col-12 col-md-6 col-xl-4">
							<div class="flip-box text-center" data-brk-library="component__flip_box,component__elements,fancybox">
								<div class="flip flip_vertical flip-box__split">
									<div class="flip__front">
										<div class="flip-box__split-img lazyload" data-bg="{{ asset('storage/'.$desc->imagen) }}"></div>
										<div class="pt-30 pb-30 flip-box__split-info">
											<div class="font__family-montserrat font__weight-bold pl-20 pr-20 font__size-15">
												{{$desc->nombre}}
											</div>
											<div class="brk-base-font-color font__family-montserrat font__size-17 font__weight-medium">
												<span class="old-price font__size-16">
													${{ number_format($desc->precio,2)}}
												</span>
												<span class="font__weight-semibold">
													@php
														$precioConDescuento = $desc->precio - ($desc->precio * ($desc->descuento / 100));
													@endphp
													${{ number_format($precioConDescuento,2)}}
												</span>
											</div>
										</div>
										<div class="brk-sc-card-labels brk-sc-card-labels_top-labels">
											<div class="brk-sc-card-label">
												<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase brk-sc-card-label__text">-{{$desc->descuento}}%</span>
												<span class="brk-sc-card-label__additional-1"></span>
												<span class="brk-sc-card-label__additional-2"></span>
												<span class="brk-sc-card-label__additional-3"></span>
											</div>
										</div>
									</div>
									<div class="flip__back lazyload" data-bg=" {{ asset('storage/'.$desc->imagen) }}">
										<div class="flip-box__split-overlay brk-base-bg-gradient-10deg"></div>
										<div class="flip-box__split-content">
											<div class="brk-sc-card-labels brk-sc-card-labels_top-labels">
												<div class="brk-sc-card-label">
													<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase brk-sc-card-label__text">-{{$desc->descuento}}%</span>
													<span class="brk-sc-card-label__additional-1"></span>
													<span class="brk-sc-card-label__additional-2"></span>
													<span class="brk-sc-card-label__additional-3"></span>
												</div>
											</div>
											<div class="pt-lg-30 pb-lg-30 pt-sm-20 pb-sm-20 pt-xs-40 pb-xs-40 pt-20 pb-20 position-relative z-index-5">
												<a href="#">
													<h4 class="font__family-montserrat font__weight-bold font__size-18 line__height-24">
													{{$desc->nombre}}
													</h4>
												</a>
												<div class="flip-box__split-price font__family-montserrat font__size-15">
													<span>
													${{ number_format($desc->precio,2)}}
													</span>
													<span class="font__weight-bold"></span>
													${{ number_format($precioConDescuento,2)}}
												</div>
											</div>
											<div class="flip-box__split-list">
												<p class="brk-white-font-color font__family-open-sans font__size-14 font__weight-light line__height-22 pt-15 pb-15">
												{{$desc->descripcion}}
												</p>
											</div>
											<div class="flip-box__split-actions">
												<a href="#" class="add-cart d-flex align-items-center justify-content-center">
													<i class="fas fa-shopping-cart"></i>
												</a>
												<a href="{{ asset('storage/'.$desc->imagen) }}" class="add-search d-flex align-items-center justify-content-center fancybox">
													<i class="fas fa-search"></i>
												</a>
												<a href="#" class="add-wishlist d-flex align-items-center justify-content-center">
													<i class="fas fa-star"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<div class="col-12">
							<div class="text-center mt-110 mb-80">
								<a href="#" class="icon__btn icon__btn-anim icon__btn-md icon__btn-invert">
									<span class="before"></span>
									<i class="fal fa-sync" aria-hidden="true"></i>
									<span class="after"></span>
									<span class="bg"></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-lg-4 col-xl-3 order-xs-1 order-lg-2">
				<div class="brs-sidebar brs-sidebar_right" data-brk-library="component__widgets">
					<div class="brs-sidebar__title">
						<h3 class="font__family-montserrat font__size-21 font__weight-bold line__height-22">Categories</h3>
					</div>
					<div class="brk-categories mb-20" data-brk-library="component__widgets">
						<div class="brk-categories__list font__family-open-sans font__size-14 font__weight-normal">
							<a href="#" class="brk-categories__item">
								<span class="brk-categories__item-name">General</span>
								<span class="brk-categories__item-count">12</span>
							</a>
							<a href="#" class="brk-categories__item active">
								<span class="brk-categories__item-name">Mockups</span>
								<span class="brk-categories__item-count">14</span>
							</a>
							<a href="#" class="brk-categories__item">
								<span class="brk-categories__item-name">HTML & CSS</span>
								<span class="brk-categories__item-count">18</span>
							</a>
							<a href="#" class="brk-categories__item">
								<span class="brk-categories__item-name">Logo</span>
								<span class="brk-categories__item-count">21</span>
							</a>
							<a href="#" class="brk-categories__item">
								<span class="brk-categories__item-name">Web Design</span>
								<span class="brk-categories__item-count">6</span>
							</a>
						</div>
					</div>
					<div class="brs-sidebar__title">
						<h3 class="font__family-montserrat font__size-21 font__weight-bold line__height-22">Filter</h3>
					</div>
					<div class="brk-color-filter mt-40 mb-45" data-brk-library="component__elements">
						<h3 class="brk-color-filter__title font__family-montserrat font__weight-bold font__size-14 line__height-14 text-uppercase text-center">
							<span class="brk-color-filter__title-text">color</span>
						</h3>
						<div class="brk-color-filter__container">
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-blue"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-green"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-cyan"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-yellow"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-orange"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-brown"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-black"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
						</div>
					</div>
					<div class="brk-brand-filter mb-30" data-brk-library="component__widgets">
						<h3 class="brk-brand-filter__title font__family-montserrat font__weight-bold font__size-14 line__height-14 text-uppercase text-center">
							<span class="brk-brand-filter__title-text">brand</span>
						</h3>
						<div class="brk-brand-filter__container">
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item active">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
						</div>
					</div>
					<div class="brs-sidebar__title">
						<h3 class="font__family-montserrat font__size-21 font__weight-bold line__height-22">Popular items</h3>
					</div>
					<div class="brk-slider-cube" data-brk-library="component__widgets,slider__swiper">
						<div class="brk-slider-cube__overlay"></div>
						<div class="brk-slider-cube__items swiper-container">
							<div class="swiper-wrapper" style="height: 290px !important;">
								<div class="swiper-slide">
									<div class="brk-sc-simple-card" data-brk-library="component__shop_cards">
										<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('img/shop/shop-win-5.png') }}" alt="alt" class="brk-sc-simple-card__img lazyload">
										<div class="brk-sc-simple-card__label brk-bg-primary">
											<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase">new</span>
											<span class="brk-sc-simple-card__label-left-top-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-left-bottom-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-bottom-angle"></span>
										</div>
										<div class="brk-sc-simple-card__price brk-bg-primary font__family-open-sans font__size-14 line__height-14 text-uppercase">
											<span class="brk-sc-simple-card__price-old font__weight-light">$26.00</span>
											<span class="brk-sc-simple-card__price-currne font__weight-bold brk-white-font-color">$16.00</span>
											<a href="#" class="brk-sc-simple-card__link">
												<i class="far fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="brk-sc-simple-card" data-brk-library="component__shop_cards">
										<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('img/shop/shop-win-1.jpg ') }}" alt="alt" class="brk-sc-simple-card__img lazyload">
										<div class="brk-sc-simple-card__label brk-bg-primary">
											<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase">new</span>
											<span class="brk-sc-simple-card__label-left-top-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-left-bottom-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-bottom-angle"></span>
										</div>
										<div class="brk-sc-simple-card__price brk-bg-primary font__family-open-sans font__size-14 line__height-14 text-uppercase">
											<span class="brk-sc-simple-card__price-old font__weight-light">$26.00</span>
											<span class="brk-sc-simple-card__price-currne font__weight-bold brk-white-font-color">$16.00</span>
											<a href="#" class="brk-sc-simple-card__link">
												<i class="far fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="brk-sc-simple-card" data-brk-library="component__shop_cards">
										<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('img/shop/shop-win-2.jpg') }}" alt="alt" class="brk-sc-simple-card__img lazyload">
										<div class="brk-sc-simple-card__label brk-bg-primary">
											<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase">new</span>
											<span class="brk-sc-simple-card__label-left-top-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-left-bottom-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-bottom-angle"></span>
										</div>
										<div class="brk-sc-simple-card__price brk-bg-primary font__family-open-sans font__size-14 line__height-14 text-uppercase">
											<span class="brk-sc-simple-card__price-old font__weight-light">$26.00</span>
											<span class="brk-sc-simple-card__price-currne font__weight-bold brk-white-font-color">$16.00</span>
											<a href="#" class="brk-sc-simple-card__link">
												<i class="far fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="brk-sc-simple-card" data-brk-library="component__shop_cards">
										<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('img/shop/shop-win-4.jpg') }}" alt="alt" class="brk-sc-simple-card__img lazyload">
										<div class="brk-sc-simple-card__label brk-bg-primary">
											<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase">new</span>
											<span class="brk-sc-simple-card__label-left-top-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-left-bottom-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-bottom-angle"></span>
										</div>
										<div class="brk-sc-simple-card__price brk-bg-primary font__family-open-sans font__size-14 line__height-14 text-uppercase">
											<span class="brk-sc-simple-card__price-old font__weight-light">$26.00</span>
											<span class="brk-sc-simple-card__price-currne font__weight-bold brk-white-font-color">$16.00</span>
											<a href="#" class="brk-sc-simple-card__link">
												<i class="far fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="brk-slider-cube__pagintaion">
						</div>
					</div>
				</div>
			</div>
		@endif
	</div>
	<div class="row" style="padding-top: 50px;">
		@if($market->count()>0)
			<div class="col-12 col-lg-8 col-xl-9 order-xs-2 order-lg-1">
				<div class="brs-sidebar__title">
					<h3 class="font__family-montserrat font__size-21 font__weight-bold line__height-22">Marketplace</h3>
				</div>
				<div class="brk-border-btw-sidebar_right">
					<div class="brk-sc-sorting" data-brk-library="component__widgets,jquerySlider,component__form">
						<div class="brk-sc-view-swiper col-view mr-20">
							<a href="http://dev.nikadevs.com/berserk-html/shop-components-list.html" class="brk-sc-view-swiper__btn">
								<i class="fas fa-bars font__size-14"></i>
							</a>
							<a href="http://dev.nikadevs.com/berserk-html/shop-components-grid.html" class="brk-sc-view-swiper__btn">
								<i class="fas fa-th font__size-14"></i>
							</a>
						</div>
						<span class="brk-dark-font-color brk-sc-sorting__label font__family-open-sans font__size-14 font__weight-normal line__height-14 mr-15">Sort by</span>
						<div class="brk-sc-sorting__sort-select d-inline brk-form-round mr-20">
							<select name="select">
								<option value="Option 1">Date </option>
								<option value="Option 2">Popular </option>
							</select>
						</div>
						<span class="brk-dark-font-color brk-sc-sorting__label font__family-open-sans font__size-14 font__weight-normal line__height-14 mr-15">Show</span>
						<div class="brk-sc-sorting__show-count d-inline brk-form-round mr-30">
							<select name="select1">
								<option value="Option 1">10</option>
								<option value="Option 2">40</option>
								<option value="Option 2">All</option>
							</select>
						</div>
						<div class="brk-sc-price-slider font__family-open-sans line__height-24 text-uppercase font__weight-bold">
							<label for="lowest">$</label>
							<input type="text" class="brk-sc-price-slider__input sliderValue font__size-14" id="lowest" data-index="0" value="150">
							<span class="font__family-open-sans font__size-14 line__height-24 font__weight-normal font__weight-bold mr-1">—</span>
							<label for="highest">$</label>
							<input type="text" class="brk-sc-price-slider__input sliderValue font__size-14" id="highest" data-index="1" value="600">
							<div class="brk-sc-price-slider__container" data-min-value="2" data-max-value="9000"></div>
						</div>
					</div>
					<div class="row">
						@foreach($market as $mark)
						<div class="col-12 col-md-6 col-xl-4">
							<div class="flip-box text-center" data-brk-library="component__flip_box,component__elements,fancybox">
								<div class="flip flip_vertical flip-box__split">
									<div class="flip__front">
										<div class="flip-box__split-img lazyload" data-bg="{{ asset('storage/'.$mark->imagen) }}"></div>
										<div class="pt-30 pb-30 flip-box__split-info">
											<div class="font__family-montserrat font__weight-bold pl-20 pr-20 font__size-15">
												{{$mark->nombre}}
											</div>
											<div class="brk-base-font-color font__family-montserrat font__size-17 font__weight-medium">
												<span class="font__weight-semibold">
													${{ number_format($mark->precio,2)}}
												</span>
											</div>
										</div>
									</div>
									<div class="flip__back lazyload" data-bg=" {{ asset('storage/'.$mark->imagen) }}">
										<div class="flip-box__split-overlay brk-base-bg-gradient-10deg"></div>
										<div class="flip-box__split-content">
											<div class="pt-lg-30 pb-lg-30 pt-sm-20 pb-sm-20 pt-xs-40 pb-xs-40 pt-20 pb-20 position-relative z-index-5">
												<a href="#">
													<h4 class="font__family-montserrat font__weight-bold font__size-18 line__height-24">
													{{$mark->nombre}}
													</h4>
												</a>
												<div class="flip-box__split-price font__family-montserrat font__size-15">
													<span class="font__weight-bold"></span>
													${{ number_format($mark->precio,2)}}
												</div>
											</div>
											<div class="flip-box__split-list">
												<p class="brk-white-font-color font__family-open-sans font__size-14 font__weight-light line__height-22 pt-15 pb-15">
												{{$mark->descripcion}}
												</p>
											</div>
											<div class="flip-box__split-actions">
												<a href="#" class="add-cart d-flex align-items-center justify-content-center">
													<i class="fas fa-shopping-cart"></i>
												</a>
												<a href="{{ asset('storage/'.$desc->imagen) }}" class="add-search d-flex align-items-center justify-content-center fancybox">
													<i class="fas fa-search"></i>
												</a>
												<a href="#" class="add-wishlist d-flex align-items-center justify-content-center">
													<i class="fas fa-star"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<div class="col-12">
							<div class="text-center mt-110 mb-80">
								<a href="#" class="icon__btn icon__btn-anim icon__btn-md icon__btn-invert">
									<span class="before"></span>
									<i class="fal fa-sync" aria-hidden="true"></i>
									<span class="after"></span>
									<span class="bg"></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-12 col-lg-4 col-xl-3 order-xs-1 order-lg-2">
				<div class="brs-sidebar brs-sidebar_right" data-brk-library="component__widgets">
					<div class="brs-sidebar__title">
						<h3 class="font__family-montserrat font__size-21 font__weight-bold line__height-22">Categories</h3>
					</div>
					<div class="brk-categories mb-20" data-brk-library="component__widgets">
						<div class="brk-categories__list font__family-open-sans font__size-14 font__weight-normal">
							<a href="#" class="brk-categories__item">
								<span class="brk-categories__item-name">General</span>
								<span class="brk-categories__item-count">12</span>
							</a>
							<a href="#" class="brk-categories__item active">
								<span class="brk-categories__item-name">Mockups</span>
								<span class="brk-categories__item-count">14</span>
							</a>
							<a href="#" class="brk-categories__item">
								<span class="brk-categories__item-name">HTML & CSS</span>
								<span class="brk-categories__item-count">18</span>
							</a>
							<a href="#" class="brk-categories__item">
								<span class="brk-categories__item-name">Logo</span>
								<span class="brk-categories__item-count">21</span>
							</a>
							<a href="#" class="brk-categories__item">
								<span class="brk-categories__item-name">Web Design</span>
								<span class="brk-categories__item-count">6</span>
							</a>
						</div>
					</div>
					<div class="brs-sidebar__title">
						<h3 class="font__family-montserrat font__size-21 font__weight-bold line__height-22">Filter</h3>
					</div>
					<div class="brk-color-filter mt-40 mb-45" data-brk-library="component__elements">
						<h3 class="brk-color-filter__title font__family-montserrat font__weight-bold font__size-14 line__height-14 text-uppercase text-center">
							<span class="brk-color-filter__title-text">color</span>
						</h3>
						<div class="brk-color-filter__container">
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-blue"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-green"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-cyan"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-yellow"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-orange"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-brown"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
							<a href="#" class="brk-color-filter__item">
								<span class="brk-color-filter__item-bg brk-bg-black"></span>
								<i class="fal fa-check brk-color-filter__item-icon"></i>
							</a>
						</div>
					</div>
					<div class="brk-brand-filter mb-30" data-brk-library="component__widgets">
						<h3 class="brk-brand-filter__title font__family-montserrat font__weight-bold font__size-14 line__height-14 text-uppercase text-center">
							<span class="brk-brand-filter__title-text">brand</span>
						</h3>
						<div class="brk-brand-filter__container">
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item active">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
							<a href="#" class="brk-brand-filter__item">
								<span class="font__family-montserrat font__size-14 font__weight-medium text-uppercase brk-brand-filter__logo-text">logo</span>
							</a>
						</div>
					</div>
					<div class="brs-sidebar__title">
						<h3 class="font__family-montserrat font__size-21 font__weight-bold line__height-22">Popular items</h3>
					</div>
					<div class="brk-slider-cube" data-brk-library="component__widgets,slider__swiper">
						<div class="brk-slider-cube__overlay"></div>
						<div class="brk-slider-cube__items swiper-container">
							<div class="swiper-wrapper" style="height: 290px !important;">
								<div class="swiper-slide">
									<div class="brk-sc-simple-card" data-brk-library="component__shop_cards">
										<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('img/shop/shop-win-5.png') }}" alt="alt" class="brk-sc-simple-card__img lazyload">
										<div class="brk-sc-simple-card__label brk-bg-primary">
											<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase">new</span>
											<span class="brk-sc-simple-card__label-left-top-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-left-bottom-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-bottom-angle"></span>
										</div>
										<div class="brk-sc-simple-card__price brk-bg-primary font__family-open-sans font__size-14 line__height-14 text-uppercase">
											<span class="brk-sc-simple-card__price-old font__weight-light">$26.00</span>
											<span class="brk-sc-simple-card__price-currne font__weight-bold brk-white-font-color">$16.00</span>
											<a href="#" class="brk-sc-simple-card__link">
												<i class="far fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="brk-sc-simple-card" data-brk-library="component__shop_cards">
										<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('img/shop/shop-win-1.jpg ') }}" alt="alt" class="brk-sc-simple-card__img lazyload">
										<div class="brk-sc-simple-card__label brk-bg-primary">
											<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase">new</span>
											<span class="brk-sc-simple-card__label-left-top-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-left-bottom-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-bottom-angle"></span>
										</div>
										<div class="brk-sc-simple-card__price brk-bg-primary font__family-open-sans font__size-14 line__height-14 text-uppercase">
											<span class="brk-sc-simple-card__price-old font__weight-light">$26.00</span>
											<span class="brk-sc-simple-card__price-currne font__weight-bold brk-white-font-color">$16.00</span>
											<a href="#" class="brk-sc-simple-card__link">
												<i class="far fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="brk-sc-simple-card" data-brk-library="component__shop_cards">
										<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('img/shop/shop-win-2.jpg') }}" alt="alt" class="brk-sc-simple-card__img lazyload">
										<div class="brk-sc-simple-card__label brk-bg-primary">
											<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase">new</span>
											<span class="brk-sc-simple-card__label-left-top-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-left-bottom-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-bottom-angle"></span>
										</div>
										<div class="brk-sc-simple-card__price brk-bg-primary font__family-open-sans font__size-14 line__height-14 text-uppercase">
											<span class="brk-sc-simple-card__price-old font__weight-light">$26.00</span>
											<span class="brk-sc-simple-card__price-currne font__weight-bold brk-white-font-color">$16.00</span>
											<a href="#" class="brk-sc-simple-card__link">
												<i class="far fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="brk-sc-simple-card" data-brk-library="component__shop_cards">
										<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('img/shop/shop-win-4.jpg') }}" alt="alt" class="brk-sc-simple-card__img lazyload">
										<div class="brk-sc-simple-card__label brk-bg-primary">
											<span class="brk-white-font-color font__family-montserrat font__size-13 font__weight-bold line__height-14 text-uppercase">new</span>
											<span class="brk-sc-simple-card__label-left-top-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-left-bottom-angle brk-bg-primary"></span>
											<span class="brk-sc-simple-card__label-bottom-angle"></span>
										</div>
										<div class="brk-sc-simple-card__price brk-bg-primary font__family-open-sans font__size-14 line__height-14 text-uppercase">
											<span class="brk-sc-simple-card__price-old font__weight-light">$26.00</span>
											<span class="brk-sc-simple-card__price-currne font__weight-bold brk-white-font-color">$16.00</span>
											<a href="#" class="brk-sc-simple-card__link">
												<i class="far fa-plus"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="brk-slider-cube__pagintaion">
						</div>
					</div>
				</div>
			</div>
		@endif
	<div>
</div>
@endsection