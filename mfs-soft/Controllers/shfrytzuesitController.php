<?php
require_once "../Models/Connection.php";
require_once "../Models/shfrytzuesitModels.php";
require_once "TemplateController.php";
session_start();
if (isset($_POST['emri'])) {
    $emri = $_POST['emri'];
    $pseudonimi = $_POST['pseudonimi'];
    $akseset = $_POST["akseset"];
    $fjalkalimi = $_POST['fjalkalimi'];
    if (is_array($akseset)) {
        $akseset = implode(',', $_POST["akseset"]);
    }
    if (isset($_FILES['image']['name'])) {
        $target_dir = "../Views/assets/images/shfrytezuesit/";
        $image = basename($_FILES["image"]["name"]);
        $imageFileType = pathinfo($target_dir . $image, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $image);
        $results = shfrytzuesitModels::shtoshfrytzues($emri, $pseudonimi, $fjalkalimi, $image, $akseset);
        echo json_encode($results);
    }
}
$shfaqshfrytzuesit = shfrytzuesitModels::shfaqshfrytzuesit();
foreach ($shfaqshfrytzuesit as $shfrytezuesi) {
    echo '	<tr>
			<td class="pt-4">1</td>
			<td class="pt-4">' . $shfrytezuesi['emri'] . '</td>
			<td class="pt-4">' . $shfrytezuesi['pseudonimi'] . '</td>
			<td class="pt-4">********</td>
			<td class="pt-4">' . $shfrytezuesi['autorizimi'] . '</td>
			<td >
			<img src="Views/assets/images/shfrytezuesit/' . $shfrytezuesi['image'] . '" class="img-circle ml-2" width="30%" height="50px" alt="">
			</td>
			<td class="pt-4">
			<a href=""data-toggle="modal" data-target="#custom-modal-sh" onclick="editshfrytzuesin(' . $shfrytezuesi['id'] . ')">
			<i class="far fa-edit ml-2 text-primary"></i>
			</a>
		
			<i class="far fa-times-circle custom-delete ml-2" onclick="fshishfrytzuesin(' . $shfrytezuesi['id'] . ')"></i>
		
			</td>
		</tr>';
}
if (isset($_GET['fshiid'])) {
    $fshiid = $_GET['fshiid'];
    $results = shfrytzuesitModels::fshishfrytzuesin($fshiid);
    echo json_encode($results);
}
if (isset($_POST['editid'])) {
    $editid = $_POST['editid'];
    $editemri = $_POST['editemri'];
    $editpseudonimi = $_POST['editpseudonimi'];
    $editfjalkalimi = $_POST['editfjalkalimi'];
    $editakseset = $_POST['editakseset'];
    if (is_array($editakseset)) {
        $editakseset = implode(',', $_POST["editakseset"]);
    }
    if (isset($_FILES["editadminimage"]['name'])) {
        $image = $_FILES["editadminimage"]["name"];
        $destination = '../Views/assets/images/shfrytezuesit/';
        $target_path = $destination . basename($image);
        move_uploaded_file($_FILES['editadminimage']['tmp_name'], $target_path);
        $results = shfrytzuesitModels::Perditesoshfrytezuesit($editid, $editemri, $editpseudonimi, $editfjalkalimi, $image, $editakseset);
    } else {
        shfrytzuesitModels::Perditesoshfrytezuesitpafoto($editid, $editemri, $editpseudonimi, $editfjalkalimi, $editakseset);
    }
}
?>