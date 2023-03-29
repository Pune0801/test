@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar producto') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.update', $producto->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nombre"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text"
                                        class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                        value="{{ $producto->nombre }}" required autocomplete="nombre" autofocus>

                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                                <div class="col-md-6">
                                    <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required>{{ $producto->descripcion }}</textarea>

                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="moneda"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Moneda') }}</label>

                                <div class="col-md-6">
                                    <select id="moneda" class="form-control @error('moneda') is-invalid @enderror"
                                        name="moneda" required>
                                        <option value="ARS" @if ($producto->moneda == 'ARS') selected @endif>ARS
                                        </option>
                                        <option value="USD" @if ($producto->moneda == 'USD') selected @endif>USD
                                        </option>
                                    </select>

                                    @error('moneda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="precio"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                                <div class="col-md-6">
                                    <input id="precio" type="number"
                                        class="form-control @error('precio') is-invalid @enderror" name="precio"
                                        value="{{ $producto->precio }}" required min="0" step="0.01">

                                    @error('precio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="imagen"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                                <div class="col-md-6">
                                    <input id="imagen" type="file"
                                        class="form-control @error('imagen') is-invalid @enderror" name="imagen">

                                    @error
                                        @extends('layouts.app')

                                        @section('content')
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8">
                                                        <div class="card">
                                                            <div class="card-header">{{ __('Editar producto') }}</div>

                                                            <div class="card-body">
                                                                <form method="POST"
                                                                    action="{{ route('productos.update', $producto->id) }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="form-group row">
                                                                        <label for="nombre"
                                                                            class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                                                        <div class="col-md-6">
                                                                            <input id="nombre" type="text"
                                                                                class="form-control @error('nombre') is-invalid @enderror"
                                                                                name="nombre" value="{{ $producto->nombre }}"
                                                                                required autocomplete="nombre" autofocus>

                                                                            @error('nombre')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="descripcion"
                                                                            class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                                                                        <div class="col-md-6">
                                                                            <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required>{{ $producto->descripcion }}</textarea>

                                                                            @error('descripcion')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="moneda"
                                                                            class="col-md-4 col-form-label text-md-right">{{ __('Moneda') }}</label>

                                                                        <div class="col-md-6">
                                                                            <select id="moneda"
                                                                                class="form-control @error('moneda') is-invalid @enderror"
                                                                                name="moneda" required>
                                                                                <option value="ARS"
                                                                                    @if ($producto->moneda == 'ARS') selected @endif>
                                                                                    ARS</option>
                                                                                <option value="USD"
                                                                                    @if ($producto->moneda == 'USD') selected @endif>
                                                                                    USD</option>
                                                                            </select>

                                                                            @error('moneda')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="precio"
                                                                            class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                                                                        <div class="col-md-6">
                                                                            <input id="precio" type="number"
                                                                                class="form-control @error('precio') is-invalid @enderror"
                                                                                name="precio" value="{{ $producto->precio }}"
                                                                                required min="0" step="0.01">

                                                                            @error('precio')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="imagen"
                                                                            class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                                                                        <div class="col-md-6">
                                                                            <input id="imagen" type="file"
                                                                                class="form-control @error('imagen') is-invalid @enderror"
                                                                                name="imagen">

                                                                            @error
                                                                                <div class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </div>
                                                                            @enderror
                                                                            @if ($producto->imagen)
                                                                                <div class="mt-2">
                                                                                    <img src="{{ asset('storage/' . $producto->imagen) }}"
                                                                                        alt="{{ $producto->nombre }}"
                                                                                        style="max-height: 200px;">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row mb-0">
                                                                        <div class="col-md-6 offset-md-4">
                                                                            <button type="submit" class="btn btn-primary">
                                                                                {{ __('Actualizar') }}
                                                                            </button>
                                                                            <a href="{{ route('productos.index') }}"
                                                                                class="btn btn-secondary">
                                                                                {{ __('Cancelar') }}
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endsection
