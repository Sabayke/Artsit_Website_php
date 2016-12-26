<!DOCTYPE html>
<html lang="en">
<head>
  <title>Part03_SingleWork</title>
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

<br />
    <div class="topSpacing"></div>
	
	
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
$artWorkID=$_GET['ArtWorkID'];
$sql = "SELECT works.*,artist.FirstName,artist.LastName FROM ArtWorks works, Artists artist WHERE works.ArtWorkID=".$artWorkID." AND works.ArtistID=artist.ArtistID";
$result = $conn->query($sql);	
$fName;$lName;$details;$title;$artistID;$imgFileName;$description;
if($result->num_rows > 0) {
	// output data of each row
    while($row = $result->fetch_assoc()) {
       $artistID=$row["ArtistID"];
       $title=$row["Title"];
	   $fName=$row["FirstName"];
	   $lName=$row["LastName"];
	   $imgFileName=$row["ImageFileName"];
	   $description=$row["Description"];
	   $msrp=$row["MSRP"];
	   $yearOfWork=$row["YearOfWork"];
	   $medium=$row["Medium"];
	   $height=$row["Height"];
	   $width=$row["Width"];
	   $originalHome=$row["OriginalHome"];
} 
}
else
header('Location: Error.php'); 
?>
	
	
 <div class="container">
        <!--changed from 10-->
        <div class="col-lg-12">
            
                
                    <!--overall upper artist info content holder-->
                    <div class="col-lg-12">
                    
                    <!--Painting name-->
                    <h2><?php echo $title ?></h2>
                    
                        <!--Artist name link-->
                        <p>By: <a href="Part02_SingleArtist.php?id=<?php echo $artistID ?>"><?php echo $fName." ".$lName ?></a></p>

                        <!--ArtWork Picture trigger modal -->
                        <a data-toggle="modal" href="#myModal">

                        <!--ArtWork picture col-xs-4 col-sm-4 col-md-4 col-lg-4-->
                        <img src="images/works/square-medium/<?php echo $imgFileName ?>.jpg" 
                             alt="<?php $title ?>"
                             class="noLeftPadding col-xs-12 col-sm-4 col-md-3 col-lg-3 thumbnail singlePaintingByArtistIMG" height="360px"/>
                        </a>


	
                          <!-- Modal for enlarged ArtWork image link -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><?php echo $title." (".$yearOfWork.")" ?> by <?php echo $fName." ".$lName ?> </h4>
                                    </div>
                                
                                    <div class="modal-body">
                                    <center>    <img src="images/works/medium/<?php echo $imgFileName ?>.jpg" alt="<?php echo $title ?>" class="modalPic" height="500px" width="400px"/></center>
                                    </div>
                                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div><!-- /.modal-content -->
                             </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->


                        <!--ArtWork Info-->
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                            <!--artist description paragraph-->
                            <p class="col-lg-12 noLeftPadding"><?php echo $description ?></p>

							
							
                            <!--Painting Price-->
                            <p class="col-lg-12 noLeftPadding" style="color:red"><strong><?php echo "$".number_format($msrp, 2, '.', ',') ?></strong></p>

                            <div class="btn-group" >
							<div class="col-lg-12 noLeftPadding">
                                 <!--Wish List link-->
                               <button type="button" class="btn btn-default" >
							   <a href="#">
                               <span class="glyphicon glyphicon-gift blueLinks"></span> Add to Wish List
                               </a>
							   </button>

                                <!--Shoping Cart link-->
								<button type="button" class="btn btn-default" >
                               <a href="#"> 
								<span class="glyphicon glyphicon-shopping-cart blueLinks"></span> Add to Shopping Cart
                               </a>
							   </button>
							   </div>
                            <!--End of btn-group-->
                            </div>

                            <br />
                            <br />
                            <div class="col-lg-12 noLeftPadding">
                            <!--Panel for ArtistWork Details-->
                            <div class="panel panel-default">
                                <div class="panel-heading noMargins leftPadEightPix">Product Details</div>
                                
                                <!-- Table -->
								
                                <table class="table">
                                    <!--Date-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4"><strong>Date:</strong></td>
                                        <td ><?php echo $yearOfWork ?></td>
                                    </tr>

                                    <!--Medium-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4"><strong>Medium:</strong></td>
                                        <td><?php echo $medium ?></td>
                                    </tr>

                                    <!--Dimension-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4"><strong>Dimension:</strong></td>
                                        <td><?php echo $width ?> cm x <?php echo $height ?> cm</td>
                                    </tr>

                                    <!--Home-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4"><strong>Home:</strong></td>
                                        <td><?php echo $originalHome ?></td>
                                    </tr>

