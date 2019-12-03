</div>
</div>
<script src="Views/assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="Views/assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- Date -->
<script src="Views/assets/js/moment.min.js"></script>
<script src="Views/assets/js/datepicker.min.js"></script>
<!-- AJAX -->
<script src="Views/assets/js/main.js"></script>
<script src="Views/Ajax/regjistrimimallit.js"></script>
<script src="Views/Ajax/furnizimimallit.js"></script>
<script src="Views/Ajax/posta.js"></script>
<script src="Views/Ajax/borgji.js"></script>
<script src="Views/Ajax/cash.js"></script>
<script src="Views/Ajax/shfrytzuesit.js"></script>
<script src="Views/Ajax/statistikat.js"></script>
<script src="Views/Ajax/arka.js"></script>

<script src="node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<!-- <script>
  $('input[date="datepicker"]').daterangepicker({
    format: 'yyyy-dd-mm',
      "singleDatePicker": true,
      "dateLimit": {
      "days": 7
    },
    "alwaysShowCalendars": true,
    "minDate": "10/17/2019"
  });
</script> -->
<script>
      // Print table function
function printDatas() {
  var options = document.querySelectorAll(".optionn");
  var i;
  for (i = 0; i < options.length; i++) {
    options[i].style.visibility = "hidden";
  }
    document.getElementById("option-th").style.visibility = "hidden";
  var divToPrint = document.getElementById("printTable");
  newWin = window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
  location.reload();
}
</script>

</body>
</html>