shfaqjregjistriminemallit();


$(document).ready(function() {
    $("#stokusearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


$(document).ready(function() {
    $("#searchmall").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

function ndryshogjistriminemallit(ndryshomallin) {
    var ndryshomallin = ndryshomallin;
    data = new FormData();
    data.append("ndryshomallin", ndryshomallin);
    $.ajax({
        url: 'Controllers/edit.php',
        method: "POST",
        data: data,
        ndryshomallin: ndryshomallin,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(resultatet) {
            $("#regjistrimimallitID").val(resultatet["id"]);
            $("#ndryshoartikulli").val(resultatet["emriproduktit"]);
            $("#ndryshobarkod").val(resultatet["barkodi"]);
            $("#ndryshoqmimishitjes").val(resultatet["qmimishitjes"]);
            $("#ndryshosasiaminimale").val(resultatet["sasiaminimale"]);
            $("#ndryshonjesia").val(resultatet["njesia"]);
        }
    });
}


function perditesoregjistriminemallit() {
    window.location.href="regjistrimi-mallit";

    var regjistrimimallitID = $("#regjistrimimallitID").val();
    var perditesoartikulli = $("#ndryshoartikulli").val();
    var perditesobarkod = $('#ndryshobarkod').val();
    var perditesoqmimishitjes = $("#ndryshoqmimishitjes").val();
    var perditesosasiaminimale = $("#ndryshosasiaminimale").val();
    var perditesonjesia = $("#ndryshonjesia").val();

    var forma_e_perditesimit = new FormData();

    forma_e_perditesimit.append('regjistrimimallitID', regjistrimimallitID);
    forma_e_perditesimit.append('ndryshoartikulli', perditesoartikulli);
    forma_e_perditesimit.append('ndryshobarkod', perditesobarkod);
    forma_e_perditesimit.append('ndryshoqmimishitjes', perditesoqmimishitjes);
    forma_e_perditesimit.append('ndryshosasiaminimale', perditesosasiaminimale);
    forma_e_perditesimit.append('ndryshonjesia', perditesonjesia);


    if (regjistrimimallitID != "" && perditesoartikulli != "" && perditesobarkod != "" && perditesoqmimishitjes != "" && perditesosasiaminimale != "" && perditesonjesia != "") {

        $.ajax({
            url: "Controllers/regjistrimimallitController.php",
            type: "POST",
            data: forma_e_perditesimit,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "text",
            success: function(results) {

                $("#insertmall").addClass("d-none");
                $("#errormall").addClass("d-none");
                $("#deletemall").addClass("d-none");
                $("#updatemall").removeClass("d-none");
                $("#errormodalmall").addClass("d-none");
                $('#exampleModal').modal('hide');
     
                shfaqjregjistriminemallit();
            }
        });

    } else {
        $("#insertmall").addClass("d-none");
        $("#errormall").addClass("d-none");
        $("#deletemall").addClass("d-none");
        $("#updatemall").addClass("d-none");
        $("#errormodalmall").removeClass("d-none");
    }
}

function shfaqjregjistriminemallit() {

    $.ajax({
        method: 'POST',
        url: "Controllers/regjistrimimallitController.php",
        success: function(results) {
            $("#shfaqregjistriminemallit").html(results);
        }
    });

}


function regjistrimimallit() {

    var barkod = $('#barkod').val();
    var artikulli = $('#artikulli').val();
    var qmimishitjes = $('#qmimishitjes').val();
    var njesia = $('#njesia').val();
    var tvsh = $('#tvsh').val();
    var sasiaminimale = $('#sasiaminimale').val();
    var pershkrimi = $('#pershkrimi').val();

    var malli = new FormData();

    malli.append('barkod', barkod);
    malli.append('artikulli', artikulli);
    malli.append('qmimishitjes', qmimishitjes);
    malli.append('njesia', njesia);
    malli.append('tvsh', tvsh);
    malli.append('sasiaminimale', sasiaminimale);
    malli.append('pershkrimi', pershkrimi);

    if (barkod != "" && artikulli != "" && qmimishitjes != "" && njesia != "" && tvsh != "" && sasiaminimale != "") {

        $.ajax({
            url: 'Controllers/regjistrimimallitController.php',
            cache: false,
            contentType: false,
            processData: false,
            data: malli,
            barkod: barkod,
            artikulli: artikulli,
            qmimishitjes: qmimishitjes,
            njesia: njesia,
            tvsh: tvsh,
            sasiaminimale: sasiaminimale,
            pershkrimi: pershkrimi,
            dataType: "text",
            type: "post",

            success: function(rezultatet) {

                var barkod = $("#barkod").val('');
                var artikulli = $("#artikulli").val('');
                var qmimishitjes = $("#qmimishitjes").val('');
                var njesia = $("#njesia").val('');
                var tvsh = $("#tvsh").val('');
                var sasiaminimale = $("#sasiaminimale").val('');
                var pershkrimi = $("#pershkrimi").val('');

                $("#insertmall").removeClass("d-none");
                $("#errormall").addClass("d-none");
                $("#deletemall").addClass("d-none");
                $("#updatemall").addClass("d-none");
                shfaqjregjistriminemallit();

            }
        });

    } else {
        $("#insertmall").addClass("d-none");
        $("#errormall").removeClass("d-none");
        $("#deletemall").addClass("d-none");
        $("#updatemall").addClass("d-none");
    }

}

function barkod(barkodid) {
    var barkodid = barkodid;
    data = new FormData();
    data.append("barkodid", barkodid);
    $.ajax({
        url: 'Controllers/edit.php',
        method: "POST",
        data: data,
        barkodid: barkodid,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(resultatet) {

            // $("#regjistrimimallitID").val(resultatet["id"]);
            $("#barcode").val(resultatet["barkodi"]);
            $("#ndryshobarkod").val(resultatet["emriproduktit"]);
            $("#emrimallit").val(resultatet["emriproduktit"]);
            $("#sasia").val(resultatet["sasiaminimale"]);

        }
    });
}

function fshiregjistriminemallit(regjistrimimallitID) {

    $.ajax({

        type: 'GET',
        url: 'Controllers/regjistrimimallitController.php',
        data: {
            'regjistrimimallitID': regjistrimimallitID
        },
        success: function(results) {
            $("#insertmall").addClass("d-none");
            $("#errormall").addClass("d-none");
            $("#deletemall").removeClass("d-none");
            $("#updatemall").addClass("d-none");
            shfaqjregjistriminemallit();
        }

    });

}