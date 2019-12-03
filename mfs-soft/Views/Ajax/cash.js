function ndryshostatusinecash(ndryshostatusincash) {
    var ndryshostatusincash = ndryshostatusincash;

    var perditesimi_i_statusit_cash = new FormData();

    perditesimi_i_statusit_cash.append('ndryshostatusincash', ndryshostatusincash);



    if (ndryshostatusincash != "") {

        $.ajax({
            url: "Controllers/cashController.php",
            type: "POST",
            data: perditesimi_i_statusit_cash,
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
                shfaqcash();
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


shfaqcash();

function shfaqcash() {
    $.ajax({
        method: 'POST',
        url: "Controllers/cashController.php",
        success: function(results) {
            $("#shfaqcash").html(results);
        }
    });
}


function dergocash() {
    var emricash = $("#emricash").val();
    var adresacash = $("#adresacash").val();
    var telefonicash = $("#telefonicash").val();
    var qmimicash = $("#qmimicash").val();
    var mesazhicash = $("#mesazhicash").val();


    var cash = new FormData();

    cash.append('emricash', emricash);
    cash.append('adresacash', adresacash);
    cash.append('telefonicash', telefonicash);
    cash.append('qmimicash', qmimicash);
    cash.append('mesazhicash', mesazhicash);

    if (emricash != "" && adresacash != "" && telefonicash != "" && qmimicash != "") {

        $.ajax({
            url: 'Controllers/cashController.php',
            cache: false,
            contentType: false,
            processData: false,

            data: cash,
            emricash: emricash,
            adresacash: adresacash,
            telefonicash: telefonicash,
            qmimicash: qmimicash,


            dataType: "text",
            type: "post",

            success: function(rezultatet) {

                $("#emricash").val("");
                $("#adresacash").val("");
                $("#telefonicash").val("");
                $("#qmimicash").val("");
                $("#mesazhicash").val("");
                Swal.fire({
                    type: 'success',
                    title: 'Metoda CASH eshte regjistruar',
                    showConfirmButton: false,
                    timer: 1700
                });

                $("#Cash").modal("hide");
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


function perditesocash() {
    var perditesoidcash = $("#perditesoidcash").val();
    var perditesoemriproduktitcash = $("#perditesoemriproduktitcash").val();
    var perditesoadresacash = $("#perditesoadresacash").val();
    var perditesotelefonicash = $("#perditesotelefonicash").val();
    var perditesoshumacash = $("#perditesoshumacash").val();
    var perditesomesazhicash = $("#perditesomesazhicash").val();

    var perditesimi_i_cashit = new FormData();

    perditesimi_i_cashit.append('perditesoidcash', perditesoidcash);
    perditesimi_i_cashit.append('perditesoemriproduktitcash', perditesoemriproduktitcash);
    perditesimi_i_cashit.append('perditesotelefonicash', perditesotelefonicash);
    perditesimi_i_cashit.append('perditesoadresacash', perditesoadresacash);
    perditesimi_i_cashit.append('perditesoshumacash', perditesoshumacash);
    perditesimi_i_cashit.append('perditesomesazhicash', perditesomesazhicash);


    if (perditesoidcash != "" && perditesoemriproduktitcash != "" && perditesoadresacash != "" && perditesotelefonicash != "" && perditesoshumacash != "") {

        $.ajax({
            url: "Controllers/cashController.php",
            type: "POST",
            data: perditesimi_i_cashit,
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
                shfaqcash();
                $('#cash-furnizimi').modal('hide');

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

function ndryshocash(idcashndrysho) {

    var idcashndrysho = idcashndrysho;

    data = new FormData();
    data.append("idcashndrysho", idcashndrysho);
    $.ajax({
        url: 'Controllers/edit.php',
        method: "POST",
        data: data,
        idcashndrysho: idcashndrysho,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(resultatet) {
            console.log(resultatet);
            $("#perditesoidcash").val(resultatet["idcash"]);
            $("#perditesoemriproduktitcash").val(resultatet["emri"]);
            $("#perditesoadresacash").val(resultatet["adresa"]);
            $("#perditesotelefonicash").val(resultatet["telefoni"]);
            $("#perditesoshumacash").val(resultatet["qmimi"]);
            $("#perditesomesazhicash").val(resultatet["mesazhi"]);
        }
    });


}

function fshicash(idcash) {

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
                url: 'Controllers/cashController.php',
                data: {
                    'idcash': idcash
                },
                success: function(results) {
                    shfaqcash();
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


function cashi(idcashi) {
    var idcashi = idcashi;

    $("#idcashi" + idcashi).css('display', 'none');
    $("#trick3").css('display', 'block');
    $("#img3" + idcashi).removeClass('d-none');

}
// $("#fshije").load( "fletore #cashload" );