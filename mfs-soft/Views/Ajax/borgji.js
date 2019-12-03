shfaqborgjet();

function shfaqborgjet() {
    $.ajax({
        method: 'POST',
        url: "Controllers/borgjiController.php",
        success: function(results) {
            $("#shfaqborgjet").html(results);
        }
    });
}

function ndryshostatusineborgji(ndryshostatusinborgji) {
    var ndryshostatusinborgji = ndryshostatusinborgji;

    var perditesimi_i_statusit_borgji = new FormData();

    perditesimi_i_statusit_borgji.append('ndryshostatusinborgji', ndryshostatusinborgji);



    if (ndryshostatusinborgji != "") {

        $.ajax({
            url: "Controllers/borgjiController.php",
            type: "POST",
            data: perditesimi_i_statusit_borgji,
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
                setTimeout(function() {
                    location.reload();
                }, 1700);
                shfaqborgjet();
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




function regjistroborgj() {

    var borgj = $("#borgj").val();
    var emriborgjit = $("#emriborgjit").val();
    var adresaborgjit = $("#adresaborgjit").val();
    var telefoniborgjit = $("#telefoniborgjit").val();
    var qmimiborgjit = $("#qmimiborgjit").val();
    var mesazhiborgjit = $("#mesazhiborgjit").val();
    var nrserikborgj = $("#nrserikborgj").val();


    var borgji = new FormData();

    borgji.append('borgj', borgj);
    borgji.append('emriborgjit', emriborgjit);
    borgji.append('adresaborgjit', adresaborgjit);
    borgji.append('telefoniborgjit', telefoniborgjit);
    borgji.append('qmimiborgjit', qmimiborgjit);
    borgji.append('mesazhiborgjit', mesazhiborgjit);
    borgji.append('nrserikborgj', nrserikborgj);

    if (emriborgjit != "" && adresaborgjit != "" && telefoniborgjit != "" && qmimiborgjit != "") {

        $.ajax({
            url: 'Controllers/borgjiController.php',
            cache: false,
            contentType: false,
            processData: false,

            data: borgji,
            borgj: borgj,
            emriborgjit: emriborgjit,
            adresaborgjit: adresaborgjit,
            telefoniborgjit: telefoniborgjit,
            qmimiborgjit: qmimiborgjit,
            mesazhiborgjit: mesazhiborgjit,
            nrserikborgj: nrserikborgj,

            dataType: "text",
            type: "post",

            success: function(rezultatet) {
                $("#emriborgjit").val("");
                $("#adresaborgjit").val("");
                $("#telefoniborgjit").val("");
                $("#qmimiborgjit").val("");
                $("#mesazhiborgjit").val("");
                shfaqborgjet();
                Swal.fire({
                    type: 'success',
                    title: 'Metoda Borgj eshte regjistruar',
                    showConfirmButton: false,
                    timer: 1700
                });
                setTimeout(function() {
                    location.reload();
                }, 1700);
                $("#Borgj").modal("hide");


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


function ndryshotedhenatngaborgji(idborgji) {

    var idborgji = idborgji;

    data = new FormData();
    data.append("idborgji", idborgji);
    $.ajax({
        url: 'Controllers/edit.php',
        method: "POST",
        data: data,
        idborgji: idborgji,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(resultatet) {
            $("#perditesoidborgji").val(resultatet["idborgji"]);
            $("#perditesoemriproduktitborgj").val(resultatet["emri"]);
            $("#perditesoadresaborgj").val(resultatet["adresa"]);
            $("#perditesotelefoniborgj").val(resultatet["telefoni"]);
            $("#perditesoshumaborgj").val(resultatet["qmimi"]);
            $("#perditesomesazhiborgj").val(resultatet["mesazhi"]);
        }
    });


}

function perditesoborgjin() {

    var perditesoidborgji = $("#perditesoidborgji").val();
    var perditesoemriproduktitborgj = $("#perditesoemriproduktitborgj").val();
    var perditesoadresaborgj = $("#perditesoadresaborgj").val();
    var perditesotelefoniborgj = $("#perditesotelefoniborgj").val();
    var perditesoshumaborgj = $("#perditesoshumaborgj").val();
    var perditesomesazhiborgj = $("#perditesomesazhiborgj").val();

    var perditesimi_i_borgjit_te_dhene = new FormData();

    perditesimi_i_borgjit_te_dhene.append('perditesoidborgji', perditesoidborgji);
    perditesimi_i_borgjit_te_dhene.append('perditesoemriproduktitborgj', perditesoemriproduktitborgj);
    perditesimi_i_borgjit_te_dhene.append('perditesoadresaborgj', perditesoadresaborgj);
    perditesimi_i_borgjit_te_dhene.append('perditesotelefoniborgj', perditesotelefoniborgj);
    perditesimi_i_borgjit_te_dhene.append('perditesoshumaborgj', perditesoshumaborgj);
    perditesimi_i_borgjit_te_dhene.append('perditesomesazhiborgj', perditesomesazhiborgj);


    if (perditesoidborgji != "" && perditesoemriproduktitborgj != "" && perditesoadresaborgj != "" && perditesotelefoniborgj != "") {

        $.ajax({
            url: "Controllers/borgjiController.php",
            type: "POST",
            data: perditesimi_i_borgjit_te_dhene,
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
                shfaqborgjet();
                $('#borgj-furnizimi').modal('hide');

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

function deleteborgjin(deleteborgjinid) {

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
                url: 'Controllers/borgjiController.php',
                data: {
                    'deleteborgjinid': deleteborgjinid
                },
                success: function(results) {
                    shfaqborgjet();
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

function borgji(idborgji) {
    var idborgji = idborgji;

    $("#borgji" + idborgji).css('display', 'none');
    $("#trick2").css('display', 'block');
    $("#img2" + idborgji).removeClass('d-none');

}