@extends('layouts.app')
@extends('layouts.header')
@section('title')
    Список магазинов
@endsection
@extends('layouts.footer')
@section('content')
<div class="container pb-5 pb-md-0 pl-lg-0">
    <form class="store__searchBar position-relative mt-3" onsubmit="event.preventDefault();">
        <input class="w-100" type="text" placeholder="Поиск Магазинов" id="search" data-item="stores" >
        <button class="position-absolute">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M8.55295 17.105C10.4506 17.1046 12.2936 16.4694 13.7884 15.3004L18.4883 20L20 18.4883L15.3002 13.7888C16.4698 12.2938 17.1054 10.4505 17.1059 8.55249C17.1059 3.83686 13.2688 0 8.55295 0C3.83707 0 0 3.83686 0 8.55249C0 13.2681 3.83707 17.105 8.55295 17.105ZM8.55295 2.13812C12.0907 2.13812 14.9677 5.01497 14.9677 8.55249C14.9677 12.09 12.0907 14.9669 8.55295 14.9669C5.01523 14.9669 2.13824 12.09 2.13824 8.55249C2.13824 5.01497 5.01523 2.13812 8.55295 2.13812Z" fill="#FF206A"/>
            </svg>
        </button>
    </form>
    <h5 class="allStore__title mt-3">Список магазинов:</h5>
    <div id="stores" class="row  row-cols-2 row-cols-md-3 row-cols-lg-5 allStore__cards endless-pagination pb-4" data-next-page="{{ $stores->nextPageUrl() }}">
        @foreach ($stores as $store)
            <div class="col card__item mt-3 position-relative">
                <img class="mw-100" src="/storage/{{ $store->avatar ?? 'theme/avatar_store.svg' }}">
                <div class="card__body text-center mt-3">
                    <h3>{{ $store->name }}</h3>
                    <span class="text-pinky">Товаров: {{ $store->product->where('product_status_id', 2)->count() }}</span>
                </div>
                <a href="{{ route('ft-store.guest', ['slug' => $store->slug]) }}" class="stretched-link"></a>
            </div>
        @endforeach
    </div>
    <div id="noneStore"></div>
</div>
@endsection
@section('script')
<script>
    $(window).scroll(fetchPosts)

    var old_page = '';
    function fetchPosts() {
        // var url = $(location).attr('href')
        var page = $('.endless-pagination').data('next-page')
        if (page !== null && page !== '' && !page.substring(0, 5).includes('null&')) {
            clearTimeout($.data(this, 'scrollCheck'))

            $.data(
                this,
                'scrollCheck',
                setTimeout(function() {
                    $('#scroll-spinner').removeClass('d-none')

                    var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 500
                    if (scroll_position_for_posts_load >= $(document).height()) {
                        var style = $('#catProducts .row').attr('data-style')
                        if(old_page != page){
                            $.get(page, { style: style }, function(data) {
                                $('.endless-pagination').append(data.posts)
                                $('.endless-pagination').data('next-page', data.next_page)
                                $('#scroll-spinner').addClass('d-none')
                            })
                            old_page = page;
                        }
                    }
                }, 200)
            )
        }
    }
</script>
@endsection
