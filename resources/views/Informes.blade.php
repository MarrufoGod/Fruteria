<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Control del Ventas') }}
        </h2>
        <div class="contenedor">

        </div>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0abf574f5b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        .mb- {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-select {
            width: 150px;
            /* Ajusta el tamaño del combo box según tu preferencia */
        }

        #confirmarAgregar {
            margin-left: 10px;
            /* Ajusta el espacio entre el combo box y el botón */
        }

        #generarBoleta {
            margin-top: 10px;
            /* Agrega espacio entre los elementos */
        }

        .cantidad {
            margin-left: 5px;
            font-size: 16px;
            padding: 5px 10px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <body>
                        <div class="mb-">
                            <label for="proveedorSelect" class="form-label">Seleccionar Fruta:</label>
                            <select class="form-select" id="proveedorSelect" name="txtproveedor">
                                <?php
                                // Iterar sobre los datos para generar las opciones del select
                                foreach ($datos as $item) {
                                    echo "<option value=\"{$item->id}\" data-precio=\"{$item->Precio_venta}\">{$item->Nombre}</option>";
                                }
                                ?>
                            </select>
                            <!-- Botón de confirmación -->
                            <button id="confirmarAgregar" class="btn btn-info">Confirmar</button>
                        </div>

                        <!-- Lista donde se agregarán las frutas seleccionadas -->
                        <div id="frutasSeleccionadas"></div>

                        <!-- Mostrar la suma total -->
                        <div id="sumaTotal"></div>

                        <!-- Modal para mostrar la boleta -->
                        <div class="modal fade" id="modalBoleta" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Boleta de Venta - Fruteria
                                            la Frutera</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="datosBoleta">
                                        <!-- Aquí se mostrarán los datos de la boleta -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button id="exportarPDF" class="btn btn-primary">Exportar a PDF</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Botón para generar boleta -->
                        <button id="generarBoleta" class="btn btn-info">Generar Boleta</button>

                        <script>
                            var frutasSeleccionadas = {}; // Objeto para almacenar las frutas seleccionadas junto con su cantidad
                            var select = document.getElementById("proveedorSelect"); // Referencia al elemento select

                            // Función para agregar la fruta seleccionada a la lista o actualizar la cantidad
                            function agregarFruta() {
                                var selectedOption = select.options[select.selectedIndex];
                                var frutaId = selectedOption.value;

                                if (frutasSeleccionadas[frutaId]) {
                                    // Si la fruta ya está seleccionada, aumentar la cantidad y actualizar el precio total
                                    frutasSeleccionadas[frutaId].cantidad++;
                                    frutasSeleccionadas[frutaId].precioTotal += parseFloat(selectedOption.getAttribute("data-precio"));
                                } else {
                                    // Si es una nueva fruta, agregarla al objeto de frutas seleccionadas
                                    frutasSeleccionadas[frutaId] = {
                                        nombre: selectedOption.textContent,
                                        cantidad: 1,
                                        precioTotal: parseFloat(selectedOption.getAttribute("data-precio"))
                                    };
                                }

                                // Actualizar la lista de frutas seleccionadas en el DOM
                                mostrarFrutasSeleccionadas();
                            }

                            // Función para mostrar las frutas seleccionadas en el DOM
                            function mostrarFrutasSeleccionadas() {
                                var listaFrutas = document.getElementById("frutasSeleccionadas");
                                listaFrutas.innerHTML = ""; // Limpiar la lista antes de actualizarla

                                // Iterar sobre el objeto de frutas seleccionadas y crear elementos para mostrarlas
                                for (var frutaId in frutasSeleccionadas) {
                                    if (frutasSeleccionadas.hasOwnProperty(frutaId)) {
                                        var fruta = frutasSeleccionadas[frutaId];
                                        var frutaElemento = document.createElement("div");
                                        frutaElemento.textContent = fruta.nombre + " - Cantidad: " + fruta.cantidad + " - Precio Total: $" +
                                            fruta.precioTotal.toFixed(2);

                                        // Botón para aumentar la cantidad
                                        var aumentarCantidad = document.createElement("button");
                                        aumentarCantidad.textContent = "+";
                                        aumentarCantidad.className = "cantidad";
                                        aumentarCantidad.className = "cantidad btn btn-success"; // Agregar la clase btn btn-info
                                        aumentarCantidad.onclick = (function(id) {
                                            return function() {
                                                frutasSeleccionadas[id].cantidad++;
                                                frutasSeleccionadas[id].precioTotal += parseFloat(select.options[select
                                                    .selectedIndex].getAttribute("data-precio"));
                                                mostrarFrutasSeleccionadas();
                                            };
                                        })(frutaId);

                                        // Botón para disminuir la cantidad
                                        var disminuirCantidad = document.createElement("button");
                                        disminuirCantidad.textContent = "-";
                                        disminuirCantidad.className = "cantidad";
                                        disminuirCantidad.className = "cantidad btn btn-danger"; // Agregar la clase btn btn-info
                                        disminuirCantidad.onclick = (function(id) {
                                            return function() {
                                                if (frutasSeleccionadas[id].cantidad > 1) {
                                                    frutasSeleccionadas[id].cantidad--;
                                                    frutasSeleccionadas[id].precioTotal -= parseFloat(select.options[select
                                                        .selectedIndex].getAttribute("data-precio"));
                                                    mostrarFrutasSeleccionadas();
                                                }
                                            };
                                        })(frutaId);

                                        frutaElemento.appendChild(aumentarCantidad);
                                        frutaElemento.appendChild(disminuirCantidad);
                                        listaFrutas.appendChild(frutaElemento);
                                    }
                                }

                                // Calcular y mostrar la suma total
                                var sumaTotal = calcularSumaTotal();
                                var sumaTotalElemento = document.getElementById("sumaTotal");
                                sumaTotalElemento.textContent = "Suma Total: $" + sumaTotal.toFixed(2);
                            }

                            // Función para calcular la suma total de los precios de las frutas seleccionadas
                            function calcularSumaTotal() {
                                var total = 0;
                                for (var frutaId in frutasSeleccionadas) {
                                    if (frutasSeleccionadas.hasOwnProperty(frutaId)) {
                                        total += frutasSeleccionadas[frutaId].precioTotal;
                                    }
                                }
                                return total;
                            }

                            // Mostrar modal al hacer clic en "Generar Boleta"
                            document.getElementById("generarBoleta").addEventListener("click", function() {
                                mostrarModalBoleta();
                            });

                            // Función para mostrar el modal con los datos de la boleta
                            function mostrarModalBoleta() {
                                var modal = document.getElementById("modalBoleta");
                                var datosBoleta = document.getElementById("datosBoleta");
                                datosBoleta.innerHTML = ""; // Limpiar datos anteriores

                                // Agregar datos de las frutas seleccionadas al modal
                                for (var frutaId in frutasSeleccionadas) {
                                    if (frutasSeleccionadas.hasOwnProperty(frutaId)) {
                                        var fruta = frutasSeleccionadas[frutaId];
                                        var frutaInfo = document.createElement("p");
                                        frutaInfo.textContent = fruta.nombre + " - Cantidad: " + fruta.cantidad + " - Precio Total: $" + fruta
                                            .precioTotal.toFixed(2);
                                        datosBoleta.appendChild(frutaInfo);
                                    }
                                }
                                // Calcular y agregar el total a pagar al modal
                                var sumaTotal = calcularSumaTotal();
                                var totalElemento = document.createElement("p");
                                totalElemento.textContent = "Total a Pagar: $" + sumaTotal.toFixed(2);
                                datosBoleta.appendChild(totalElemento);

                                // Mostrar el modal
                                var modalInstance = new bootstrap.Modal(modal);
                                modalInstance.show();
                            }

                            // Exportar datos a PDF
                            document.getElementById("exportarPDF").addEventListener("click", function() {
                                // Aquí puedes implementar la lógica para exportar los datos a un archivo PDF
                                // Por ejemplo, puedes utilizar una biblioteca como jsPDF para crear el PDF
                                // y luego descargarlo o abrirlo en una nueva ventana/tab
                                // Ejemplo de uso de jsPDF:
                                // https://parall.ax/products/jspdf
                                alert("Función de exportar a PDF no implementada.");
                            });


                            // Evento para el botón de confirmación
                            document.getElementById("confirmarAgregar").addEventListener("click", function() {
                                // Agregar la fruta seleccionada a la lista o actualizar la cantidad
                                agregarFruta();
                            });
                        </script>
                    </body>








                </div>
            </div>
        </div>
    </div>
</x-app-layout>
