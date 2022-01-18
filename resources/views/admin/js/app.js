$(document).ready(function(){
    /**
     * Ativação de plugins jquery globalmente
     */

    $(".dataTableInit").DataTable({
        "paging": true,
        "lengthChange": true,
        "pageLength": 5,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"}
      });

    //ativando máscaras de entrada
    //$('[data-mask]').inputmask();

    /*//ativando campos data
    $('.initData').daterangepicker({
        singleDatePicker: true,
        autoUpdateInput: false,
        showDropdowns: true,
        showWeekNumbers: false,
        locale: {
            format: 'DD/MM/YYYY',
            daysOfWeek: ["Dom","Seg","Ter","Qua","Qui","Sex","Sab"],
            monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
            firstDay: 0
        },
    }, function(chosen_date) {
        $('.initData').val(chosen_date.format('DD/MM/YYYY'));
    });*/

    //ativando tooltip
    $('[data-toggle="tooltip"]').tooltip()

    //exibe um prefixo para campos do tipo URL que estiverem com [class="excluirRegistro"]
    $('.addUrl').bind('click', function(e){
        if($.trim($(e.target).val())==='') $(e.target).val('http://www.');
    });

    //Faz mostrar um confirm no elemento que estiver com [class="excluirRegistro"] ao ser submetido o formulário
    $(".excluirRegistro").submit(function (event) {
		var confirmar = confirm("Tem certeza que deseja inativar este registro?");
		if (confirmar) {
			return true;
		}else {
			event.preventDefault();
			return false;
		}
    });

    //Faz o elemento que estiver com [class="desaparecer"] após 5 segundos
    setTimeout(function() {
   		$('.desaparecer').fadeOut('fast');
    }, 5000);

    //console.log(maxLength);
    $('textarea').keyup(function() {
    var length = $(this).val().length;
    var length = document.getElementById("textarea").maxLength-length;
    $('#chars').text(length);
    });

});
