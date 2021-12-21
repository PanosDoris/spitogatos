<?php
session_start();

//Συνδεση στην Βαση Δεδομένων
require('../db/db.php');

if(!isset($_SESSION["username"]))
{
	header("location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>User Area</title>

     <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

         <!-- Jquery για να πάρω την τιμή του price και να ελέγξω price>50 or price<5000000 -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>





     <!-- My css -->
        <style>
        <?php  include '../css/style.css';  ?>
        </style>
</head>


<body>

<h1>THIS IS USER HOME PAGE</h1><?php echo $_SESSION["username"] ?>

<a href="../logout.php">Logout</a>

<!-- 
    Εδώ τραβάω απο το style.css τα class για να ορίσω τις περιοχές
Παρατήρηση: Θα μπορούσε να γίνει εξολοκλήρου με bootstrap το layout
-->
<div class="grid-container">
<div class="item1">Σύστημα Διαχείρισης αγγελιών (καλώς ήλθες <?php echo $_SESSION["username"] ?>)</div>
  <div class="item2">

  <form id="form" name="form" method="post">
<!-- στην φόρμα χρησιμοποιώ βασικό bootstrap layout-->
<div class="container">

    <div class="row">
     <div class="col">
        <label for="price">Τιμή</label>
        </div>
        <div class="col">
        <input type="text" id="price" name="price" required>
        </div>
    </div>

    <div class="row">
     <div class="col">
        <label for="area">Περιοχή</label>
     </div>
     <div class="col">
            <select name="area" id="area" required>
            <option value="Αθήνα">Αθήνα</option>
            <option value="Θεσσαλονίκη">Θεσσαλονίκη</option>
            <option value="Πάτρα">Πάτρα</option>
            <option value="Ηράκλειο">Ηράκλειο</option>
            </select>
     </div>
    </div>

    <div class="row">
     <div class="col">
            <label for="availability">Διαθεσιμότητα</label>
     </div>
     <div class="col">
            <select name="availability" id="availability" required>
            <option value="ενοικίαση">ενοικίαση</option>
            <option value="πώληση">πώληση</option>

            </select>
     </div>
     </div>
    <div class="row">

        <div class="col">
        <label for="tetragonika">Τετραγωνικά</label>
        </div>
        <div class="col">
        <input type="text" id="tetragonika" name="tetragonika" required>

        <!-- έχω κρυφώ το πεδίο  για να μεταφέρω το id στην διαδικασία εισαγωγής-->
        <input type="hidden" id="user" name="user" value="<?php echo $_SESSION["id"] ?>">

        </div>
        
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Καταχώρηση" id="submit">
    
</div>

<!-- end bootstrap layout -->
</form>


  </div>

  <!-- Περιοχή λίστα δεδομένων του user -->
  <div class="item3">
   
  <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
  <!-- Ερώτημα στην βάση δεδομένων να φέρει τις αγγελίες ακινητων του συγκεκριμένου user-->
<?php
  if ($results = mysqli_query($data, "SELECT a.id,a.area,a.price,a.availability,a.tetragonika FROM user u, aggelia a Where u.id=a.uid AND u.id=".$_SESSION["id"])) {
  echo "Ο χρήστης έχει: " . mysqli_num_rows($results)." αγγελίες";
  ?>


  <!-- Χρησιμοποιώ Bootstrap table-->
  <table class="table table-white">
  <thead>
    <tr>
      <th scope="col">Περιοχή</th>
      <th scope="col">Διαθεσιμότητα</th>
      <th scope="col">Τιμή</th>
      <th scope="col">Τετραγωνικά</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($results as $result){
         
          ?>
    <tr>
      <td><?php echo $result['area'];  ?></td>
      <td><?php echo $result['availability'];  ?></td>
      <td><?php echo $result['price']. " ευρώ";?></td>
      <td><?php echo $result['tetragonika']. " τ.μ";  ?></td>
      <td><button type="button" class="btn btn-danger btn_del" id="<?php echo $result['id']?>">Διαγραφή</button>
   
    </tr>
     
  
<?php }//end foreach ?>
  </tbody>
</table>


<?php

}else{
    echo "Δεν υπάρχει κάποια αγγελία";
}
?>








  </div>  




  <div class="item5">All rights reserved</div>
</div>

</body>


<script>

$(document).ready(function() {


    //Αν ενεργοποιηθεί το submit της φορμας
	$("#form").on("submit", function(e) {
	
                       var price = $("#price").val();
                        var tetragonika = $("#tetragonika").val();
                        var area = $("#area").val();
                        var availability = $("#availability").val();
                        var user = $("#user").val();
        if($.isNumeric(price) && $.isNumeric(tetragonika) && price>50 && price<5000000&& tetragonika>20 && tetragonika<1000){
			$.ajax({
				url: "../ajax/insert.php",
				type: "POST",
				data: {
					price: price,
					tetragonika: tetragonika,
					area: area,
					availability: availability,	
                    user: user			
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#success").show();
						$('#success').html('Data added successfully !'); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
        }else{
            alert('Προσοχή τα δεδομένα της φόρμας δεν είναι σωστά');

        }
	
	});

//Διαγραφή γραμμής
    $('.btn_del').on('click', function(){
		var aggeliaid = $(this).attr('id');
		$.ajax({
			type: "POST",
			url: "../ajax/delete.php",
			data:{
				aggeliaid: aggeliaid
			},
			success: function(){
                location.reload(true);
                   
			}
		});
	});



});
</script>



            


</html>