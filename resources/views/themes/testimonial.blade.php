<section id="testimonials" class="py-5 text-center">
    <div class="container">
        <h6 style="color:var(--accent); font-weight:bold;">TESTIMONIALS</h6>
        <h2 class="fw-bold mb-5">Happy Clients</h2>

        <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                @if($user->testimonials && $user->testimonials->isNotEmpty() )
                    @foreach($user->testimonials as $index=>$testimonial)
                        @if($testimonial->status == "accept")
                            <div class="carousel-item {{ $index == 0 ? "active" : "" }}">
                                <div class="hero-card p-5 mx-auto" style="max-width:700px;">

                                    <div class="mb-3 text-warning">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $testimonial->evaulation)

                                                <i class="fa-solid fa-star"></i>
                                            @else

                                                <i class="fa-regular fa-star text-secondary opacity-25"></i>
                                            @endif
                                        @endfor
                                    </div>

                                    <p class="lead fst-italic opacity-75">
                                        “{{ $testimonial->message }}”
                                    </p>
                                    <h6 class="mt-4 fw-bold">{{ $testimonial->name }}</h6>

                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    Not Have Any Review
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"
                          style="width: 20px; height: 20px; background-size: 50%;"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"
                      style="width: 20px; height: 20px; background-size: 50%;"></span>
            </button>
        </div>
    </div>
</section>
