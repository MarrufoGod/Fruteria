<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0abf574f5b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
  <script>
    function eliminarProducto(url) {
        window.location.href = url;
    }
</script>
<div>
    @if (session('Correcto'))
        <div class="alert alert-success">{{ session('Correcto') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
</div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Modal para Insertar -->
                    <div class="modal fade" id="insertarproducto" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar
                                        Producto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('create') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">ID_producto</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtidproducto">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtnombre">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtdescripcion">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Precio_compra</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtprecompra">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Precio_venta</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtpreventa">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1"
                                                class="form-label">Unidad_medida</label>
                                            <select class="form-select" id="exampleInputEmail1"
                                                name="txtunidad">
                                                <option value="Javas">Javas</option>
                                                <option value="Kilogramo">Kilogramo (kg)</option>
                                                <option value="Sacos">Sacos</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">cantidad</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtcantidad">
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoria"
                                                class="form-label">Categoria</label>
                                            <select class="form-select" id="categoria"
                                                name="txtcantegoria">
                                                <option value="verduras">Verduras</option>
                                                <option value="jugos">Tuberculos</option>
                                                <option value="Frutos Secos">Frutos Secos</option>
                                                <option value="Frutas">Frutas</option>
                                                <option value="Vegetales">Vegetales</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="proveedorSelect" class="form-label">Seleccionar Proveedor:</label>
                                            <select class="form-select" id="proveedorSelect" name="txtproveedor">
                                                @foreach($proveedores as $proveedor)
                                                    <option value="{{ $proveedor->id }}"> {{ $proveedor->Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">PRODUCTO</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">DESCRIPCION</th>
                                <th scope="col">COMPRA</th>
                                <th scope="col">VENTA</th>
                                <th scope="col spam 2">MEDIDA</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">CATEGORIA</th>
                                <th scope="col">PROVEEDOR</th>
                                <th scope="col">BOTONES</th>

                            </tr>
                        </thead>
                        <div style="text-align: right;">
                            <button data-bs-toggle="modal" data-bs-target="#insertarproducto" class="btn btn-info"
                                style="margin-left: auto;">
                                Agregar Producto
                            </button>
                        </div>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <th>{{ $item->Nombre }}</th>
                                    <th>{{ $item->Descripcion }}</th>
                                    <th> <b>S/.</b>{{ $item->Precio_compra }}</th>
                                    <th><b>S/.</b>{{ $item->Precio_venta }}</th>
                                    <th>{{ $item->Unidad_medida }}</th>
                                    <th>{{ $item->cantidad }}</th>
                                    <th>{{ $item->Categoria }}</th>
                                    <th>{{ $item->ID_proveedor }}</th>
                                    <th>

                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->Nombre }}">
                                            <i class="fa-solid fa-circle-minus"></i>
                                        </a>

                                        <a data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2{{ $item->id }}"class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </th>

                                    <!-- Modal para eliminar -->
                                    <div class="modal fade" id="exampleModal{{ $item->Nombre }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar
                                                        Producto</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Deseas eliminar el Producto {{ $item->Nombre }} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary" onclick="eliminarProducto('{{ route("deleteProducto", $item->id) }}')">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal para Actualizar -->
                                    <div class="modal fade" id="exampleModal2{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar
                                                        Producto</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('update') }}" method="post">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">ID_producto</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="txtidproducto" value="{{ $item->id }}"
                                                                readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">Nombre</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="txtnombre" value="{{ $item->Nombre }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">Descripcion</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="txtdescripcion"
                                                                value="{{ $item->Descripcion }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">Precio_compra</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="txtprecompra"
                                                                value="{{ $item->Precio_compra }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">Precio_venta</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="txtpreventa" value="{{ $item->Precio_venta }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="unidad_medida" class="form-label">Unidad de
                                                                Medida</label>
                                                            <select class="form-select" id="unidad_medida"
                                                                name="txtunidadmed">
                                                                    {{ $item->Unidad_medida }}</option>
                                                                <option value="Costal">Costal</option>
                                                                <option value="Java">Java</option>
                                                                <option value="Kilogramo">Kilogramo (kg)</option>
                                                            </select>
                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">cantidad</label>
                                                            <input type="number" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="txtcantidad" value="{{ $item->cantidad }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="categoria"
                                                                class="form-label">Categoria</label>
                                                            <select class="form-select" id="categoria"
                                                                name="txtcantegoria">
                                                                <option value="Categoria">{{ $item->Categoria }}
                                                                </option>
                                                                <option value="verduras">Verduras</option>
                                                                <option value="jugos">Tuberculos</option>
                                                                <option value="Frutos Secos">Frutos Secos</option>
                                                                <option value="Frutas">Frutas</option>
                                                                <option value="Vegetales">Vegetales</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                                class="form-label">ID_proveedor</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="txtproveedor"
                                                                value="{{ $item->ID_proveedor }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Confirmar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
