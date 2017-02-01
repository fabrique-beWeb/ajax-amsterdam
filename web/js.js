$().ready(function(){
   
});
$('#form > form > input[type="text"]').click(function(e){
    $('#form > form > input[type="text"]').removeClass('faux');
});
$('#form > form > input[type="submit"]').click(function(e){
    e.preventDefault();
    if($('#form > form > input[type="text"]').empty()){
        $('#form > form > input[type="text"]').addClass('faux');
    }else{
        
        $.ajax({
            type: 'POST',
            async: true,
            dataType: 'json',
            data: {
                nom: $('#form > form > input[type="text"]').val(),
                nbHabitants: $('#form > form > input[type="number"]').val()
            },
            url: "http://localhost/LoicDerrieux/Amsterdam/web/app_dev.php/quartier/add",
            success: function (data, textStatus, jqXHR) {
                $('ul').empty();
                for (var i = 0; i < data.length; i++) {
                    $('ul').append("<li>" + data[i].nom + " - " + data[i].nbHabitant + "</li>");
                }

            }
        });
    }
});
