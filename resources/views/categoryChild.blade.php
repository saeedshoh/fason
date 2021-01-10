<div id="subcategories" class="categories-site_products col-12 col-lg-4 px-0 order-1 order-lg-0">
    <a id="prevCategory" href="#" class="mt-5 mx-2" data-id="{{ $categories->pluck('id')->first() }}"> <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18 6.52686H3.74194L8.91593 1.37602L7.53372 0L0 7.5L7.53372 15L8.91593 13.624L3.74194 8.47314H18V6.52686Z" fill="#FF0055"/>
        </svg>  <span class="ml-2"> Назад</span>
    </a>
    <h5 class="text-center">{{ $name }}</h5>
    <ul class="shop-subject list-group list-group-flush h-100">
      @foreach ($categories as $category)
        <li class="list-group-item  bg-transparent  d-flex justify-content-between align-items-center">
            <a data-id="{{ $category->id }}" href="{{ route('ft-category.category', $category->slug) }} " class="text-decoration-none text-secondary childCategory"><img src="storage/{{ $category->icon }}" height="20" width="20" alt="" class="rounded-11"> {{ $category->name }}
              <div class="cat_spinner">
                Всего товаров: 
              </div>
            </a>
            {{--  <span data-id="{{ $category->id }}" class="badge badge-danger badge-pill childCategory">{{ $category->products->count() }}</span>  --}}
            {{-- <div class="spinner-grow text-center text-danger float-right" role="status"></div> --}}
        </li>
      @endforeach
    </ul>
</div>
