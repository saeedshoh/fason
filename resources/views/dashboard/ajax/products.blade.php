<div class="table-responsive">
  <table class="table table-sm table-hover table-nowrap card-table">
    <thead>
      <tr>
        <th>
          <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-order">№</a>
        </th>
        <th>
          <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-name">Название</a>
        </th>
        <th>
          <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-total">Цена</a>
        </th>
        <th>
          <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-margin">Маржа</a>
        </th>
        <th>
          <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-category">Категория</a>
        </th>
        <th>
          <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-city">Город</a>
        </th>
        <th>
          <a href="javascript:void(0);" class="text-muted list-sort" data-sort="item-date">Дата</a>
        </th>
        <th>
          <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-quantity">Кол/Во</a>
        </th>
        <th>
          <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-company">Магазин</a>
        </th>
        <th>
          <a href="javascript:void(0);" class="list-sort text-muted" data-sort="item-status">Статус</a>
        </th>
        <th></th>
      </tr>
    </thead>
    <tbody class="list">
      @forelse ($products as $key => $product)
      <tr class="table-@if($product->product_status->id == 4)info @elseif(!$product->store)secondary @elseif($product->deleted_at)danger @elseif($product->product_status->id == 5)primary @elseif($product->product_status->id == 1)warning @elseif($product->product_status->id == 2)success @elseif($product->product_status->id == 3)light @endif">
        <td class="item-order py-0">
            #{{ $product->id }}
        </td>
        <td class="item-name py-0">
          <span class="item-name text-reset">{{ $product->name }}</span>
        </td>
        <td class="item-total py-0">
          {{ $product->price }}
        </td>
        <td class="item-category py-0">
          <span class="item-name text-reset">{{ $product->price_after_margin}}</span>
        </td>
        <td class="item-category py-0">
          <span class="item-name text-reset">{{ $product->category->name }}</span>
        </td>
        <td class="item-city py-0">
          <span class="item-name text-reset">г. {{ $product->store->city->name }}</span>
        </td>
        <td class="item-date py-0">
          <!-- Time -->
          <time datetime="2018-07-30">{{ $product->created_at->format('d/m/Y') }}</time>
        </td>
        <td class="item-quantity py-0">
          <!-- Badge -->
          {{ $product->quantity }}
        </td>
        <td class="item-company py-0">
          <a class="item-name text-reset" href="{{ route('showStoreInfo', $product->no_scope_store->id) }}">{{ $product->no_scope_store->name }}</a>
        </td>
        <td class="item-status py-0">
          <!-- Badge -->
          <div class="badge badge-primary">
              @if($product->store->is_active == 0)
                  Магазин отключен
              @elseif($product->updated_at < now()->subWeek())
                  Скрыто
              @elseif($product->quantity < 1)
                  Нет в наличии
              @elseif($product->deleted_at)
                Удаленный
              @else
                  {{ $product->product_status->name }}
              @endif
          </div>
        </td>
        <td class="text-right py-0">

            @permission('update-products')
              @if($product->store)
                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary m-1 pull-right">
                    <i class="fe fe-edit"></i>
                </a>
              @endif
            @endpermission
        </td>
      </tr>
      @empty
      <tr>
          <td class="text-muted h4" colspan="7">
              <span>Данные отсутствуют </span>
          </td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="card-footer d-flex justify-content-center">
  <nav>
    {{ $products->links() }}
  </nav>
</div>