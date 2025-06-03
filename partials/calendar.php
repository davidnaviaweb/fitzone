<section class="px-4 sm:px-8 py-12">
    <h2 class="text-3xl text-sky-700 font-bold mb-6 text-center">Calendario de Actividades</h2>
    <p class="text-center text-gray-600 mb-8">Consulta nuestro calendario para ver las actividades programadas y sus
        horarios.</p>
    <div class="flex flex-wrap justify-center gap-6 mb-6">
        <div class="flex items-center space-x-2">
            <span class="inline-block w-4 h-4 rounded bg-sky-700"></span>
            <span class="text-gray-700 text-sm">Con plazas disponibles</span>
        </div>
        <div class="flex items-center space-x-2">
            <span class="inline-block w-4 h-4 rounded bg-orange-500"></span>
            <span class="text-gray-700 text-sm">Sin plazas disponibles</span>
        </div>
    </div>
    <div class="items-center max-w-7xl mx-auto">
        <div class="mt-12">
            <div id="calendar" class="bg-white p-4 rounded-xl shadow h-screen md:h-auto"></div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 w-11/12 max-w-md">
            <h3 id="modalTitle" class="text-xl font-bold mb-4">Reservar</h3>
            <p id="modalContent" class="mb-4"></p>
            <div class="flex justify-end gap-2">
                <button onclick="closeModal()"
                    class="cursor-pointer bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancelar</button>
                <button id="modalActionBtn"
                    class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700">Confirmar</button>
            </div>
        </div>
    </div>
</section>

<script>
    const eventsData = [
        { title: 'Bodypump', daysOfWeek: [1, 3], startTime: '19:00', endTime: '20:00', capacity: 20, booked: 17 },
        { title: 'FitZone GAP', daysOfWeek: [2, 4], startTime: '17:00', endTime: '18:00', capacity: 25, booked: 23 },
        { title: 'Entrenamiento Funcional', daysOfWeek: [1, 5], startTime: '18:00', endTime: '19:00', capacity: 30, booked: 30 },
        { title: 'TRX', daysOfWeek: [3, 5], startTime: '17:00', endTime: '18:00', capacity: 20, booked: 8 },
        { title: 'Cycling & Fusion', daysOfWeek: [2, 4, 5], startTime: '19:00', endTime: '20:00', capacity: 20, booked: 18 },
        { title: 'HIIT', daysOfWeek: [1, 2, 3, 4, 5], startTime: '12:00', endTime: '12:30', capacity: 15, booked: 14 },
        { title: 'Aquagym (Mañana)', daysOfWeek: [1, 2, 3, 4, 5], startTime: '11:00', endTime: '12:00', capacity: 20, booked: 20 },
        { title: 'Aquagym (Tarde)', daysOfWeek: [1, 2, 3, 4, 5], startTime: '18:00', endTime: '19:00', capacity: 25, booked: 12 },
        { title: 'Zumba', daysOfWeek: [2, 4], startTime: '20:00', endTime: '21:00', capacity: 30, booked: 30 },
        { title: 'Fit Dance', daysOfWeek: [1, 5], startTime: '20:00', endTime: '21:00', capacity: 20, booked: 20 },
        { title: 'BodyStep', daysOfWeek: [3, 5], startTime: '11:00', endTime: '12:00', capacity: 20, booked: 18 },
        { title: 'Pilates', daysOfWeek: [2, 4], startTime: '10:00', endTime: '11:00', capacity: 20, booked: 20 },
        { title: 'Stretching', daysOfWeek: [1, 3, 5], startTime: '10:00', endTime: '10:45', capacity: 15, booked: 10 },
        { title: 'Senior FitZone', daysOfWeek: [1, 3, 5], startTime: '10:00', endTime: '11:00', capacity: 20, booked: 20 },
        { title: 'Marcha Saludable', daysOfWeek: [2, 4], startTime: '09:00', endTime: '10:00', capacity: 20, booked: 5 }
    ];

    let selectedEvent = null;

    document.addEventListener('DOMContentLoaded', function () {
        let isMobile = window.innerWidth < 1024;
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: isMobile ? 'timeGridDay' : 'timeGridWeek',
            locale: 'es',
            allDaySlot: false,
            slotMinTime: "09:00:00",
            slotMaxTime: "21:00:00",
            slotDuration: '00:15', // Adjust slot duration (e.g., 1 hour)
            slotEventOverlap: false,
            height: 800, // Set overall calendar height
            contentHeight: 700, // Set view area height
            timeGridEventMinHeight: 20,
            validRange: function (nowDate) {
                return {
                    start: nowDate,
                    end: new Date().setDate(nowDate.getDate() + 30)
                };
            },
            headerToolbar: {
                left: '',
                center: 'title',
                right: 'prev,next'
            },
            events: eventsData.map((e, i) => ({
                ...e,
                id: i,
                extendedProps: {
                    capacity: e.capacity,
                    booked: e.booked
                }
            })),

            eventDidMount: function (info) {
                const el = info.el;
                const { capacity, booked } = info.event.extendedProps;
                const remaining = capacity - booked;
                const isAvailable = remaining > 0;

                el.classList.add(isAvailable ? 'bg-sky-700!' : 'bg-orange-500!', 'border-0!', 'shadow-none!', 'rounded', 'p-1', 'cursor-pointer!', 'hover:opacity-90');
                el.onclick = () => openModal(info.event);

                const frame = el.querySelector('.fc-event-main-frame');
                frame.classList.add('text-white!');

                const timeText = el.querySelector('.fc-event-time');
                timeText.classList.add(isMobile ? 'text-xs' : 'text-sm');
            },
        });

        calendar.render();

        window.addEventListener('resize', () => {
            isMobile = window.innerWidth < 1024
            calendar.changeView(isMobile ? 'timeGridDay' : 'timeGridWeek');
        });
    });

    function openModal(event) {
        selectedEvent = event;
        const remaining = event.extendedProps.capacity - event.extendedProps.booked;

        document.getElementById('modalTitle').textContent = event.title;
        startTime = event.start.toLocaleTimeString(['es-ES']);
        startDay = event.start.toLocaleDateString(['es-ES']);
        document.getElementById('modalContent').textContent = remaining > 0 ?
            `Quedan ${remaining} plazas disponibles para el día ${startDay} a las ${startTime} horas. ¿Quieres reservar una plaza?` :
            `No hay plazas disponibles para las ${startTime} horas. ¿Quieres unirte a la lista de espera?`;

        const actionBtn = document.getElementById('modalActionBtn');
        actionBtn.textContent = remaining > 0 ? 'Reservar' : 'Unirse';
        actionBtn.className = remaining > 0
            ? 'cursor-pointer bg-sky-700 text-white px-4 py-2 rounded hover:bg-sky-600'
            : 'cursor-pointer bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-400';


        actionBtn.onclick = function () {
            if (remaining > 0) {
                alert(`Has reservado una plaza para ${event.title} a las ${startTime} horas.`);
            } else {
                alert(`Te has unido a la lista de espera para ${event.title} a las ${startTime} horas.`);
            }
            closeModal();
        };

        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        selectedEvent = null;
    }
</script>