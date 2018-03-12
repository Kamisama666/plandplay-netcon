$(document).ready(function() {
  console.log('hello');
  $('#games-table').DataTable({
    ajax: {
      url: '/games/ajax',
      type: 'get',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      }
    },
    columns: [
      {
        data: 'image_name',
        function(data) {
          if (!data) {
            return `
            <img 
              class="image_game" 
              src="{{ asset('img/sin_imagen.png') }}" 
              width="100%" 
            >`;
          }
          return `
          <img 
            class="image_game" 
            src="/storage/${data}" 
            width="100%" 
          >`;
        }
      },
      {data: 'title', sortable: true, searchable: true},
      {data: 'game_system', sortable: true, searchable: true},
      {
        targets: 3,
        render: function(data, type, full) {
          return full['maximum_players_number'] <= full['signedup_players_number'] ? 'Lleno' : 'Disponible';
        },
        sortable: true
      },
      {
        data: 'starting_time',
        sortable: true
      }
    ],
    deferRender: true,
    renderer: 'bootstrap'
  });
});
