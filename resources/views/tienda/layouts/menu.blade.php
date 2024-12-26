<div class="brk-header__main-bar brk-header_border-bottom order-lg-2 order-1" style="height: 72px;">
			<div class="container-fluid">
				<div class="row no-gutters align-items-center">
					<div class="col-lg-auto align-self-lg-stretch d-none d-lg-block">
						<div class="brk-open-top-bar brk-header__item">
							<div class="brk-open-top-bar__circle"></div>
							<div class="brk-open-top-bar__circle"></div>
							<div class="brk-open-top-bar__circle"></div>
						</div>
					</div>
					<div class="col-lg align-self-lg-stretch">
						<nav class="brk-nav brk-header__item">
							<ul class="brk-nav__menu">
								<li class="brk-nav__children brk-nav__full-width {{request()->is(['tienda']) ? 'active' : ''}}">
									<a href="{{route('tiendahome.app')}}" data-brk-library="component__tabs">
										<span>Home</span>
									</a>
								</li>
								@foreach ($categorias as $cat)
								<li class="brk-nav__children brk-nav__drop-down-effect">
									<a href="{{route('tienda.app', $cat->nombre)}}">
										<span>{{$cat->nombre}}</span>
									</a>
									@if($cat->establecimientos->count() > 0)
										<ul class="brk-nav__sub-menu brk-nav-drop-down font__family-montserrat">
										@foreach ($cat->establecimientos as $establecimiento)
											<li class="dd-effect">
												<a href="blog.html">{{$establecimiento->nombre}}</a>
											</li>
										@endforeach
										</ul>
									@endif
								</li>
								@endforeach
							</ul>
						</nav>
					</div>
					<div class="col-lg-2 align-self-lg-center d-none d-lg-block">
						<div class="text-center">
							<a href="/" class="brk-header__logo brk-header__item @@modifier">
								<img class="brk-header__logo-1 lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/logo.svg" alt="alt">
								<img class="brk-header__logo-2 lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/logo-dark.svg" alt="alt">
							</a>
						</div>
					</div>
					<div class="col-lg-5 align-self-lg-stretch text-lg-right">
						<div class="brk-header__title font__family-montserrat font__weight-bold">My Shop</div>
						<div class="brk-call-us brk-header__item">
							<a href="tel:88001234567" class="brk-call-us__number"><i class="fa fa-phone" aria-hidden="true"></i> 8 800 12 34 567</a>
							<a href="tel:88001234567" class="brk-call-us__link"><i class="fa fa-phone" aria-hidden="true"></i></a>
						</div>
						{{--
							<div class="brk-lang brk-header__item">
							<span class="brk-lang__selected">US <i class="fa fa-caret-down" aria-hidden="true"></i></span>
							<span class="brk-lang__open"><i class="fa fa-language"></i> Language <span class="brk-lang__active-lang text-white brk-bg-primary">US</span></span>
							<ul class="brk-lang__option">
								<li><a href="#">UA</a></li>
								<li><a href="#">US</a></li>
								<li><a href="#">PL</a></li>
								<li><a href="#">ES</a></li>
							</ul>
						</div>
						--}}
						<div class="brk-mini-cart brk-header__item">
							<a href="cart.html" class="brk-mini-cart__open d-flex">
								<i class="fa fa-shopping-basket" aria-hidden="true"></i>
								<span class="brk-mini-cart__label font__family-montserrat font__weight-medium text-uppercase letter-spacing-60 font__size-10 opacity-80">My cart</span>
								<span class="brk-mini-cart__title">Shopping Cart</span>
								<span class="brk-mini-cart__count">4</span>
							</a>
							<div class="brk-mini-cart__menu">
								<div class="brk-mini-cart__header">
									<span class="font__family-montserrat font__weight-bold font__size-18">Your Cart</span>
								</div>
								<div class="brk-mini-cart__products">
									<div class="brk-mini-cart__product">
										<div class="brk-mini-cart__product--img">
											<img class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/shop/shop-setout-2.png" alt="alt">
										</div>
										<div class="brk-mini-cart__product--title-price">
											<a href="#">
												<h4 class="font__family-montserrat font__size-16 line__height-21 font__weight-semibold text-truncate">Some shop item</h4>
											</a>
											<span class="brk-mini-cart__product--old-price font__family-montserrat">$26.00</span>
											<span class="brk-mini-cart__product--price font__family-montserrat">$16.00</span>
										</div>
										<div class="brk-quantity">
											<span class="brk-quantity__arrows minus"></span>
											<input class="brk-quantity__value" name="quantity" type="text" value="2">
											<span class="brk-quantity__arrows plus"></span>
										</div>
										<a href="#" class="brk-mini-cart__product--remove remove"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
									</div>
									<div class="brk-mini-cart__product">
										<div class="brk-mini-cart__product--img">
											<img class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/shop/shop-setout-2.png" alt="alt">
										</div>
										<div class="brk-mini-cart__product--title-price">
											<a href="#">
												<h4 class="font__family-montserrat font__size-16 line__height-21 font__weight-semibold text-truncate">Some shop item</h4>
											</a>
											<span class="brk-mini-cart__product--old-price font__family-montserrat">$26.00</span>
											<span class="brk-mini-cart__product--price font__family-montserrat">$16.00</span>
										</div>
										<div class="brk-quantity">
											<span class="brk-quantity__arrows minus"></span>
											<input class="brk-quantity__value" name="quantity" type="text" value="2">
											<span class="brk-quantity__arrows plus"></span>
										</div>
										<a href="#" class="brk-mini-cart__product--remove remove"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
									</div>
									<div class="brk-mini-cart__product">
										<div class="brk-mini-cart__product--img">
											<img class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/shop/shop-setout-2.png" alt="alt">
										</div>
										<div class="brk-mini-cart__product--title-price">
											<a href="#">
												<h4 class="font__family-montserrat font__size-16 line__height-21 font__weight-semibold text-truncate">Some shop item</h4>
											</a>
											<span class="brk-mini-cart__product--old-price font__family-montserrat">$26.00</span>
											<span class="brk-mini-cart__product--price font__family-montserrat">$16.00</span>
										</div>
										<div class="brk-quantity">
											<span class="brk-quantity__arrows minus"></span>
											<input class="brk-quantity__value" name="quantity" type="text" value="2">
											<span class="brk-quantity__arrows plus"></span>
										</div>
										<a href="#" class="brk-mini-cart__product--remove remove"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
									</div>
									<div class="brk-mini-cart__product">
										<div class="brk-mini-cart__product--img">
											<img class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/shop/shop-setout-2.png" alt="alt">
										</div>
										<div class="brk-mini-cart__product--title-price">
											<a href="#">
												<h4 class="font__family-montserrat font__size-16 line__height-21 font__weight-semibold text-truncate">Some shop item</h4>
											</a>
											<span class="brk-mini-cart__product--old-price font__family-montserrat">$26.00</span>
											<span class="brk-mini-cart__product--price font__family-montserrat">$16.00</span>
										</div>
										<div class="brk-quantity">
											<span class="brk-quantity__arrows minus"></span>
											<input class="brk-quantity__value" name="quantity" type="text" value="2">
											<span class="brk-quantity__arrows plus"></span>
										</div>
										<a href="#" class="brk-mini-cart__product--remove remove"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
									</div>
								</div>
								<div class="brk-mini-cart__links">
									<div class="brk-mini-cart__links--wrap">
										<a class="brk-mini-cart__links--cart" href="cart.html"><i class="fa fa-shopping-basket"></i> Cart</a>
										<a class="brk-mini-cart__links--checkout" href="checkout.html">Proceed to checkout <i class="far fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="brk-social-links brk-header__item">
							<div class="brk-social-links__open">
								<i class="fa fa-share-alt"></i>
								<div class="brk-social-links__title">Share our website</div>
							</div>
							<div class="brk-social-links__block">
								<div class="brk-social-links__header">
									<span class="font__family-montserrat font__weight-bold font__size-18">Share our website</span>
								</div>
								<div class="brk-social-links__content">
									<a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
									<a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
									<a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
									<a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
									<a href="#"><i class="fab fa-vimeo-square" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
						<div class="brk-search brk-header__item">
							<div class="brk-search__open">
								<i class="fa fa-search" aria-hidden="true"></i>
								<div class="brk-search__title">Search website</div>
							</div>
							<div class="brk-search__block">
								<div class="brk-search__header">
									<span class="font__family-montserrat font__weight-bold font__size-18">Search</span>
								</div>
								<form class="brk-search__form" role="search" method="get" action="#">
									<input name="s" maxlength="50" type="search" value="" placeholder="Enter search text">
									<button type="submit"><i class="fas fa-search"></i></button>
								</form>
								<span class="brk-search__close font__family-montserrat font__weight-medium">Close <i class="fas fa-times"></i></span>
							</div>
						</div>
						{{--
							<div class="brk-info-menu-open brk-info-menu-open_skin-1 brk-header__item">
							<span class="brk-lines">
								<span class="brk-center-line"></span>
							</span>
							<div class="brk-info-menu-open__title">Side Menu</div>
						</div>
						--}}
					</div>
				</div>
			</div>
		</div>