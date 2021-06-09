@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('title') 
Условия возврата товара
@endsection
@section('seo-desc')
Для возврата товара продавцу он должен соответствовать изначальным характеристикам, то есть сохранить товарный вид и свойства на момент возврата.
@endsection
@section('seo-keywords') 
возврата Условия товара
@endsection
@section('content')
  <section>
    <div class="container mt-3 mb-5 px-0">
      <div class="bg-white p-0 p-sm-3">
        <div class="container">
          <div class="text-center position-relative post-line">
            <h3 class="text-danger h3 font-weight-bold mb-4">Условия возврата товара</h3>
          </div>
          <div class="content mt-3 pb-5 pb-lg-0 ">
            <p class="text-justify">
              Для возврата товара продавцу он должен соответствовать изначальным характеристикам, то есть сохранить товарный вид и свойства на момент возврата.
            </p>
          <p class="text-justify">
            Товар надлежащего качества:
            <ol>
              <li>имеет товарный вид и фирменную упаковку;</li>
              <li> Не был в эксплуатации;</li>
              <li>В полной комплектации сложен в упаковку таким же образом, как при получении</li>
            </ol>
          </p>
          <p class="text-justify">
            Товар с недостатками, требующий гарантийного ремонта:
            <ol>
              <li>Имеет дефект, подтвержденный при осмотре;</li>
              <li>Дефект является производственным браком;</li>
              <li>Внешние механические повреждения (царапины, вмятины, сколы и пр.) возникли до передачи вам товара;</li>
              <li>Недостатки не являются следствием неправильного использования товара</li>
              <li>Дефект выявлен в пределах гарантийного срока;</li>
              <li>Вы не пытались ремонтировать товар самостоятельно.</li>
            </ol>
          </p>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
