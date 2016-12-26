<!DOCTYPE html>
<html lang="en">
<head>
  <title>Part02_SingleArtist</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--External CSS file -->
 <link rel="stylesheet" type="text/css" href="AdditionalDesign.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle"
      data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Assignment</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="default.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
        role="button" aria-haspopup="true" aria-expanded="false">Pages <span
        class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Part01_ArtistsDataList.php">Artists Data List(Part 1)</a></li>
            <li><a href="Part02_SingleArtist.php?id=19">Single Artist (Part 2)</a></li>
            <li><a href="Part03_SingleWork.php?ArtWorkID=394">Single Work (Part 3)</a></li>
            <li><a href="Part04_Search.php">Search (Part 4)</a></li>
          </ul>
        </li>
      </ul>
      <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="Part04_Search.php" method="GET" >
            <div class="form-group">
			<label class="navbar-brand">Pushpak Arun Mhatre</label>
              <input type="text" placeholder="Search Paintings" id="headSearch" name="title" class="form-control">
            
            <input type="hidden" name="SearchRadios" value="1" />
            <button type="submit" class="btn btn-info" >Search</button>
          </div>
		  </form>
        </div>
    </div>
  </div>
</nav>
	
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "art_db";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8');
// Check connection
// ($conn->connect_error) 
if(!$conn){
	echo mysqli_error($con);
	
    die("Connection failed: " . $conn->connect_error);
}
else{ 
?>
<?php	
if(isset($_GET['id']))
$id=$_GET['id'];
else
header('Location: Error.php'); 

$sql = "SELECT * FROM `artists` WHERE `ArtistID` = ".$id;
$result = $conn->query($sql);
$fName;$lName;$details;
if ($result->num_rows > 0) {
    
	
	// output data of each row
    while($row = $result->fetch_assoc()) {
       
	  
	   $fName=$row["FirstName"];
	   $lName=$row["LastName"];
	   $details=$row["Details"];
	   $yearOfBirth=$row["YearOfBirth"];
	   $yearOfDeath=$row["YearOfDeath"];
	   $nationality=$row["Nationality"];
	   $artistLink=$row["ArtistLink"];
  
} 
}
else
header('Location: Error.php'); 

}
?>

<p>
<div class="container">
<h2><?php echo $fName." ".$lName ?></h2></p>
  <p>
  <div class="row">
    <div class="col-sm-3 col-md-3" >
      <p> <img src="images\artists\medium\<?php echo $id?>.jpg" class="img-thumbnail" width="250" height="300" alt="Cinque Terre">  </p>
    </div>
    <div class="col-sm-6 col-md-6">
      <p><?php echo $details ?></p>
	  <p><button type="button" class="btn btn-default" ><span class="glyphicon glyphicon-heart" style ="color:blue"></span><h5 style ="color:blue;display:inline"> Add to Favorites List</h5></button></p>
	   <p>
	  
        
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Artist Details</div>

  <!-- Table -->
  <table class="table">
    <tr>
 
   <td>Date:</td>
    <td><?php echo $yearOfBirth."-".$yearOfDeath ?></td>
  </tr>
  <tr>
    <td>Nationality:</td>
    <td><?php echo $nationality ?></td>
  </tr>
  <tr>
    <td>More Info:</td>
    <td><a href="<?php echo $artistLink ?>"><?php echo $artistLink ?></a></td>
  </tr>
  </table>
</div>

	  </p>
	  
	  
    </div>
	<div class="col-sm-3 col-md-3">
      <p></p>
    </div>
  </div>
  <p>
 <!--spacing container-->            
            <div class="clearfix"></div>
            
            <!--Art by container-->   
            <div class="col-lg-12">
            <h4 class="noLeftPadding">Art by <?php echo $fName." ".$lName ?> </h4>
            </div>
</p>

<?php	
$sql2 = "SELECT ArtWorkID, ImageFileName, Title,YearOfWork FROM `ArtWorks` WHERE `ArtistID` = ".$id;
$result2 = $conn->query($sql2);
$artWorkID;$imgFile;$title;$yearOfWork;
if ($result2->num_rows > 0) {
?>

<!--Prints out all ArtWorks by the painter-->
        <div class="col-lg-12">
               
<?php   
// output data of each row
while($row = $result2->fetch_assoc()) {
       $artWorkID=$row["ArtWorkID"];
	   $imgFile=$row["ImageFileName"];
	   $title=$row["Title"];
       $yearOfWork=$row["YearOfWork"];
?>

                        <div class = "col-sm-3 ">
							<div class = "container-fluid panel panel-default">
                            <!--ArtWork image-->
                            <div style = "text-align:center;" >
							
							<div style="margin-top:5px;margin-bottom:5px">
                           <!--ArtWork image-->
                         <center>  <a href="Part03_SingleWork.php?ArtWorkID=<?php echo $artWorkID ?>">
                           <img src="images/works/square-medium/<?php echo $imgFile ?>.jpg" alt="<?php echo $title ?>" class="thumbnail singlePaintingByArtistIMG" />
								
                           </a></center>
                           </div>
                            

                           <!--ArtWork title-->
						   <div style = "text-align:center;width:100%;height:60px">
                          <a href="Part03_SingleWork.php?ArtWorkID=<?php echo $artWorkID ?>"><?php echo $title." ".$yearOfWork ?></a> 
                          </div>

                            <!--ArtWork buttons-->
							<div style="margin-bottom:5px;">
                          <center>                           
						  <a href="Part03_SingleWork.php?ArtWorkID=<?php echo $artWorkID ?>"class="btn btn-primary btn-xs">
                          <span class="glyphicon glyphicon-info-sign"></span> View
                            </a>

                            <!--Wish link-->
                           <a href="#"class="btn btn-success btn-xs">
                           <span class="glyphicon glyphicon-gift"></span> Wish
                           </a>

                            <!--Wish link-->
                           <a href="#"class="btn btn-info btn-xs">
                           <span class="glyphicon glyphicon-shopping-cart"></span> Cart
                           </a>
                         </center> 
						 
                        <!--End of thumbnail-->
						</div>
						</div>
                        </div></div>

<?php
 }
 ?>
  
             </br>    
            <!--End of col-lg-12-->
            </div>
 
 <?php
}
$conn->close();
?>
        
		<!--End of row-->
        </div>
        <!--End of container-->
    </div> 







</div>
</p>



</body>
</html>