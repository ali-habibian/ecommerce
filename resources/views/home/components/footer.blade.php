<footer class="section-footer border-top padding-y">
    <div class="container">
        <section class="footer-top padding-y">
            <div class="row">
                <aside class="col-md">
                    <h6 class="title">شرکت</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#">خانه</a></li>
                        <li> <a href="#">درباره ما</a></li>
                        <li> <a href="#">فروشگاه</a></li>
                        <li> <a href="#">تماس با ما</a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Legal Stuff</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#">Refund Policy</a></li>
                        <li> <a href="#">Terms of Service</a></li>
                        <li> <a href="#">Privacy Policy</a></li>
                        <li> <a href="#">Open dispute</a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">حساب کاربری</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#"> ورود </a></li>
                        <li> <a href="{{ route('register') }}"> ثبت نام </a></li>
                        <li> <a href="#"> حساب من </a></li>
                        <li> <a href="#"> سفارش های من </a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">شبکه های اجتماعی</h6>
                    <ul class="list-unstyled">
                        <li><a href="#"> <i class="fab fa-facebook"></i>
                                Facebook </a></li>
                        <li><a href="#"> <i class="fab fa-twitter"></i>
                                Twitter </a></li>
                        <li><a href="#"> <i class="fab fa-instagram"></i>
                                Instagram </a></li>
                        <li><a href="#"> <i class="fab fa-whatsapp"></i>
                                WhatsApp </a></li>
                    </ul>
                </aside>
            </div> <!-- row.// -->
        </section> <!-- footer-top.// -->

        <section class="footer-bottom border-top row">
            <div class="col-md-2">
                <p class="text-muted"> &copy {{ date('Y') }} {{ config('settings.general.legal_name') }} </p>
            </div>
            <div class="col-md-8 text-md-center">
                <span class="px-2">{{ config('settings.general.contact_email') }}</span>
                <span class="px-2">{{ config('settings.general.phone') }}</span>
            </div>
            <div class="col-md-2 text-md-right text-muted">
                <i class="fab fa-lg fa-cc-visa"></i>
                <i class="fab fa-lg fa-cc-paypal"></i>
                <i class="fab fa-lg fa-cc-mastercard"></i>
            </div>
        </section>
    </div>
</footer>
