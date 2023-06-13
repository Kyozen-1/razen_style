<!doctype html>
<html class="no-js" lang="en">
	<head>
		@include('landing-page.layouts.head')
	</head>
	<body>
		<!-- WRAPPER START -->
		<div class="wrapper">

			@include('landing-page.layouts.header')

            @yield('content')

			@include('landing-page.layouts.footer')
			<!-- QUICKVIEW PRODUCT -->
			<div id="quickview-wrapper">
                <!-- Modal -->
                <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-product">
                                        <div class="product-images">
                                            <div class="main-image images">
                                                <img id="modal-img" alt="#" src="img/product/quickview-photo.jpg"/>
                                            </div>
                                        </div><!-- .product-images -->

                                        <div class="product-info">
                                            <h1 id="modal-nama">Aenean eu tristique</h1>
                                            <div class="price-box-3">
                                                <hr />
                                                    <div class="s-price-box">
                                                        <span class="new-price" id="modal-harga">$160.00</span>
                                                    </div>
                                                <hr />
                                            </div>
                                            <a href="{{ route('produk') }}" class="see-all">Lihat semua produk</a>
                                            <div class="quick-add-to-cart">
                                                <form class="cart">
                                                    <a href="" class="btn rounded waves-effect waves-light border text-white" style="background: #434343;" id="modal-link">Cek Toko</a>
                                                </form>
                                            </div>
                                            <div class="quick-desc" id="modal-deskripsi">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                            </div>
                                            {{-- <div class="social-sharing">
                                                <div class="widget widget_socialsharing_widget">
                                                    <h3 class="widget-title-modal">Share this product</h3>
                                                    <ul class="social-icons">
                                                        <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="zmdi zmdi-google-plus"></i></a></li>
                                                        <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="zmdi zmdi-twitter"></i></a></li>
                                                        <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="zmdi zmdi-facebook"></i></a></li>
                                                        <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                        </div><!-- .product-info -->
                                    </div><!-- .modal-product -->
                                </div><!-- .modal-body -->
                            </div><!-- .modal-content -->
                        </div><!-- .modal-dialog -->
                </div>
                <!-- END Modal -->
			</div>
			<!-- END QUICKVIEW PRODUCT -->

		</div>
		<!-- WRAPPER END -->
        @include('landing-page.layouts.js')
        @include('sweetalert::alert')
	</body>
</html>
