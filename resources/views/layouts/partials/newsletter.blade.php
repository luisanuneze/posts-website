<footer id="footer" class="footer my-8">
    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h4>Our Newsletter</h4>
                    <p>Join us, enter your email address.</p>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('subscriptions.store') }}" method="POST">
                        @csrf
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
