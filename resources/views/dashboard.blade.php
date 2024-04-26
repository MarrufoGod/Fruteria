<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Frutas') }}

        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0abf574f5b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">ID_producto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Precio_compra</th>
                                <th scope="col">Precio_venta</th>
                                <th scope="col">Unidad_medida</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">ID_proveedor</th>
                                <th scope="col">Botones</th>

                            </tr>
                        </thead>

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
                                        <a  data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-circle-minus"></i>
                                        </a>

                                        <a data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2"class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </th>

                                    <!-- Modal para eliminar -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Producto</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Deseas eliminar el Proveedor?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <!-- Modal para Actualizar -->
                                     <div class="modal fade" id="exampleModal2" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Producto</h1>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                     aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                 Deseas Actualizar el Proveedor?
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary"
                                                     data-bs-dismiss="modal">Cerrar</button>
                                                 <button type="button" class="btn btn-primary">Confirmar</button>
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
