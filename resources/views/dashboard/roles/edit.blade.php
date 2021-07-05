@extends('dashboard.layouts.app')
@section('title', 'Пользователи')
@extends('dashboard.layouts.aside')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">

        <!-- Header -->
        <div class="header mt-md-5">
          <div class="header-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  роль
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  {{ $role->display_name }}
                </h1>

              </div>
            </div>
          </div>
        </div>

        <div class="card">
            <div class="card-body">

              <!-- Form -->
              <form method="POST" action="{{ route('roles.update', ['id' => $role->id]) }}">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="name">Введите название</label>
                  <input type="text" class="form-control" id="name" placeholder="Введите название" name="name" value="{{ $role->name }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="display_name">Введите отображаемое название</label>
                    <input type="text" class="form-control" id="display_name" placeholder="Введите название" name="display_name" value="{{ $role->display_name }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="description">Введите описание</label>
                    <textarea class="form-control" id="description" placeholder="Введите название" name="description" autocomplete="off"> {{ $role->description }}
                    </textarea>
                </div>
                <div class="header mt-md-2 mb-1">
                    <div class="header-body">

                      <!-- Title -->
                      <h2 class="header-title">
                        Права для ролей
                      </h2>

                    </div>
                  </div>
                <div class="checklist row px-3" tabindex="0">

                    @foreach ($permissions as $chunk)
                        @foreach ($chunk as $permission)
                            <div class="custom-control custom-checkbox checklist-control col-4 mt-3" tabindex="0">
                                <input class="custom-control-input" @foreach ($role->permissions as $perm) @if($permission->id == $perm->id)checked @endif @endforeach id="checklist-{{ $permission->id }}" type="checkbox" name="permission[]" value="{{ $permission->id }}">
                                <label class="custom-control-label" for="checklist-{{ $permission->id }}"></label>
                                <span class="custom-control-caption">
                                    {{ $permission->display_name }}
                                </span>
                            </div>
                        @endforeach
                        <div class="w-100 my-4"></div>
                    @endforeach

                  </div>
                <!-- Button -->
                <button type="submit" class="btn btn-primary mt-5 float-right">Изменить</button>
              </form>

            </div>
          </div>
      </div>
    </div> <!-- / .row -->
  </div>
  @endsection
