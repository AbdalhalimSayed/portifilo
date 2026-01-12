<section id="contact" class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-5" data-aos="fade-up">
                <div class="hero-card p-4 h-100">
                    <h3>Let's Work Together</h3>
                    <p class="opacity-75">Have a project in mind? Send me a message and I'll get back to you within 24
                        hours.</p>
                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-25 p-3 me-3 text-primary"><i
                                    class="fa-solid fa-envelope"></i></div>
                            <div class="text-start">
                                <small class="d-block opacity-75">Email</small>
                                <strong>{{ $user->email }}</strong>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-success bg-opacity-25 p-3 me-3 text-success"><i
                                    class="fa-brands fa-whatsapp"></i></div>
                            <div class="text-start">
                                <small class="d-block opacity-75">Phone</small>
                                <strong>{{ $user->phone }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                <div class="hero-card p-4 p-md-5 h-100">
                    <form action="{{ route("message") }}" method="POST">
                        @session("success")
                        <p class="text-success">{{ $value }}</p>
                        @endsession
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small opacity-75">Name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                       placeholder="John Doe" required>
                                @error('name')
                                <b class="text-danger small">*{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-75">Email</label>
                                <input class="form-control" name="email" value="{{ old('email') }}" type="email"
                                       placeholder="name@example.com"
                                       required>
                                @error('email')
                                <b class="text-danger small">*{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label small opacity-75">Message</label>
                                <textarea class="form-control" name="message" rows="5"
                                          placeholder="Tell me about your project..."
                                          required>{{ old("message") }}</textarea>
                                @error('message')
                                <b class="text-danger small">*{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label class="form-label small opacity-75 ">Rating</label>

                                <select name="evaulation" class="form-control ">
                                    <option value="" class="text-muted">Select Rating...</option>
                                    <option value="5">⭐⭐⭐⭐⭐ (5/5 Excellent)</option>
                                    <option value="4">⭐⭐⭐⭐ (4/5 Very Good)</option>
                                    <option value="3">⭐⭐⭐ (3/5 Good)</option>
                                    <option value="2">⭐⭐ (2/5 Fair)</option>
                                    <option value="1">⭐ (1/5 Poor)</option>
                                </select>

                                @error('evaulation')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-cta w-100 py-3" type="submit">Send Message <i
                                        class="fa-solid fa-paper-plane ms-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
