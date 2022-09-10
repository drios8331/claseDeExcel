document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: "es",
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMont,timeGridWeek,listWeek'
      },
      events: "http://localhost/claseDeExcel/public/reserva/mostrar",
      displayEventTime: false
    });
    calendar.render();
  });