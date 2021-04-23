<x-app-layout>
    <!-- ======= Support Section ======= -->
    <div id="contact" class="contact mt-8">

        <div class="container">

            <header class="section-header">
                <h2>Contact</h2>
            </header>

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>A108 Adam Street,<br>New York, NY 535022</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>info@example.com<br>contact@example.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form method="POST" action="{{route('support.store')}}">
                        @csrf

                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label>
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                           value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-red-500"> {{ $message }}</span>
                                    @enderror
                                </label>
                            </div>

                            <div class="col-md-6 ">
                                <label>
                                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                                </label>
                            </div>

                            <div class="col-md-12">
                                <label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                </label>
                            </div>

                            <div class="col-md-12">
                                <label class="w-100">
                                    <textarea class="form-control" name="message" rows="6"
                                              placeholder="Message"></textarea>
                                </label>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit">Send Message</button>
                                @if (session('message'))
                                    <p class="text-green-500">
                                        {{ session('message') }}
                                    </p>
                                @endif
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
    <!-- End Support Section -->
</x-app-layout>
