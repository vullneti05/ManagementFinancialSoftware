shfaqfaturataktive();
shfaqshitjet();
shfaqkuponatfiskal();


$(document).ready(function() {
    $("#nrfidates").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
$(document).ready(function() {
    $("#nrfaktures").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
$(document).ready(function() {
    $("#searchfurnizim").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


function shfaqfaturataktive() {
    $.ajax({
        method: 'POST',
        data: 'text',
        url: "Controllers/furnizimiController.php",
        success: function(results) {

            $("#tabelaefurnizimit").html(results);
        }
    });

}
$('#searchtext').css("border", "0");
$('#sasiabuton').css("border", "0");

function ideshitjes2(shitjameid) {

    var shitjameid = shitjameid;

    var sasiabuton = $("#sasiabuton").val();
    var nrserik = $("#nrserik").val();

    var produktishiturid = new FormData();

    produktishiturid.append('shitjameid', shitjameid);
    produktishiturid.append('sasiabuton', sasiabuton);
    produktishiturid.append('nrserik', nrserik);
    if (sasiabuton == "") {
        $("#sasiabuton").css("border", "3px solid gray");
    } else {
        $("#sasiabuton").css("border", "0px solid gray");
    }
    if (searchtext == "") {
        $("#searchtext").css("border", "3px solid gray");
    } else {
        $("#searchtext").css("border", "0px solid gray");
    }
    if (shitjameid != "" && sasiabuton != "" && kerkobarkodi != "") {

        $.ajax({
            url: 'Controllers/furnizimiController.php',
            cache: false,
            contentType: false,
            processData: false,

            data: produktishiturid,
            shitjameid: shitjameid,
            sasiabuton: sasiabuton,
            nrserik: nrserik,

            dataType: "text",
            type: "post",

            success: function(rezultati) {

                $("#searchtext").css("border", "0");
                $("#sasiabuton").css("border", "0");
                $("#here").load(window.location.href + " #here");
                $("#results").load(window.location.href + " #results");
                $("#qmimipostes").load(window.location.href + " #qmimipostes");
                $("#qmimiiborgj").load(window.location.href + " #qmimiiborgj");
                $("#shitjetekuponave").load(window.location.href + " #shitjetekuponave");
                $("#kuponatreload").load(window.location.href + " #kuponatreload");

                shfaqshitjet();
            }
        });
    } else {
        // Swal.fire({
        //   type: 'error',
        //   title: 'Error',
        //   text: 'Artikulli ose Barkodi , Sasisa duhet te plotesohen!',
        //   footer: 'ploteso të gjitha fushat'
        // })
    }
}


function calcPost() {
    var totaliPageses = document.querySelector("#totali2").value;
    var a = document.querySelector("#qmimi").value = Number(totaliPageses);
    document.querySelector("#qmimi").value = a;
}

function calcBorgj() {
    var totaliPageses = document.querySelector("#totali2").value;
    var a = document.querySelector("#qmimi").value = Number(totaliPageses);
    document.querySelector("#qmimiborgjit").value = a;
}

function furnizimimephp() {

    var emertimimallit1 = $('#emertimimallit1').val();
    var qmimiblerjes1  = $('#qmimiblerjes1').val();
    var qmimishitjes1  = $('#qmimishitjes1').val();
    var sasia1 = $('#sasia1').val();
    var shifrafatures1 = $('#shifrafatures1').val();
    var emrifurnitorit1 = $('#emrifurnitorit1').val();
    var koha1 = $('#koha1').val();




    localStorage.setItem("shifrafatures1", shifrafatures1);
    localStorage.setItem("emrifurnitorit1", emrifurnitorit1);
    localStorage.setItem("koha1", koha1);

    var furnizimi1 = new FormData();

    furnizimi1.append('emertimimallit1', emertimimallit1);
    furnizimi1.append('qmimiblerjes1', qmimiblerjes1);
    furnizimi1.append('qmimishitjes1', qmimishitjes1);
    furnizimi1.append('sasia1', sasia1);
    furnizimi1.append('shifrafatures1', shifrafatures1);
    furnizimi1.append('emrifurnitorit1', emrifurnitorit1);
    furnizimi1.append('koha1', koha1);

    if (emertimimallit1 != "" && qmimiblerjes1 != "" && qmimishitjes1 != "" && sasia1 != "" && shifrafatures1 != "" && emrifurnitorit1 != "" && koha1 != "") {

        $.ajax({
            url: 'Controllers/furnizimiController.php',
            cache: false,
            contentType: false,
            processData: false,
            data: furnizimi1,
            emertimimallit1: emertimimallit1,
            qmimiblerjes1: qmimiblerjes1,
            qmimishitjes1: qmimishitjes1,
            sasia1: sasia1,
            shifrafatures1: shifrafatures1,
            emrifurnitorit1: emrifurnitorit1,
            koha1: koha1,
            dataType: "text",
            type: "post",

            success: function(rezultatet) {
                var emertimimallit1 = $("#emertimimallit1").val('');
                var qmimiblerjes1 = $("#qmimiblerjes1").val('');
                var qmimishitjes1 = $("#qmimishitjes1").val('');
                var sasia1 = $("#sasia1").val('');
                //duke ja shtuar atributet DISABLED inputave;
                var shifrafatures1 = $("#shifrafatures1").attr('disabled', true);
                var emrifurnitorit1 = $("#emrifurnitorit1").attr('disabled', true);
                var koha1 = $("#koha1").attr('disabled', true);

                shfaqfaturataktive();
            }
        });


    } else {
        alert("mos qo thate");

        // $("#errormall").removeClass("d-none");
        // $("#deletemall").addClass("d-none");
        // $("#updatemall").addClass("d-none");
    }

}
// var mbyllja        = $('#mbyllja').val('embyllur');
function furnizimiri() {

    var emertimimallit = $('#emertimimallit').val();
    var qmimiblerjes  = $('#qmimiblerjes').val();
    var qmimishitjes  = $('#qmimishitjes').val();
    var sasia = $('#sasia').val();
    var shifrafatures = $('#shifrafatures').val();
    var emrifurnitorit = $('#emrifurnitorit').val();
    var koha = $('#koha').val();




    localStorage.setItem("shifrafatures", shifrafatures);
    localStorage.setItem("emrifurnitorit", emrifurnitorit);
    localStorage.setItem("koha", koha);

    var furnizimi = new FormData();

    furnizimi.append('emertimimallit', emertimimallit);
    furnizimi.append('qmimiblerjes', qmimiblerjes);
    furnizimi.append('qmimishitjes', qmimishitjes);
    furnizimi.append('sasia', sasia);
    furnizimi.append('shifrafatures', shifrafatures);
    furnizimi.append('emrifurnitorit', emrifurnitorit);
    furnizimi.append('koha', koha);

    if (emertimimallit != "" && qmimiblerjes != "" && qmimishitjes != "" && sasia != "" && shifrafatures != "" && emrifurnitorit != "" && koha != "") {

        $.ajax({
            url: 'Controllers/furnizimiController.php',
            cache: false,
            contentType: false,
            processData: false,
            data: furnizimi,
            emertimimallit: emertimimallit,
            qmimiblerjes: qmimiblerjes,
            qmimishitjes: qmimishitjes,
            sasia: sasia,
            shifrafatures: shifrafatures,
            emrifurnitorit: emrifurnitorit,
            koha: koha,
            dataType: "text",
            type: "post",

            success: function(rezultatet) {

                var emertimimallit = $("#emertimimallit").val('');
                var qmimiblerjes = $("#qmimiblerjes").val('');
                var qmimishitjes = $("#qmimishitjes").val('');
                var sasia = $("#sasia").val('');
                //duke ja shtuar atributet DISABLED inputave;
                var shifrafatures = $("#shifrafatures").attr('disabled', true);
                var emrifurnitorit = $("#emrifurnitorit").attr('disabled', true);
                var koha = $("#koha").attr('disabled', true);

                shfaqfaturataktive();
            }
        });


    } else {
        alert("mos qo thate");

        // $("#errormall").removeClass("d-none");
        // $("#deletemall").addClass("d-none");
        // $("#updatemall").addClass("d-none");
    }

}
//thirrja dhe inicializimi i Vlerave te Ruajtes lokale ne browser me localStorage
var inicializoshifrenefatures = localStorage.getItem("shifrafatures");
var inicializoemrinefurnitorit = localStorage.getItem("emrifurnitorit");
var inicializokohen = localStorage.getItem("koha");


//mbishkrimi i inputave me vleren e ruajtes lokale ne broweser (localstorage) 

$("#shifrafatures").val(inicializoshifrenefatures);
$("#emrifurnitorit").val(inicializoemrinefurnitorit);
$("#koha").val(inicializokohen);


//nese egizston ruajtja lokale ne browser
if (localStorage["shifrafatures"] && localStorage["emrifurnitorit"] && localStorage["koha"]) {

    //shto atributin DISABLED inputave 
    $("#shifrafatures").attr('disabled', true);
    $("#emrifurnitorit").attr('disabled', true);
    $("#koha").attr('disabled', true);
} else {
    //nese nuk egizston ruajtja lokale ne browser largo Attributin DISABLED inputave
    $("#shifrafatures").attr('disabled', false);
    $("#emrifurnitorit").attr('disabled', false);
    $("#koha").attr('disabled', false);
}


function mbyllfaturen() {

    //pastron te dhenat nga ruajtja lokale ne browser pasi ta ket mbyllur faturen.
    localStorage.removeItem("shifrafatures");
    localStorage.removeItem("emrifurnitorit");
    localStorage.removeItem("koha");

    //inputat jav jep vleren e thate 
    $("#shifrafatures").val('');
    $("#emrifurnitorit").val('');
    $("#koha").val('');

    //atributin disabled ja heq inputav te cilat jane thirr me ID
    var shifrafatures = $("#shifrafatures").attr('disabled', false);
    var emrifurnitorit = $("#emrifurnitorit").attr('disabled', false);
    var emrifurnitorit = $("#koha").attr('disabled', false);
    //ganc noja mesin inputat njejt si te tjerat....



    var pasiv = $("#pasiv").val();
    var forma = new FormData();
    forma.append('pasiv', pasiv);

    if (pasiv != "") {

        $.ajax({
            url: 'Controllers/furnizimiController.php',
            cache: false,
            contentType: false,
            processData: false,
            data: forma,
            pasiv: pasiv,
            dataType: "text",
            type: "post",

            success: function(mbylljaefatures) {
                location.href = "furnizimi";
            }
        });

    } else {
        alert("nuk mundeni me e mbyll faturen  , duhet te klikoni buttonin Mbyll Faturen");
    }
}

function ndryshofurniziminaktiv(ndryshofurniziminaktiv) {

    var ndryshofurniziminaktiv = ndryshofurniziminaktiv;
    furnizimiaktiv = new FormData();
    furnizimiaktiv.append("ndryshofurniziminaktiv", ndryshofurniziminaktiv);
    $.ajax({
        url: 'Controllers/edit.php',
        method: "POST",
        data: furnizimiaktiv,
        ndryshofurniziminaktiv: ndryshofurniziminaktiv,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(resultatet) {
            var vlerablerjes = resultatet['qmimiblerjes'] * resultatet['sasia'];
            var vlerashitjes = resultatet['qmimishitjes'] * resultatet['sasia'];

            $("#editfurnizimiaktiv").val(resultatet["id_furnizimi"]);
            $("#editemriproduktitaktiv").val(resultatet["emriproduktit_fk"]);
            $("#editqmimiblerjesaktiv").val(resultatet["qmimiblerjes"]);
            $("#editqmimishitjesaktiv").val(resultatet["qmimishitjes"]);
            $("#editsasiaaktiv").val(resultatet["sasia"]);
            $("#editvlerablerjes").val(vlerablerjes);
            $("#editvlerashitjes").val(vlerashitjes);
        }
    });

}

function perditsonfurniziminaktiv() {

    var editfurnizimiaktiv = $("#editfurnizimiaktiv").val();
    var editemriproduktitaktiv = $("#editemriproduktitaktiv").val();
    var editqmimiblerjesaktiv = $("#editqmimiblerjesaktiv").val();
    var editqmimishitjesaktiv = $("#editqmimishitjesaktiv").val();
    var editsasiaaktiv = $("#editsasiaaktiv").val();
    // var   editvlerablerseaktiv   = $("editvlerablerseaktiv").val();
    // var   editvlerashitseaktiv   = $("editvlerashitseaktiv").val();
    var furnizimi_faturave_aktive = new FormData();

    furnizimi_faturave_aktive.append('editfurnizimiaktiv', editfurnizimiaktiv);
    furnizimi_faturave_aktive.append('editemriproduktitaktiv', editemriproduktitaktiv);
    furnizimi_faturave_aktive.append('editqmimiblerjesaktiv', editqmimiblerjesaktiv);
    furnizimi_faturave_aktive.append('editqmimishitjesaktiv', editqmimishitjesaktiv);
    furnizimi_faturave_aktive.append('editsasiaaktiv', editsasiaaktiv);
    // furnizimi_faturave_aktive.append('editvlerablerseaktiv'        , editvlerablerseaktiv);
    // furnizimi_faturave_aktive.append('editvlerashitseaktiv'        , editvlerashitseaktiv);


    if (editfurnizimiaktiv != "" && editemriproduktitaktiv != "" && editqmimiblerjesaktiv != "" && editqmimishitjesaktiv != "" && editsasiaaktiv != "") {

        $.ajax({
            url: "Controllers/furnizimiController.php",
            type: "POST",
            data: furnizimi_faturave_aktive,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "text",
            success: function(results) {
                $("#exampleModal").modal("hide");

                shfaqfaturataktive();
            }
        });

    } else {


    }
}

function fshifurniziminaktiv(deletefurniziminaktiv) {
    $.ajax({

        type: 'GET',
        url: 'Controllers/furnizimiController.php',
        data: {
            'deletefurniziminaktiv': deletefurniziminaktiv
        },
        success: function(results) {
            // $("#insertmall").addClass("d-none");
            // $("#errormall").addClass("d-none");
            // $("#deletemall").removeClass("d-none");
            // $("#updatemall").addClass("d-none");
            shfaqfaturataktive();
        }

    });
}

function fshifurniziminpasiv(deletefurniziminpasiv) {
    $.ajax({

        type: 'GET',
        url: 'Controllers/furnizimiController.php',
        data: {
            'deletefurniziminpasiv': deletefurniziminpasiv
        },
        success: function(results) {

            window.location.reload();
        }

    });
}
var sasiabuton = $("#sasiabuton");

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}
function shto() {

    var kerkoemriproduktit = $("#kerkoemriproduktit").val();
    var kerkoqmimishitjes  = $("#kerkoqmimishitjes").val();
    var sasiabuton         = $("#sasiabuton").val();
    var kerkobarkodi       = $("#kerkobarkodi").val();
    var nrserik            = $("#nrserik").val();
    var searchtext         = $("#searchtext").val();
    var produktishitur     = new FormData();





    produktishitur.append('kerkoemriproduktit', kerkoemriproduktit);
    produktishitur.append('kerkoqmimishitjes', kerkoqmimishitjes);
    produktishitur.append('sasiabuton', sasiabuton);
    produktishitur.append('kerkobarkodi', kerkobarkodi);
    produktishitur.append('nrserik', nrserik);

    if (sasiabuton == "") {
        $("#sasiabuton").css("border", "3px solid gray");
    } else {
        $("#sasiabuton").css("border", "0px solid gray");
    }
    if (searchtext == "") {
        $("#searchtext").css("border", "3px solid gray");
    } else {
        $("#searchtext").css("border", "0px solid gray");
    }
    if (kerkoemriproduktit != "" && kerkoqmimishitjes != "" && sasiabuton != "" && kerkobarkodi != "" && searchtext != "") {

        $.ajax({
            url: 'Controllers/furnizimiController.php',
            cache: false,
            contentType: false,
            processData: false,
            data: produktishitur,
            kerkoemriproduktit: kerkoemriproduktit,
            kerkoqmimishitjes: kerkoqmimishitjes,
            sasiabuton: sasiabuton,
            kerkobarkodi: kerkobarkodi,
            nrserik: nrserik,
            dataType: "text",
            type: "post",

            success: function(rezultati) {
                $("#sasiabuton").css("border", "0");
                $("#searchtext").css("border", "0");
                $("#here").load(window.location.href + " #here");
                $("#results").load(window.location.href + " #results");
                $("#qmimipostes").load(window.location.href + " #qmimipostes");
                $("#qmimiiborgj").load(window.location.href + " #qmimiiborgj");
                $("#qmimiborgjit").load(window.location.href + " #qmimiborgjit");
                $("#shitjetekuponave").load(window.location.href + " #shitjetekuponave");
                $("#shfaqkuponatfiskal" ).load(window.location.href + " #shfaqkuponatfiskal" );   
                var searchtext = $("#searchtext").val("");
                var kerkoqmimishitjes = $("#kerkoqmimishitjes").val("");
                var sasiabuton = $("#sasiabuton").val("");
                shfaqshitjet();
            }
        });
    }
    window.location.href="dashboard";
}
// var inicializoshifrenefatures    = localStorage.getItem("nrserik");


var totaliPageses = document.querySelector("#totali2").value;
var a = document.querySelector("#gjithsejshitje").value = Number(totaliPageses);
document.querySelector("#gjithsejshitje").value = a;

function perditsoveshtrimin() {
    var editfurnizimiaktiv = $("#editfurnizimiaktiv").val();
    var editemriproduktitaktiv = $("#editemriproduktitaktiv").val();
    var editqmimiblerjesaktiv = $("#editqmimiblerjesaktiv").val();
    var editqmimishitjesaktiv = $("#editqmimishitjesaktiv").val();
    var editsasiaaktiv = $("#editsasiaaktiv").val();
    // var   editvlerablerjes      = $("editvlerablerjes").val();
    // var   editvlerashitjes      = $("editvlerashitjes").val();


    var furnizimi_faturave_aktive = new FormData();


    furnizimi_faturave_aktive.append('editfurnizimiaktiv', editfurnizimiaktiv);
    furnizimi_faturave_aktive.append('editemriproduktitaktiv', editemriproduktitaktiv);
    furnizimi_faturave_aktive.append('editqmimiblerjesaktiv', editqmimiblerjesaktiv);
    furnizimi_faturave_aktive.append('editqmimishitjesaktiv', editqmimishitjesaktiv);
    furnizimi_faturave_aktive.append('editsasiaaktiv', editsasiaaktiv);
    furnizimi_faturave_aktive.append('editsasiaaktiv', editsasiaaktiv);
    furnizimi_faturave_aktive.append('editsasiaaktiv', editsasiaaktiv);
    // furnizimi_faturave_aktive.append('editvlerablerseaktiv'        , editvlerablerseaktiv);
    // furnizimi_faturave_aktive.append('editvlerashitseaktiv'        , editvlerashitseaktiv);


    if (editfurnizimiaktiv != "" && editemriproduktitaktiv != "" && editqmimiblerjesaktiv != "" && editqmimishitjesaktiv != "" && editsasiaaktiv != "") {

        $.ajax({
            url: "Controllers/furnizimiController.php",
            type: "POST",
            data: furnizimi_faturave_aktive,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "text",
            success: function(results) {
                $("#exampleModal").modal("hide");
                window.location.reload();
                shfaqfaturataktive();
            }
        });

    } else {


    }
}

function kerko() {
    var teksti = $("#searchtext").val();

    if (teksti != "") {


        $.ajax({
            url: "Controllers/furnizimiController.php",
            method: "POST",
            data: {
                search: teksti
            },

            success: function(results) {

                $("#results").html(results);
            }
        });
    } else {

        $("#results").html('');
    }
}

function mbyllfaturen2() {
    // var remember = $("#smoking").val();
    //      if(remember == 1){

    //      var a = document.getElementById('kusuri').value;
    //      var b = document.getElementById('pagoi').value;
    //      var c = document.getElementById('total').value;


    //      if(a !="" && b !="" && c !=""){
    //         window.location.href="invoke?kusuri="+a+"&pagoi="+b+"&totali="+c+"";    
    //      }else{
    //         window.location.href="invoke?kusuri=0&pagoi=0&totali=0";  
    //      }

    // }else{
    //   console.log(" ");
    // }
    var mbylljaefatures = "i mbyllur";
    $.ajax({
        method: 'POST',
        data: {
            mbylljaefatures: mbylljaefatures
        },
        url: "Controllers/furnizimiController.php",
        success: function(results) {
            Swal.fire({
                type: 'success',
                title: 'Fatura eshte mbyllur me sukses',
                showConfirmButton: false,
                timer: 1700
            })
            setTimeout(function() {
                location.reload();
            }, 1700);
        }
    });
}

function shfaqshitjet() {
    $.ajax({
        method: 'POST',
        url: "Controllers/shitjeController.php",
        success: function(results) {


            $("#shitjet").html(results);
        }
    });

}


function fshishitjen(idshitja) {
    var idshitja = idshitja;
    $.ajax({

        type: 'GET',
        url: 'Controllers/furnizimiController.php',
        data: {
            'idshitja': idshitja
        },
        success: function(results) {
            $("#here").load(window.location.href + " #here");
            Swal.fire({
                type: 'success',
                title: 'Shitja eshte fshire me sukses',
                showConfirmButton: false,
                timer: 1700
            })
            shfaqshitjet();
        }

    });
}

function pagesa() {
    var totali = $("#totali2").val();

    var total = $("#total").val(totali);

    var pagoi = $("#pagoi").val();



}

function llogaritkusurin() {

    var total = $("#total").val();

    var pagoi = $("#pagoi").val();

    var totalarka = (pagoi - total);

    localStorage.setItem('total', total);
    localStorage.setItem('pagoi', pagoi);

    if (pagoi != "") {
        // var kusuri = $('#kusuri').val(totalarka);
        // parseFloat(kusuri[25]).toFixed(2)          
        var kusuri = $('#kusuri').val(totalarka.toFixed(2));

        // console.log(localstorage.getItem('kusuri'));

    } else {
        var kusuri = $('#kusuri').val('');
    }
}

function shfaqkuponatfiskal() {

    $.ajax({
        method: 'POST',
        url: "Controllers/kuponfiskalController.php",
        success: function(results) {
            $("#shfaqkuponatfiskal").html(results);
        }
    });

}

function fshikuponin(fshikuponinid) {
    var fshikuponinid = fshikuponinid;

    $.ajax({
        type: 'GET',
        url: 'Controllers/kuponfiskalController.php',
        data: {
            'fshikuponinid': fshikuponinid
        },
        success: function(results) {

            $("#shitjetekuponave").load(window.location.href + " #shitjetekuponave");
        }

    });

}

function printokuponat() {

    var options = document.querySelectorAll(".options1");
    var i;
    for (i = 0; i < options.length; i++) {
        options[i].style.visibility = "hidden";
    }
    document.getElementById("option-th1").style.visibility = "hidden";
    var divToPrint = document.getElementById("printoKuponatFiskal");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
    location.reload();

}

// $(document).ready(function () {
//   $("#searchmall1").on("keyup", function () {
//     var value = $('#searchmall1').val().toLowerCase();
//     $("#shfaqkuponatditor tr").filter(function () {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
// });

function printFaturen() {
    var options = document.querySelectorAll(".options");
    var i;
    for (i = 0; i < options.length; i++) {
        options[i].style.visibility = "hidden";
    }
    document.getElementById("option-th").style.visibility = "hidden";
    var divToPrint = document.getElementById("printTable2");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
    location.reload();
}