<section id="administrata">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11 col-md-12">
                <div class="card mt-5 biznesi-ri-res">
                    <div class="card-body">
                        <p>Veshtrimi i bizneseve</p>
                        <div class="custom-table-scroll">
                            <table class="table bg-white">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Emri i biznesit</th>
                                        <th>Emri i pronarit</th>
                                        <th>Nr.Telefonit</th>
                                        <th>Linku</th>
                                        <th>Statusi</th>
                                        <th>Skadenca</th>
                                        <th>Nr.Artikujve</th>
                                        <th>Databaza</th>
                                        <th>Password</th>
                                        <th>Opcione</th>
                                    </tr>
                                </thead>
                                <tbody id="veshtrimibizneseve">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-12 ml-lg-0 ml-md-3 mt-md-1 mt-lg-5">
                <div class="form-group">
                    <a href="regjistrimi-biznesit" class="btn is">Biznes i ri</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade custom-modal-edit" id="custom-modal-b" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <p class="modal-title" id="custom-modal-Cash">Perditeso te Dhenat</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 mt-md-0 mt-lg-5">
                                <div class="form-group w-75">
                                    <label for="">id</label>
                                    <input type="text" class="form-control" name="" id="editid">
                                </div>
                                <div class="form-group w-75">
                                    <label for="">Emri i biznesit</label>
                                    <input type="text" class="form-control" name="" id="editkompania">
                                </div>
                                <div class="form-group w-75">
                                    <label for="">Emri i pronarit</label>
                                    <input type="text" class="form-control" name="" id="editpronari">
                                </div>
                                <div class="form-group w-75">
                                    <label for="">Nr.Telefonit</label>
                                    <input type="number" min="1" class="form-control" name="" id="editnrtelefoni">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 mt-md-0 mt-lg-5">
                                <div class="form-group w-75">
                                    <label for="">Linku</label>
                                    <input type="text" class="form-control" name="" id="editlinku">
                                </div>
                                <div class="form-group w-75">
                                    <label for="">Skadenca</label>
                                    <input type="text" min="1" class="form-control" name="" id="editdataskadences">
                                </div>
                                <div class="form-group w-75">
                                    <label for="">Nr.Artikujve</label>
                                    <input type="number" min="1" class="form-control" name="" id="editnrartikujve">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 mt-md-0 mt-lg-5">
                                <div class="form-group w-75">
                                    <label for="">Statusi</label>
                                    <select class="form-control" id="editstatusi">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-close" data-dismiss="modal">Mbyll</button>
                    <button type="button" class="btn btn-save-edit pt-lg-1 pt-md-0" onclick="perditsobiznesin()">Perditso Ndryshimet</button>
                </div>
            </div>
        </div>
</section>

<script>
    veshtrobizneset();

    function fshibiznesin(fshibizin) {

        $.ajax({
            type: 'GET',
            url: 'Controllers/administrataController.php',
            data: {
                'fshibizin': fshibizin
            },
            success: function(results) {
                veshtrobizneset();
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        });
    }

    function veshtrobizneset() {
        $.ajax({
            method: 'POST',
            url: "Controllers/administrataController.php",
            success: function(results) {
                $("#veshtrimibizneseve").html(results);
            }
        });
    }

    function ndryshobiznesin(biznesiID) {
        var biznesiID = biznesiID;
        biznesi = new FormData();
        biznesi.append("biznesiID", biznesiID);
        $.ajax({
            url: 'Controllers/edit.php',
            method: "POST",
            data: biznesi,
            biznesiID: biznesiID,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(resultatet) {

                $("#editid").val(resultatet["biznesi_id"]);
                $("#editkompania").val(resultatet["kompania"]);
                $("#editpronari").val(resultatet["pronari"]);
                $("#editnrtelefoni").val(resultatet["nrtelefoni"]);
                $("#editlinku").val(resultatet["linku"]);
                $("#editdataskadences").val(resultatet["dataskadences"]);
                $("#editnrartikujve").val(resultatet["nrartikujve"]);
                if (resultatet['statusi'] == "aktiv") {
                    $('#editstatusi').append('<option value="aktiv">Aktiv</option>');
                    $('#editstatusi').append('<option value="pasiv">Pasiv</option>');
                } else if (resultatet['statusi'] == "pasiv") {
                    $('#editstatusi').append('<option value="pasiv">Pasiv</option>');
                    $('#editstatusi').append('<option value="aktiv">Aktiv</option>');
                }

            }
        });
    }

    function perditsobiznesin() {
        var editid = $("#editid").val();
        var editkompania = $("#editkompania").val();
        var editpronari = $("#editpronari").val();
        var editnrtelefoni = $('#editnrtelefoni').val();
        var editlinku = $("#editlinku").val();
        var editdataskadences = $("#editdataskadences").val();
        var editnrartikujve = $("#editnrartikujve").val();
        var editstatusi = $("#editstatusi").val();

        var ndrysho_te_dhenat_e_biznesin = new FormData();

        ndrysho_te_dhenat_e_biznesin.append('editid', editid);
        ndrysho_te_dhenat_e_biznesin.append('editkompania', editkompania);
        ndrysho_te_dhenat_e_biznesin.append('editpronari', editpronari);
        ndrysho_te_dhenat_e_biznesin.append('editnrtelefoni', editnrtelefoni);
        ndrysho_te_dhenat_e_biznesin.append('editlinku', editlinku);
        ndrysho_te_dhenat_e_biznesin.append('editdataskadences', editdataskadences);
        ndrysho_te_dhenat_e_biznesin.append('editnrartikujve', editnrartikujve);
        ndrysho_te_dhenat_e_biznesin.append('editstatusi', editstatusi);

        if (editid != "" && editkompania != "" && editpronari != "" && editnrtelefoni != "" && editlinku != "" && editdataskadences != "", editnrartikujve != "", editstatusi != "") {

            $.ajax({
                url: "Controllers/administrataController.php",
                type: "POST",
                data: ndrysho_te_dhenat_e_biznesin,
                contentType: false,
                processData: false,
                cache: false,
                dataType: "text",
                success: function(results) {
                    console.log(results);

                    $('#custom-modal-b').modal('hide');

                    veshtrobizneset();
                }
            });

        } else {
            alert("*te gjitha fushat jane obligative");
        }

    }
</script>