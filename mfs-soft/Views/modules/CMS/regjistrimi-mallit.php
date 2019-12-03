<section id="regjistrimi-mallit">
    <div class="container-fluid">
        <div class="alert alert-success alert-dismissible d-none" id="insertmall">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sukses! </strong> regjistrimi perfundoi me sukses .
        </div>
        <div class="alert alert-danger alert-dismissible d-none" id="errormall">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>*Gabim! </strong> fushat duhet te jene te plotesuara .
        </div>
        <div class="alert alert-warning alert-dismissible d-none" id="deletemall">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fshi! </strong> fshirja perfundoi me sukses .
        </div>
        <div class="alert alert-success alert-dismissible d-none" id="updatemall">
            <a href="#" class="close" data-dismissin="alert" aria-label="close">&times;</a>
            <strong>Ndryshimi! </strong> ndryshimi perfundoi me sukses .
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p class="font-weight-bold mb-5">Regjistro mall te ri</p>

                        <div class="d-lg-flex mb-4 mt-4">
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label for="">Barkodi</label>
                                    <input type="number" class="form-control" name="" id="barkod" placeholder="Barkodi">
                                </div>
                                <div class="form-group">
                                    <label for="">Emertimi i artikullit</label>
                                    <input type="text" class="form-control" name="" id="artikulli" placeholder="Emertimi i artikullit">
                                </div>
                                <div class="form-group">
                                    <label for="">Çmimi i shitjes</label>
                                    <input type="number" min="1" class="form-control" name="" id="qmimishitjes" placeholder="Qmimi i shitjes">
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label for="">Njesia</label>
                                    <select class="form-control" id="njesia">
                                        <option>Selekto Njesinë</option>
                                        <option value="cope">Copë</option>
                                        <option value="Liter">Litër</option>
                                        <option value="kg">KG</option>
                                        <option value="meter">Metër</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Perqindja TVSH</label>
                                    <input type="number" min="1" class="form-control" name="" id="tvsh" placeholder="Perqindja TVSH">
                                </div>
                                <div class="form-group">
                                    <label for="">Sasia minimale</label>
                                    <input type="number" min="1" class="form-control" name="" id="sasiaminimale" placeholder="Sasia minimale">
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label for="">Pershkrimi rreth produktit</label>
                                    <textarea placeholder="Pershkrimi rreth produktit" id="pershkrimi" name=""></textarea>
                                </div>
                                <input type="button" class="btn custom-btn" onclick="regjistrimimallit();" value="Ruaje">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-5 custom-card">
                    <div class="card-body">
                        <p class="font-weight-bold mt-2">Mall i ri</p>
                        <div class="d-flex">

                            <div class="form-group d-flex ml-1">
                                <input type="search" class="form-control w-100 custom-search searchInput" placeholder="Kerko mallin" name="searchmall" id="searchmall" oninput="searchmall()">
                                <i class="fa fa-search icon-search"></i>
                            </div>

                            <div class="ml-auto">
                                <a href="" class="btn btn-printo mb-3 d-flex" onclick="printDatas();">
                                    <img src="Views/assets/images/Icon feather-printer.png" class="ml-3" alt="">
                                    <p class="ml-3 mt-1">Printo</p>
                                </a>
                            </div>
                        </div>
                        <div class="custom-table-scroll">
                            <table class="table" cellpadding="4" id="printTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Emri i produktit</th>
                                        <th>Barkodi</th>
                                        <th>Qmimi i shitjes</th>
                                        <th>Sasia</th>
                                        <th>Njesia</th>
                                        <th id="option-th">Opcione</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white" id="shfaqregjistriminemallit">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Filter tables
    </script>
    <!-- Modal Barkodi -->
    <div class="modal fade custom-modal-barkod" id="barkodi" tabindex="-1" role="dialog" aria-labelledby="custom-modal-barkodi" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <p class="modal-title" id="custom-modal-post">Shtypja e barkodeve</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                    </button>
                </div>
                <div class="modal-body">

                    <div>

                        <form class="form-horizontal" method="post" action="barcode.php">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="product">Emri i Mallit:</label>
                                <div class="col-sm-10">
                                    <input autocomplete="OFF" type="text" class="form-control" name="emrimallit" id="emrimallit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="product_id">Barkodi:</label>
                                <div class="col-sm-10">
                                    <input autocomplete="OFF" type="text" class="form-control" name="barcode" id="barcode">
                                </div>
                            </div>
                            <!-- 			    <div class="form-group">
			      <label class="control-label col-sm-2" for="rate">Qmimi</label>
			      <div class="col-sm-10">          
			        <input autocomplete="OFF" type="text" class="form-control" id="rate"  name="rate">
			      </div>
			    </div> -->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="print_qty">Sasia</label>
                                <div class="col-sm-10">
                                    <input autocomplete="OFF" type="print_qty" class="form-control" name="sasia" id="sasia">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success" style="float: right;" name="submitd">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade custom-modal-edit" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <p class="modal-title" id="custom-modal-Cash">Regjistrimi i Mallit</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="alert alert-danger alert-dismissible d-none" id="errormodalmall">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>*Gabim! </strong> fushat duhet te jene te plotesuara .
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-5">
                                <input type="text" name="" id="regjistrimimallitID" class="d-none">
                                <div class="form-group">
                                    <label for="">Emri Produktit</label>
                                    <input type="text" class="form-control" name="" id="ndryshoartikulli">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Barkodi</label>
                                    <input type="number" min="1" class="form-control" name="" id="ndryshobarkod">
                                </div>
                            </div>
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <label for="">Qimi i shitjes</label>
                                    <input type="number" min="1" class="form-control" name="" id="ndryshoqmimishitjes">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Sasia</label>
                                    <input type="number" min="1" class="form-control" name="" id="ndryshosasiaminimale">
                                </div>
                            </div>
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <label for="">Njesia</label>
                                    <select class="form-control" id="ndryshonjesia">
                                        <option>Selekto Njesinë</option>
                                        <option value="cope">Copë</option>
                                        <option value="Liter">Litër</option>
                                        <option value="kg">KG</option>
                                        <option value="meter">Metër</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Mbyll</button>
                    <input type="submit" value="Perditso Ndryshimet" class="btn btn-success" id="perditsoeegj" onclick="perditesoregjistriminemallit()">
                </div>
               
            </div>
        </div>
    </div>
</section>