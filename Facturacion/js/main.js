
  $(document).ready(function(){

    $("#frmPersona").submit(function( event ){

        event.preventDefault(); //evita que el formulario realice la validacion sin tener en cuenta el Js.

        var url ="CrudCompetencia.php";

        if($("#documento").val().length == 0)
        {
            alert("todos los campos son obligatorios.");
        }
        else
        {
            //document.frmPersona.submit(); //Realizar el envío a la página PHP.

            //Ahora con AJAX:

            var url ="CrudCompetencia.php";

            $.ajax(
                {
                    type: "POST",
                    url: url,
                    data: $("#frmPersona").serialize(), //incluye la informacion del formulacion y los envia a php:
                    success: function (data)
                    {
                        $('#respuestaTransaccion').html(data);
                    }
                }
            )
        }
    });
});
