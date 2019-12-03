<div class="scroll-container">
    <div class="carousel">
        @isset ($title)
            <div class="section-title">
                <h1>{{ $title }}</h1>
            </div>
        @endif
        <div class="carousel-container">
            <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                <ul style="left: -1030px; top: 0px;">
                    @foreach ($items as $book)
                        <li>
                            <div class="carousel-thumb">
                                <a href="{{  $book->url }}">
                                    <span class="overlay">
                                        <p>
                                            {{ $book->title }}
                                            ({{ date_format(date_create($book->pubdate), 'Y') }})
                                            - {{ $book->authors->pluck('name')->implode(', ') }}
                                        </p>
                                    </span>
                                    <img src="{{ url('images/loading.svg') }}" data-src="{{ $book->cover(200) }}" style="width:180px;height:270px">
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="carousel-prev" data-jcarouselcontrol="true"></div>
            <div class="carousel-next" data-jcarouselcontrol="true"></div>
        </div>
    </div>
</div>