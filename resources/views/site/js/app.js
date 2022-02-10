//Configura o contador do textarea
$('textarea').keyup(function () {
    var length = $(this).val().length;
    var length = document.getElementById("textarea").maxLength - length;
    $('#chars').text(length);
});
