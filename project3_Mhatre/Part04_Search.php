<!DOCTYPE html>

<html lang="en">
<head>
  <title>Part04_Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
            
        function RadioButton_CheckedChanged(){
							
    	//the title radio is checked so the title text box is shown and the desciption text box hidden
        if (document.getElementById("TitleFilterButton").checked)
        {
			
           document.getElementById("TitleSearch").style.visibility = 'visible';
           document.getElementById("DescSearch").style.visibility = 'hidden';
        }

        //the description radio is checked so the title text box is hidden and the description text box shown
        else if (document.getElementById("DescFilterButton").checked)
        {
            document.getElementById("TitleSearch").style.visibility = 'hidden';
            document.getElementById("DescSearch").style.visibility = 'visible';
        }

        //the no filter radio is checked so the title text box is hidden and the description text box hiden
        else if (document.getElementById("NoFilterButton").checked)
        {
            document.getElementById("TitleSearch").style.visibility = 'hidden';
            document.getElementById("DescSearch").style.visibility = 'hidden';
        }
						}
	                      
  
   </script>
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
              <button type="submit" class="btn btn-info"  onClick="validate();">Search</button>
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
 if(!$conn){
	echo mysqli_error($con);
    die("Connection failed: " . $conn->connect_error);
}
else{ 
try
        {
			
            //The sql query that wil be executed. Made blank by default.
            $sqlQuery = "";
                    
            //Queries based on which textbox the search is from and are checked to actually have a search parameter attached to them
            //Title search query
            if (((isset($_REQUEST['title'])) && (!empty($_REQUEST['title']))) && ($_REQUEST["SearchRadios"]==1)   )
            {
                //title is the parameter that comes in from the URL
                $sqlQuery = "SELECT Title, Description, ImageFileName, ArtWorkID,ArtistID FROM ArtWorks WHERE Title LIKE '%".$_GET['title']."%'";
             }

            //Descpription search query
            else if (((isset($_REQUEST['desc'])) && (!empty($_REQUEST['desc']))  && ($_REQUEST["SearchRadios"]==2)   ))
            {
                //desc is the parameter that comes in from the URL
                $sqlQuery = "SELECT Title, Description, ImageFileName, ArtWorkID,ArtistID FROM ArtWorks WHERE Description LIKE '%".$_GET['desc']."%'";
            }

            //No filter query
            else if ((isset($_REQUEST['everything'])) && (!empty($_REQUEST['everything'])))
            {
				if($_GET['everything']  == "t")
                $sqlQuery = "SELECT Title, Description, ImageFileName, ArtWorkID,ArtistID FROM ArtWorks";
                           
            }

            //If there is a query that is valid  	then we fill a DataTable with the needed info.
            if(((isset($_REQUEST['title'])) && (!empty($_REQUEST['title']))) || ((isset($_REQUEST['desc'])) && (!empty($_REQUEST['desc']))) || (isset($_REQUEST['everything'])) && (!empty($_REQUEST['everything'])))
            {
			$result = $conn->query($sqlQuery);
			$disResult=array();
			 while($row = $result->fetch_assoc()) {
             $disResult[]=$row;
               } 
	                
            }
        }

        //if the is an exception then the page is directed to the Search page so that they can try searching again
        catch(Exception $e)
        {
            header('Location: Error.php'); 
        }

?>

 <!--Extra top spacing between navbar and content-->
    <br />
    <div class="topSpacing"></div>
	<form action="Part04_Search.php" method="GET">
	
	 <div class="container">
        <div class="col-lg-12">
            <h1>Search Results</h1>
            
            <div class="highlight">
			<div class="well">
                <!--GroupName="SearchRadios"-->
                <!--Title filter radio-->
				<input type="radio" Name="SearchRadios" ID="TitleFilterButton"  value="1" onClick="RadioButton_CheckedChanged();"  <?php  if((isset($_REQUEST['SearchRadios'])) && (!empty($_REQUEST['SearchRadios'])) ) { if($_REQUEST["SearchRadios"]==1) echo 'checked'; } else  if((isset($_REQUEST['title'])) || (!empty($_REQUEST['title']))) echo 'checked';   ?> > Filter by Title
  				        
												
                <!--Title search text box-->                 
				<input type="text" id="TitleSearch" name="title" class="form-control" value="<?php if(((isset($_REQUEST['title'])) || (!empty($_REQUEST['title']))) &&  ($_REQUEST["SearchRadios"]==1) ) echo $_REQUEST['title']; ?>"
				style="visibility:<?php if((isset($_REQUEST['SearchRadios'])) && (!empty($_REQUEST['SearchRadios']))){if($_GET["SearchRadios"]==1) echo 'display';  else echo 'hidden'; } else if((isset($_REQUEST['title'])) || (!empty($_REQUEST['title']))) echo 'display';  else echo 'hidden'; ?>">
                
                

                <!--Descrption filter radio-->
				<input type="radio" Name="SearchRadios" ID="DescFilterButton" value="2" onClick="RadioButton_CheckedChanged();" <?php if((isset($_REQUEST['SearchRadios'])) && (!empty($_REQUEST['SearchRadios']))) {if($_GET["SearchRadios"]==2) echo 'checked'; } ?>> Filter by Description<br>
               
                <!--Descrption search text box-->
				<input type="text" id="DescSearch" name="desc" class="form-control" value="<?php if(((isset($_REQUEST['desc'])) || (!empty($_REQUEST['desc']))) &&  ($_REQUEST["SearchRadios"]==2) ) echo $_REQUEST['desc']; ?>" 
				style="visibility:<?php if((isset($_REQUEST['SearchRadios'])) && (!empty($_REQUEST['SearchRadios']))){if($_GET["SearchRadios"]==2) echo 'display'; else echo 'hidden'; } else echo 'hidden';  ?>" >
                
                

                <!--No filter radio-->
				<input type="radio" Name="SearchRadios" value="3" ID="NoFilterButton" onClick="RadioButton_CheckedChanged();" <?php if((isset($_REQUEST['SearchRadios'])) && (!empty($_REQUEST['SearchRadios']))) {if($_GET["SearchRadios"]==3) echo 'checked'; } ?> > No Filter (show all artworks)<br>
                <input type="hidden" name="everything" value="t" />
                <br />

                <!--Filter button-->
				
				<button type="submit" class="btn btn-primary" >Filter</button> <br>
                

            <!--End of col-lg-12 highlight-->
            </div>
            
            
		<!--Prints ou the search results based on the query and user input-->    
         <?php 
			if(((isset($_REQUEST['title'])) && (!empty($_REQUEST['title']))) || ((isset($_REQUEST['desc'])) && (!empty($_REQUEST['desc']))) || (isset($_REQUEST['everything'])) && (!empty($_REQUEST['everything'])))
     	 {
			foreach ($disResult as $value) {
			if((!empty($_GET['desc']) || isset($_REQUEST['desc'])) && ($_GET["SearchRadios"]==2))
				{   
				$desc=$_GET['desc'];
				$descDisplay=str_ireplace($desc, '<span style="background-color: #FFFF00;">'.$desc.'</span>', $value["Description"]);
				}
				else
				{
					$descDisplay=$value["Description"];
				}
			?>
			
			
                    <table>
                        <tr>
                            <td><a href="Part03_SingleWork.php?ArtWorkID=<?php echo $value["ArtWorkID"] ?> "><img src="images/works/square-medium/<?php echo $value["ImageFileName"] ?>.jpg" alt="<?php echo $value["ImageFileName"] ?>" /></a></td>
                            <td class="topText leftPadEightPix"><div class="container"><a href="Part03_SingleWork.php?ArtWorkID=<?php echo $value["ArtWorkID"] ?>"><?php echo $value["Title"] ?></a>
                                <p><?php echo $descDisplay ?></p></div>
                            </td>
                        </tr>
						<br>
                    </table>               
			<?php 
			}
		 }			
			 ?>
            
        			<br clear="all"/>
           </div>
         <!--End of col-lg-12-->
        </div>

    <!--End of container-->
    </div>
  </form>
	
	
<?php
$conn->close();
}
?>

	</body>
</html>