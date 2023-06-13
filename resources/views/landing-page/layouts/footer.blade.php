@php
    use Carbon\Carbon;
    use App\Models\Profil;

    $profil = Profil::first();
@endphp
<!-- FOOTER START -->
<footer>
    <!-- Footer-area start -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer">
                        <h3 class="footer-title  title-border">Kontak Kami</h3>
                        <ul class="footer-contact">
                            <li><span>Alamat :</span>{{$profil->alamat}}</li>
                            <li><span>No. HP :</span>{{$profil->no_hp}}</li>
                            <li><span>Email :</span>{{$profil->email}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="single-footer">
                        <h3 class="footer-title  title-border">Halaman</h3>
                        <ul class="footer-menu">
                            <li><a href="{{ route('beranda') }}"><i class="zmdi zmdi-dot-circle"></i>Beranda</a></li>
                            <li><a href="{{ route('perusahaan') }}"><i class="zmdi zmdi-dot-circle"></i>Perusahaan</a></li>
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>E-Commerce</a></li>
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>E-Learning</a></li>
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Produk</a></li>
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Blog</a></li>
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-area end -->
    <!-- Copyright-area start -->
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p class="mb-0">&copy; <a href=" https://razenteknologi.com/" target="_blank"> {{$profil->pt}}  </a> {{Carbon::now()->year}}. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright-area start -->
</footer>
<!-- FOOTER END -->
