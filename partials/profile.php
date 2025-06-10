<section class="bg-slate-50 py-16 px-4">
    <div class="max-w-7xl mx-auto space-y-16">

        <!-- Perfil de Usuario -->
        <div class="bg-white rounded-2xl shadow-md p-8 relative">
            <h2 class="text-2xl font-bold text-sky-700 mb-6">Tu perfil</h2>

            <!-- Botón Editar -->
            <button
                class="absolute top-8 right-8 px-4 py-2 bg-orange-500 text-white rounded-full text-sm font-semibold hover:bg-orange-600 transition">
                Editar Perfil
            </button>

            <div class="grid sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <p class="text-sm text-gray-500">Nombre completo</p>
                    <p class="text-lg font-medium text-gray-900">Juan Pérez</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Correo electrónico</p>
                    <p class="text-lg font-medium text-gray-900">juanperez@email.com</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Teléfono</p>
                    <p class="text-lg font-medium text-gray-900">+34 600 123 456</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Fecha de alta</p>
                    <p class="text-lg font-medium text-gray-900">15 de enero de 2024</p>
                </div>
            </div>
        </div>

        <!-- Reservas Activas -->
        <div class="bg-white rounded-2xl shadow-md p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-sky-700">Reservas activas</h2>

                <!-- Filtro -->
                <input type="date"
                    class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring focus:ring-sky-300" />
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border-separate border-spacing-y-3">
                    <thead class="text-left text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Clase</th>
                            <th class="px-4 py-2">Fecha</th>
                            <th class="px-4 py-2">Hora</th>
                            <th class="px-4 py-2">Instructor</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2 text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        <tr class="bg-slate-100 rounded-lg">
                            <td class="px-4 py-3 font-medium">Bodypump</td>
                            <td class="px-4 py-3">10/06/2025</td>
                            <td class="px-4 py-3">19:00 - 20:00</td>
                            <td class="px-4 py-3">Laura Sánchez</td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 text-green-700 bg-green-100 rounded-full text-xs font-semibold">Confirmada</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <button onclick="openModal('Bodypump')"
                                    class="text-red-500 hover:underline text-sm">Cancelar</button>
                            </td>
                        </tr>
                        <tr class="bg-slate-100 rounded-lg">
                            <td class="px-4 py-3 font-medium">HIIT</td>
                            <td class="px-4 py-3">11/06/2025</td>
                            <td class="px-4 py-3">12:00 - 12:30</td>
                            <td class="px-4 py-3">Paula Ruiz</td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 text-yellow-700 bg-yellow-100 rounded-full text-xs font-semibold">En lista de espera</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <button onclick="openModal('HIIT')"
                                    class="text-red-500 hover:underline text-sm">Cancelar</button>
                            </td>
                        </tr>
                        <tr class="bg-slate-100 rounded-lg">
                            <td class="px-4 py-3 font-medium">Zumba</td>
                            <td class="px-4 py-3">13/06/2025</td>
                            <td class="px-4 py-3">20:00 - 21:00</td>
                            <td class="px-4 py-3">Carolina Pérez</td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 text-red-700 bg-red-100 rounded-full text-xs font-semibold">Cancelada</span>
                            </td>
                            <td class="px-4 py-3 text-center">—</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Cancelación -->
    <div id="cancel-modal" class="fixed inset-0 bg-black/30 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-sm">
            <h3 class="text-xl font-bold mb-4 text-red-600">¿Cancelar esta clase?</h3>
            <p class="text-sm text-gray-600 mb-6">Esta acción no se puede deshacer. ¿Estás seguro de que deseas cancelar
                <span id="modal-class-name" class="font-semibold text-gray-900"></span>?</p>
            <div class="flex justify-end gap-3">
                <button onclick="closeModal()"
                    class="px-4 py-2 rounded bg-slate-200 hover:bg-slate-300 text-sm">Cerrar</button>
                <button onclick="confirmCancel()"
                    class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 text-sm">Cancelar clase</button>
            </div>
        </div>
    </div>
</section>

<script>
    let selectedClass = "";

    function openModal(className) {
        selectedClass = className;
        document.getElementById("modal-class-name").innerText = className;
        document.getElementById("cancel-modal").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("cancel-modal").classList.add("hidden");
    }

    function confirmCancel() {
        alert(`Clase cancelada: ${selectedClass}`);
        closeModal();
        // Aquí podrías hacer una petición real para cancelar la reserva
    }
</script>