<!--Genres data source-->
<?php
$sql3="SELECT g.GenreName FROM Genres g, ArtWorkGenres a 
WHERE a.ArtWorkID=".$artWorkID." AND 
g.GenreID=a.GenreID";
$result3 = $conn->query($sql3);
$genereName=array();
if($result3->num_rows > 0) {
// output data of each row
while($row = $result3->fetch_assoc()) {
$genereName[]=$row["GenreName"];
  } 
}	
?>
									
                                    <!--Genres NEEDS REPEATER-->
                                    <tr class="col-md-14"  >
                                        <td class="col-md-4 boldText"><strong>Genres:</strong></td>
                                        <td>
                                         <?php foreach ($genereName as $value)  { ?>   
                                               <div style="margin-top: 1px;" >     <a href="#"><?php echo "$value <br>"; ?></a> </div>
                                        <?php } ?>        
                                         </td> 
                                    </tr>

									
<!--Subjects data source-->
<?php
$sql4="SELECT s.SubjectName FROM Subjects s, ArtWorkSubjects a 
WHERE a.ArtWorkID=".$artWorkID." AND 
s.SubjectID=a.SubjectID";
$result4 = $conn->query($sql4);
$subjectName=array();
if($result4->num_rows > 0) {
// output data of each row
while($row = $result4->fetch_assoc()) {
$subjectName[]=$row["SubjectName"];
} 
}	
?>
									
									
                                    <!--Subjects NEEDS REPEATER-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText"><strong>Subjects:</strong></td>

									  <td >
                                       <?php foreach ($subjectName as $value)  { ?>                                           
                                               <div style="margin-top: 1px;" >      <a href="#"><?php echo $value ?></a><br /></div>
                                               
                                        <?php } ?>    
                                        </td>
                                    </tr>
                                </table>
                                
                            <!--End of panel panel-default-->
                            </div>
                            </div>
                        <!--End of col-xs-12 col-sm-6 col-md-8 col-lg-8-->                          
                        </div>  
						
						
						<!--Order Info data source-->
<?php

$sql2="SELECT ord.DateCreated FROM Orders ord, OrderDetails det 
                                          WHERE det.ArtWorkID=".$artWorkID." AND 
                                          det.OrderID=ord.OrderID";
$result2 = $conn->query($sql2);
$dateCreated=array();

if($result2->num_rows > 0) {
// output data of each row
while($row = $result2->fetch_assoc()) {
$dateCreated[]=$row["DateCreated"];
} 
}										  
?>
        
                        <!--Sales Panel-->
                        <div class="col-xs-12 
                                    col-sm-8 col-sm-offset-4 
                                    col-md-8 col-md-offset-4 
                                    col-lg-2 col-lg-offset-0">
                            <div class="panel panel-info">
                                <div class="panel-heading noMargins leftPadEightPix">Sales</div>
                                    <table class="table">
                                            <?php foreach ($dateCreated as $value)  { ?>
                                        
                                                <tr>
                                                    <td><a href="#"><?php echo date("m/d/Y", strtotime($value)); ?></a></td>
                                                </tr>
                                            <?php } ?>
                                      </table>
                                  </div>
                                  
                            <!--End of panel oanel-info-->
                            </div>
                        <!--End of col-xs-12 col-sm-8 col-sm-offset-4 col-md-8 col-md-offset-4 col-lg-2 col-lg-offset-0 noLeftPadding" style="padding-left: 15px;-->
                        </div>                  
                 <!--End of row-->
        </div>
        
<?php
$conn->close();
}
?>

    <!--End of container-->
    </div> 
        
  </body>
 
</html>