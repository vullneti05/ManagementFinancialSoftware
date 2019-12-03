function startoarken() {
    var data1 = $("#data").val();
    var shuma = $("#shuma").val();
    var komenti = $("#komenti").val();
    var puntori = $("#puntori").val();

    localStorage.setItem("data", data1);
    localStorage.setItem("shuma", shuma);
    localStorage.setItem("komenti", komenti);


    var arka = new FormData();

    arka.append('data', data1);
    arka.append('shuma', shuma);
    arka.append('komenti', komenti);
    arka.append('puntori', puntori);

    if (data !== "" && shuma !== "" && komenti !== "" && puntori !== "") {

        $.ajax({
            url: 'Controllers/arkaController.php',
            cache: false,
            contentType: false,
            processData: false,

            data: arka,
            shuma: shuma,
            komenti: komenti,
            data1: data,
            puntori: puntori,
            dataType: "text",
            type: "post",

            success: function(rezultatet) {
                var dataeruajtur = localStorage.getItem('data');
                var shumaeruajtur = localStorage.getItem('shuma');
                var komentirujatur = localStorage.getItem('komenti');
                window.location.href = "dashboard";


            }
        });
    } else {
        alert("mos qo thate");
    }
}
var fillimiarkes = $("#fillimiarkes").val(localStorage.getItem('shuma'));
var fillimiarkes = $("#komentiarkes").val(localStorage.getItem('komenti'));

function calcshitjen() {
    var totaliPageses = document.querySelector("#totali2").value;
    totaliPageses=totaliPageses.tofixed(2);
    var a = document.querySelector("#qmimi").value = Number(totaliPageses);
    document.querySelector("#qmimi").value = a;


}


function mbyllarken() {


    var totaliarkes = $("#totaliarkes").val();

    var totaliark = new FormData();

    totaliark.append('totaliarkes', totaliarkes);

    if (totaliarkes !== "") {

        $.ajax({
            url: 'Controllers/arkaController.php',
            cache: false,
            contentType: false,
            processData: false,

            data: totaliark,
            totaliarkes: totaliarkes,
            dataType: "text",
            type: "post",

            success: function(rezultatet) {

            }
        });
            // window.location.href = '../mfs-soft';
            window.close();
            window.open('../mfs-soft');


    } else {
        alert("duhet te kete total");
    }

    localStorage.removeItem('shuma');
    localStorage.removeItem('komenti');
    var fillimiarkes = $("#fillimiarkes").val(localStorage.getItem('shuma'));
    var komentiarkes = $("#komentiarkes").val(localStorage.getItem('komenti'));
   

}