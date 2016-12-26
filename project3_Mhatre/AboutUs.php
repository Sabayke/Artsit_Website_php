
<!DOCTYPE html>

<html lang="en">
<head>
  <title>AboutUs</title>
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
            <li><a href="Part01_ArtistsDataList.php">Artists Data List
(Part 1)</a></li>
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
            
            <button type="submit" class="btn btn-info">Search</button>
          </div>
		  </form>
        </div>
    </div>
  </div>
</nav>

<body>

<div class="topSpacing"></div>

 <div class="container">
        <!--changed from 10-->
        <div class="col-lg-12">
            
                    <!--overall upper artist info content holder-->
                    <div class="col-lg-12">
                    
                    <!--Page title-->
                    <h2>About Us :</h2><h3> This site is an assignment for COMP 5335, Pushpak Arun Mhatre, Date-November 20, 2016 </h3>
                    

                        

                          
                        

                        <div class="col-lg-12 noLeftPadding"">
                        <!--Panel for ArtistWork Details-->
                            <div class="panel panel-default">
                                <div class="panel-heading noMargins leftPadEightPix boldText">Web Data Management Assignment Details</div>
                                
                                <!-- Table -->
                                <table class="table">
                                    <!--Date-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Date: </td>
                                        <td >November 20, 2016</td>
                                    </tr>

                                    <!--University-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4">University:</td>
                                        <td >University of Texas at Arlington</td>
                                    </tr>

                                    <!--Class-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Class: </td>
                                        <td >COMP 5335</td>
                                    </tr>

                                    <!--Professor-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Professor:</td>
                                        <td >Elizabeth Diaz</td>
                                    </tr>

                                    <!--Student-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Student:</td>
                                        <td >Pushpak Arun Mhatre</td>
                                    </tr>
                                    
                                    <!--Assignment-->
                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Assignment:</td>
                                        <td >#3 Database-Driven Web Pages</td>
                                    </tr>
                                                                       
                                    </tr>
                                </table>
                                
                            <!--End of panel panel-default-->
                            </div>
                            
                        <!--End of col-xs-12 col-sm-6 col-md-8 col-lg-8-->                          
                        </div>  
						


        <!--End of row-->
        </div>
        

    <!--End of container-->
    </div> 
        
     
    
	
	</body>
	</html>
