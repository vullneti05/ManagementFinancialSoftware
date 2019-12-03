shfaqposta();

function ndryshostatusinepostes(ndryshostatusinposta) {
    var ndryshostatusinposta = ndryshostatusinposta;
    var perditesimi_i_statusit_posta = new FormData();

    perditesimi_i_statusit_posta.append('ndryshostatusinposta', ndryshostatusinposta);



    if (ndryshostatusinposta != "") {

        $.ajax({
            url: "Controllers/postaController.php",
            type: "POST",
            data: perditesimi_i_statusit_posta,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "text",
            success: function(results) {
                setTimeout(function() {
                    location.reload();
                }, 1700);
                Swal.fire({
                    type: 'success',
                    title: 'Perditesimi perfundoi me Sukses',
                    showConfirmButton: false,
                    timer: 1700
                });
                shfaqposta();
            }
        });
    } else {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'te gjitha fushat duhet te  plotesohen!',
            footer: 'fusha Mesazhi nuk eshte obligative'
        })
    }
}



function perditesoposten() {

    var perditesoidposta = $("#perditesoidposta").val();
    var perditesoemri = $("#perditesoemri").val();
    var perditesoadresa = $("#perditesoadresa").val();
    var perditesotelefoni = $("#perditesotelefoni").val();
    var perditesoqmimi = $("#perditesoqmimi").val();
    var perditesomesazhi = $("#perditesomesazhi").val();

    var perditesimi_i_informatave_te_postes = new FormData();

    perditesimi_i_informatave_te_postes.append('perditesoidposta', perditesoidposta);
    perditesimi_i_informatave_te_postes.append('perditesoemri', perditesoemri);
    perditesimi_i_informatave_te_postes.append('perditesoadresa', perditesoadresa);
    perditesimi_i_informatave_te_postes.append('perditesotelefoni', perditesotelefoni);
    perditesimi_i_informatave_te_postes.append('perditesoqmimi', perditesoqmimi);
    perditesimi_i_informatave_te_postes.append('perditesomesazhi', perditesomesazhi);


    if (perditesoemri != "" && perditesoadresa != "" && perditesotelefoni != "" && perditesoqmimi != "" && perditesomesazhi != "") {

        $.ajax({
            url: "Controllers/postaController.php",
            type: "POST",
            data: perditesimi_i_informatave_te_postes,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "text",
            success: function(results) {
                Swal.fire({
                    type: 'success',
                    title: 'Perditesimi perfundoi me Sukses',
                    showConfirmButton: false,
                    timer: 1700
                });
                shfaqposta();
                $('#post-furnizimi').modal('hide');

            }
        });
    } else {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'te gjitha fushat duhet te  plotesohen!',
            footer: 'fusha Mesazhi nuk eshte obligative'
        })
    }

}

function deleteblerjenmeposte(deletepostaid) {


    Swal.fire({
        title: 'A jeni i sigurt?',
        text: "te dhenat nuk kthehen pasi te fshihen!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Po, fshije!',
        cancelButtonText: 'Jo, Anulo!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: 'Controllers/postaController.php',
                data: {
                    'deletepostaid': deletepostaid
                },
                success: function(results) {
                    // $("#modal").hide();
                    shfaqposta();
                    Swal.fire({
                        type: 'success',
                        title: 'e dhena eshte fshire me sukses',
                        showConfirmButton: false,
                        timer: 1700
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 1700);
                }
            });
        }
    })
}

function shfaqposta() {
    $.ajax({
        method: 'POST',
        url: "Controllers/postaController.php",
        success: function(results) {
            $("#shfaqposte").html(results);
        }
    });
}

function shtomeposte() {
    var poste = $("#poste").val();
    var emri = $("#emri").val();
    var adresa = $("#adresa").val();
    var telefoni = $("#telefoni").val();
    var mesazhi = $("#mesazhi").val();
    var qmimi = $("#qmimi").val();
    var nrserikposta = $("#nrserikposta").val();


    var posta = new FormData();

    posta.append('poste', poste);
    posta.append('emri', emri);
    posta.append('adresa', adresa);
    posta.append('telefoni', telefoni);
    posta.append('qmimi', qmimi);
    posta.append('mesazhi', mesazhi);
    posta.append('nrserikposta', nrserikposta);

    if (emri != "" && adresa != "" && telefoni != "" && qmimi != "") {

        $.ajax({
            url: 'Controllers/postaController.php',
            cache: false,
            contentType: false,
            processData: false,

            data: posta,
            poste: poste,
            emri: emri,
            adresa: adresa,
            telefoni: telefoni,
            qmimi: qmimi,
            mesazhi: mesazhi,
            nrserikposta: nrserikposta,

            dataType: "text",
            type: "post",

            success: function(rezultatet) {
                var trHTML = "";
                $("#emri").val("");
                $("#adresa").val("");
                $("#telefoni").val("");
                $("#qmimi").val("");
                $("#mesazhi").val("");
                $('#shitjet').html('').append(trHTML);
                Swal.fire({
                    type: 'success',
                    title: 'metoda ME POSTË eshte regjistruar',
                    showConfirmButton: false,
                    timer: 1700
                });

                $("#Post").modal("hide");
                setTimeout(function() {
                    location.reload();
                }, 1700);
            }
        });
    } else {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'te gjitha fushat duhet te  plotesohen!',
            footer: 'fusha Mesazhi nuk eshte obligative'
        })
    }
}

//

function posta(idpaga) {
    var idpaga = idpaga;

    $("#pagesa" + idpaga).css('display', 'none');
    $("#trick").css('display', 'block');
    $("#img" + idpaga).removeClass('d-none');



}

function ndryshoposten() {
    var idposta2 = $("#idposta2").val();

    ndrysho = new FormData();
    ndrysho.append("idposta2", idposta2);
    $.ajax({
        url: 'Controllers/postaController.php',
        method: "POST",
        data: data,
        idposta2: idposta2,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(resultatet) {

        }
    });
}

function ndryshotdhanen(idposta4) {

    data = new FormData();
    data.append("idposta4", idposta4);
    $.ajax({
        url: 'Controllers/edit.php',
        method: "POST",
        data: data,
        idposta4: idposta4,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function(results) {



            $("#perditesoidposta").val(results["idposta"]);
            $("#perditesoemri").val(results["emri"]);
            $("#perditesoadresa").val(results["adresa"]);
            $("#perditesotelefoni").val(results["telefoni"]);
            $("#perditesoqmimi").val(results["qmimi"]);
            $("#perditesomesazhi").val(results["mesazhi"]);

        }
    });
}