
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Default</title>
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
            
            <button type="submit" class="btn btn-info" >Search</button>
          </div>
		  </form>
        </div>
    </div>
  </div>
</nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" >
      <div class="container">&nbsp;
	  
        <h1>Welcome to Assignment #1</h1>
        <p>This is the first assignment for Pushpak Arun Mhatre for COMP 5335 </p>
        
      </div>
    </div>

	
    <div class="container">
      
	  
        <div class="col-lg-10">

            <!--About Us-->
            <div class="col-sm-2">
                <!--emoticon-->
                <h4><span class="glyphicon glyphicon-info-sign"></span> About Us</h4>
                <p>What this is all about and other stuff</p>
                <a href="AboutUs.php" class="btn btn-default" role="button">
                    <span class="glyphicon glyphicon-link"></span> Visit Page
                </a>
            </div>


            <!--Artist List-->
            <div class="col-sm-2">
                <!--emoticon-->
                <h4><span class="glyphicon glyphicon-list"></span> Artist List</h4>
                <p>Displays a list of artist names as links</p>
                <a href="Part01_ArtistsDataList.php" class="btn btn-default" role="button">
                    <span class="glyphicon glyphicon-link"></span> Visit Page
                </a>
            <!--End of col-sm-1-->
            </div>


            <!--Single Artist-->
            <div class="col-sm-2">
                <!--emoticon-->
                <h4><span class="glyphicon glyphicon-user"></span> Single Artist</h4>
                <p>Displays information for one artist</p>
                <a href="Part02_SingleArtist.php?id=19" class="btn btn-default" role="button">
                    <span class="glyphicon glyphicon-link"></span> Visit Page
                </a>
            <!--End of col-sm-1-->
            </div>


            <!--Single Work-->
            <div class="col-sm-2">
                <!--emoticon-->
                <h4><span class="glyphicon glyphicon-picture"></span> Single Work</h4>
                <p>Displays information for one single work</p>
                <a href="Part03_SingleWork.php?ArtWorkID=394" class="btn btn-default" role="button">
                    <span class="glyphicon glyphicon-link"></span> Visit Page
                </a>
            <!--End of col-sm-1-->
            </div>


            <!--Search-->
            <div class="col-sm-2">
                <!--emoticon-->
                <h4><span class="glyphicon glyphicon-search"></span> Search</h4>
                <p>Perform a search on the ArtWorks tables</p>
                <a href="Part04_Search.php" class="btn btn-default" role="button">
                    <span class="glyphicon glyphicon-link"></span> Visit Page
                </a>
            <!--End of col-sm-1-->
            </div>


        <!--End of col-lg-10-->
        </div>

    <!--End of container-->
    


      <hr>

      
    </div> <!-- /container -->



</body>
</html>