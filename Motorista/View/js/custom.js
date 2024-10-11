//Executar quando o documento HTML for completamente carregado
document.addEventListener('DOMContentLoaded', function() {
    
    // Receber o SELETOR calendar de atributo id
    var calendarEl = document.getElementById('calendar');

    
    // Instanciar FullCalendar.Calendar e atribuir a variável calendar
    var calendar = new FullCalendar.Calendar(calendarEl, {

        // Criar o cabeçalho
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },

      locale: 'pt-br',

      //initialDate: '2023-01-12',
      initialDate: '2024-08-26',

      // Per,itir clicar nos nomes dos dias da semana
      navLinks: true, 

     // Permitir clicar e arrastar o mouse sobre um ou vários dias no calendário
      selectable: true,

       // Indicar Visualmente a área que será selecionada antes que 
      // o usuário solte o botão do mouse para confirmar a ação
      selectMirror: true,

      // Permitir arrastar e redimensionar os eventos diretamente no calendário
      editable: true,

      // Numero máximo de eventos em um determinado  dia, se for true,
      // o número de eventos será limitado à altura da célula do dia
      dayMaxEvents: true,


      events: 'listar_evento.php'
    });

    calendar.render();
  });