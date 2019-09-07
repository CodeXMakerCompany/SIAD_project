$(function (){

        
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
                text:"Soy una guia",
                click:function(){
                    Swal.fire(
                      'Good job!',
                      'You clicked the button!',
                      'success'
                    )
                }

            }
        },
        dayClick:function(date,jsEvent,view){
            $(this).css('background-color','#66073D');
            $("#modalEventos").modal();
        },
        events: evt
    });

})