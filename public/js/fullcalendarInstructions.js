$(function (){

        /*IMPORTANTE!! CAMBIAR AL MOMENTO DE PRODUCCION!!!*/
        evt = [];
        $.ajax({
            url: 'http://localhost/siadProyectV0/public/evento/get',
            type: 'GET',
            dataType: 'JSON',
            async:false,
        }).done(function(r) {
            evt = r;
        })
        


    $('#CalendarioWeb').fullCalendar({

        header:{
            left:   'prev,next, Guia',
            center: 'title',
            right:  'month, agendaWeek, agendaDay'
        },
        customButtons:{
            Guia:{
                text:"Guia",
                click:function(){
                    Swal.fire(
                      'Bienvenido!',
                      'Dirigete a planificación de actividades,  para gestionar el contenido de tu agenda.',
                      'success'
                    )
                }

            }
        },
        dayClick:function(date,jsEvent,view){
            $("#fecha_inicio").val(date.format());
            $("#fecha_final").val(date.format());
            $(this).css('background-color','#66073D');
            $("#modalEventos").modal();
        },
        events: evt,
        eventClick: function(calEvent, jsEvent, view) {

    
    // change the border color just for fun
    $(this).css('border-color', 'red');

  }

    });

})