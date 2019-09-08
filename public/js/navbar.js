$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

            //buscador
$('#buscador').submit(function(e) {
	//MODIFICAR EN PRODUCCION !!!!
	var url = 'http://localhost/siadProyectV0/public';
	$(this).attr('action',url+'/docente/chat/'+$('#buscador #search').val());

});
        });

