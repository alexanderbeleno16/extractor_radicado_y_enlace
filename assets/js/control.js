const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


$(document).on("submit", "#form_subir_pdf, .form_subir_pdf", function (event) {
    event.preventDefault();
    subir_pdf($(this));
});

function subir_pdf(Formulario) {
    let form_aux = new FormData(Formulario[0]);

    // alert(form_aux);
    form_aux.append('accion',"subir_pdf");

    $.ajax({
        url: "assets/ctr_ajax/ctr_ajax.php",
        type: "POST",
        data: form_aux,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            console.log("before ");
            $("#contenedor_salida").html('<div class="alert alert-success">\
                                                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">\
                                                    <span class="visually-hidden">Loading...</span>\
                                                </div>\
                                                <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">\
                                                    <span class="visually-hidden">Loading...</span>\
                                                </div></div>\
                                        ');
        },
        success: function($data) {
            if($data.status){
                
                $("#contenedor_salida").html('<div class="alert alert-success">'+$data.msg+'</div>');
                // alert("ok");
                // Swal.fire({
                //     title: $data.msg,
                //     showCancelButton: false,
                //     confirmButtonText: 'Ok',
                // }).then((result) => {
                //     // $('#btn_buscar').click();
                //     // $('button[accion=buscar_datos_generales]').click();
                // })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: $data.msg
                })
            }
        },
        error: function($data) {
            alert("Error interno");
        }
    });
}






$(document).on("submit", "#form_subir_pdf_enlace, .form_subir_pdf_enlace", function (event) {
    event.preventDefault();
    subir_pdf_enlace($(this));
});

