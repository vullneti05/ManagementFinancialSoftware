<section id="regjistrimi-biznesit">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11 col-md-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="row">
                            <p class="mr-auto mt-3 ml-3">Sheno detajet e biznesit</p>
                            <a href="bizneset">
                                <img src="Views/assets/images/Icon ionic-ios-close-circle-outline.png" alt="">
                            </a>
                        </div>
                        <div class="row custom-row-input">
                            <div class="col-lg-6 col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="">Emri i kompanis</label>

                                    <input type="text" class="form-control" name="" id="kompania">
                                </div>
                                <div class="form-group">
                                    <label for="">Qyteti</label>
                                    <select class="form-control" id="qyteti">
                                        <option value="Ferizaj">FERIZAJ</option>
                                        <option value="Prishtine">PRISHTINE</option>
                                        <option value="Prizren">PRIZREN </option>
                                        <option value="Gilan">GILAN </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Adresa</label>
                                    <input type="text" class="form-control" name="" id="adresa">
                                </div>
                                <div class="form-group">
                                    <label for="">Nr.Biznesit</label>
                                    <input type="number" min="1" class="form-control" name="" id="nrbiznesit">
                                </div>
                                <div class="form-group">
                                    <label for="">Nr.Fiskal</label>
                                    <input type="number" min="1" class="form-control" name="" id="nrfiskal">
                                </div>
                                <div class="form-group">
                                    <label for="">Linku</label>
                                    <input type="text" class="form-control" name="" id="linku">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="">Emri dhe mbiemri i pronarit</label>
                                    <input type="text" class="form-control" name="" id="pronari">
                                </div>
                                <div class="form-group">
                                    <label for="">Nr.Telefonit </label>
                                    <input type="number" min="1" class="form-control" name="" id="nrtelefoni">
                                </div>
                                <div class="form-group">
                                    <label for="">Data Skadences</label>
                                    <input type="text" class="form-control wu-input border-gray" date="datepicker" id="dataskadences" placeholder="Filtro me date">
                                </div>
                                <div class="form-group">
                                    <label for="">Statusi</label>
                                    <select class="form-control" id="statusi">
                                        <option value="aktiv">Aktiv</option>
                                        <option value="pasiv">Pasiv</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nr.Artikujve</label>
                                    <input type="number" min="1" class="form-control" name="" id="nrartikujve">
                                </div>
                                <div class="form-group">
                                    <label for="">DataBaza</label>
                                    <select class="form-control" id="databaza">
                                        <option value="">Zgjedh Databazen</option>
                                        <?php 
                                        $databaza = new administrataModels();
                                        $databaza->shfaqdbt();
                                        foreach($databaza->shfaqdbt() as $databazat){
                                            echo '<option value="'.$databazat['emridatabazes'].'">'.$databazat['emridatabazes'].'</option>';
                                        }

                                        ?>
                                        
                                        <option value="Restaurant">Restaurant</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Fjalkalimi</label>
                                    <input type="password" class="form-control" name="" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="">Qmimi</label>
                                    <input type="number" min="1" class="form-control" name="" id="qmimi">
                                </div>
                                <div class="form-group mt-5">
                                    <button class="btn" onclick="aktivizo1()">Aktivizo1</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-12 ml-lg-0 ml-md-3 mt-md-2 mt-lg-5">
                <div class="form-group">
                    <a href="#" class="btn">Biznes i ri</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function aktivizo1() {

        var kompania        = $("#kompania").val();
        var qyteti          = $("#qyteti").val();
        var adresa          = $("#adresa").val();
        var nrbiznesit      = $("#nrbiznesit").val();
        var nrfiskal        = $("#nrfiskal").val();
        var linku           = $("#linku").val();
        var pronari         = $("#pronari").val();
        var nrtelefoni      = $("#nrtelefoni").val();
        var dataskadences   = $("#dataskadences").val();
        var statusi         = $("#statusi").val();
        var nrartikujve     = $("#nrartikujve").val();
        var databaza        = $("#databaza").val();
        var password        = $("#password").val();
  
        var qmimi           = $("#qmimi").val();

         var biznesi = new FormData();

        biznesi.append('kompania'       , kompania);
        biznesi.append('qyteti'         , qyteti);
        biznesi.append('adresa'         , adresa);
        biznesi.append('nrbiznesit'     , nrbiznesit);
        biznesi.append('nrfiskal'       , nrfiskal);
        biznesi.append('linku'          , linku);
        biznesi.append('pronari'        , pronari);
        biznesi.append('nrtelefoni'     , nrtelefoni);
        biznesi.append('dataskadences'  , dataskadences);
        biznesi.append('statusi'        , statusi);
        biznesi.append('nrartikujve'    , nrartikujve);
        biznesi.append('databaza'       , databaza);
        biznesi.append('password'       , password);
        biznesi.append('qmimi'          , qmimi);

        if (kompania != "" && qyteti != "" && adresa != "" && nrbiznesit != "" && nrfiskal != "" && linku != "" && pronari != "" && nrtelefoni != "" && dataskadences != "" && statusi != "" && nrartikujve != "" && databaza != "" &&  password != "" && qmimi != "") {

            $.ajax({
                url: 'Controllers/administrataController.php',
                cache: false,
                contentType: false,
                processData: false,
                data: biznesi,
                kompania: kompania,
                qyteti: qyteti,
                adresa: adresa,
                nrbiznesit: nrbiznesit,
                nrfiskal: nrfiskal,
                linku: linku,
                pronari: pronari,
                nrtelefoni: nrtelefoni,
                dataskadences: dataskadences,
                nrartikujve: nrartikujve,
                databaza: databaza,
                password: password,
                qmimi: qmimi,
                statusi: statusi,
                dataType: "text",
                type: "post",

                success: function(rezultatet) {

                    alert("Ju keni shtuar nje Biznes te ri");

                    var kompania = $("#kompania").val('');
                    var qyteti = $("#qyteti").val('');
                    var adresa = $("#adresa").val('');
                    var nrbiznesit = $("#nrbiznesit").val('');
                    var nrfiskal = $("#nrfiskal").val('');
                    var linku = $("#linku").val('');
                    var pronari = $("#pronari").val('');
                    var nrtelefoni = $("#nrtelefoni").val('');
                    var dataskadences = $("#dataskadences").val('');
                    var nrartikujve = $("#nrartikujve").val('');
                    var databaza = $("#databaza").val('');
                    var password = $("#password").val('');
                    var qmimi = $("#qmimi").val('');
                    var statusi = $("#statusi").val('');

                }
            });

        } else {
            alert("te gjitha fushat duhet te jene te plotesuara");
        }
    }
</script>