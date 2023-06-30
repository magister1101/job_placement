<?php

$Employee = $_GET['Employee'];

echo $Employee;
?>



<div style="display:flex; flex-direction: column;">
    <h1 style="margin-bottom: 5%;" >Course:</h1>
    <a href="reglast2.php?Employee=<?php echo $Employee; ?>&course=BSIT" class="btn btn-success" style="margin-bottom: 2%;">BSIT</a>
    <input onclick="openThirdModal()" name="course" type="button" value="BSCS" type="button" class="btn btn-success" style="margin-bottom: 2%;">
    <input onclick="openThirdModal()" name="course" type="button" value="BSBM" type="button" class="btn btn-success" style="margin-bottom: 2%;">
    <input onclick="openThirdModal()" name="course" type="button" value="BSHM" type="button" class="btn btn-success" style="margin-bottom: 2%;">
    <input onclick="openThirdModal()" name="course" type="button" value="BSOA" type="button" class="btn btn-success" style="margin-bottom: 2%;">
    <input onclick="openThirdModal()" name="course" type="button" value="BSE" type="button" class="btn btn-success" style="margin-bottom: 2%;">
    <input onclick="openThirdModal()" name="course" type="button" value="BS Psych" type="button" class="btn btn-success" style="margin-bottom: 2%;">
    <input onclick="openThirdModal()" name="course" type="button" value="AB Journ" type="button" class="btn btn-success" style="margin-bottom: 2%;">
    <input onclick="openThirdModal()" name="course" type="button" value="BS Entrep" type="button" class="btn btn-success" style="margin-bottom: 2%;">
</div>


