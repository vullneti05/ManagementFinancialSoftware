 shfaqshfrytzuesit();

 function fshishfrytzuesin(fshiid) {
     var fshiid = fshiid;

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
                 url: 'Controllers/shfrytzuesitController.php',
                 data: {
                     'fshiid': fshiid
                 },
                 success: function(results) {
                     shfaqshfrytzuesit();
                     Swal.fire({
                         type: 'success',
                         title: 'e dhena eshte fshire me sukses',
                         showConfirmButton: false,
                         timer: 1700
                     })
                 }
             });
         }
     });
 }

 function editshfrytzuesin(editid) {
     var editid = editid;
     data = new FormData();
     data.append("editid", editid);
     $.ajax({
         url: 'Controllers/edit.php',
         method: "POST",
         data: data,
         editid: editid,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function(resultatet) {

             $("#editid").val(resultatet["id"]);
             $("#editemri").val(resultatet["emri"]);
             $("#editpseudonimi").val(resultatet["pseudonimi"]);
             $("#editimage").val(resultatet["editimage"]);
             $("#editfjalkalimi").val(resultatet["fjalkalimi"]);
             $('.shfaqfotoneselektuar').attr('src', 'Views/assets/images/shfrytezuesit/' + resultatet['image']);
             var atributi = resultatet["autorizimi"];
             checked = false;
             if (atributi.indexOf('klient') > 0) {
                 $('#klient-sh').each(function() {
                     this.checked = true;
                 });
             } else {
                 $('#klient-sh').each(function() {
                     this.checked = true;
                 });
             }
             if (atributi.indexOf('shitje') > 0) {
                 $('#editshitje-sh').each(function() {
                     this.checked = true;
                 });
             } else {
                 $('#editshitje-sh').each(function() {
                     this.checked = false;
                 });
             }
             if (atributi.indexOf('furnizimi') > 0) {
                 $('#editfurnizimi-sh').each(function() {
                     this.checked = true;
                 });
             } else {
                 $('#editfurnizimi-sh').each(function() {
                     this.checked = false;
                 });
             }
             if (atributi.indexOf('statistika') > 0) {
                 $('#editstatistika-sh').each(function() {
                     this.checked = true;
                 });
             } else {
                 $('#editstatistika-sh').each(function() {
                     this.checked = false;
                 });
             }
             if (atributi.indexOf('shfrytezues') > 0) {
                 $('#editshfrytezues-sh').each(function() {
                     this.checked = true;
                 });
             } else {
                 $('#editshfrytezues-sh').each(function() {
                     this.checked = false;
                 });
             }

         }
     });
 }

 function shfaqshfrytzuesit() {
     $.ajax({
         method: 'POST',
         url: "Controllers/shfrytzuesitController.php",
         success: function(results) {
             $("#shfaqshfrutzuesit").html(results);
         }
     });
 }




 var loadFile = function(event) {
     var output = document.getElementById('output');
     output.src = URL.createObjectURL(event.target.files[0]);

 }
 var UploadImage = function(event) {
     var output2 = document.getElementById('output2');
     output2.src = URL.createObjectURL(event.target.files[0]);
 }

 function ruaje() {
     var emri = $('#emri').val();
     var pseudonimi = $("#pseudonimi").val();
     var fjalkalimi = $("#fjalkalimi").val();
     var files_data = $('#image').prop('files')[0];
     var image = $("#image").val();

     var akseset = [];
     $("input:checkbox[name=type]:checked").each(function() {
         akseset.push($(this).val());
     });

     var forma_e_shfrytzuesit = new FormData();

     forma_e_shfrytzuesit.append('emri', emri);
     forma_e_shfrytzuesit.append('pseudonimi', pseudonimi);
     forma_e_shfrytzuesit.append('fjalkalimi', fjalkalimi);
     forma_e_shfrytzuesit.append('image', files_data);
     forma_e_shfrytzuesit.append('image', image);
     forma_e_shfrytzuesit.append('akseset', akseset);

     if (emri != "" && pseudonimi != "" && fjalkalimi != "" && image != "" && akseset != "") {
         $.ajax({
             url: 'Controllers/shfrytzuesitController.php',
             cache: false,
             contentType: false,
             processData: false,
             data: forma_e_shfrytzuesit,
             emri: emri,
             pseudonimi: pseudonimi,
             fjalkalimi: fjalkalimi,
             image: image,
             akseset: akseset,

             dataType: "text",
             type: 'post',
             success: function(results) {
                 Swal.fire({
                     type: 'success',
                     title: 'Shtimi i Shfrytezuesit perfundoi me Sukses',
                     showConfirmButton: false,
                     timer: 1700
                 });
                 shfaqposta();
                 $("#emri").val("");
                 $("#pseudonimi").val("");
                 $("#fjalkalimi").val("");
                 $('input[type="checkbox"]').prop('checked', false);
                 $("#image").val("");
                 shfaqshfrytzuesit();

             }
         });
     } else {
         Swal.fire({
             type: 'error',
             title: 'Error',
             text: 'te gjitha fushat duhet te  plotesohen!',
             footer: 'fusha Autorizimi min-1 | max-4'
         })
     }

 }

 function perditesoshfrytezuesin() {

     var editid = $("#editid").val();
     var editemri = $("#editemri").val();
     var editpseudonimi = $("#editpseudonimi").val();
     var editfjalkalimi = $("#editfjalkalimi").val();
     var editfiles_data = $('#editadminimage').prop('files')[0];
     var editadminimage = $("#editadminimage").val();

     var editakseset = [];
     $("input:checkbox[name=edittype]:checked").each(function() {
         editakseset.push($(this).val());
     });

     var form_data = new FormData();

     form_data.append('editid', editid);
     form_data.append('editemri', editemri);
     form_data.append('editpseudonimi', editpseudonimi);
     form_data.append('editfjalkalimi', editfjalkalimi);
     form_data.append('editakseset', editakseset);
     form_data.append('editadminimage', editfiles_data);
     form_data.append('editadminimage', editadminimage);

     if (editemri != "" && editpseudonimi != "" && editakseset != "") {



         $.ajax({
             url: "Controllers/shfrytzuesitController.php",
             type: "POST",
             data: form_data,
             contentType: false,
             processData: false,
             cache: false,
             dataType: "text",
             success: function(results) {
                 Swal.fire({
                     type: 'success',
                     title: 'perditesimi perfundoi me Sukses',
                     showConfirmButton: false,
                     timer: 1700
                 });
             }
         });
     } else {
         Swal.fire({
             type: 'error',
             title: 'Error',
             text: 'te gjitha fushat duhet te  plotesohen!',
             footer: 'fusha Fjalkalimi nuk eshte obligative'
         })
     }

 }