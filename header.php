<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
?>  

<nav class="navbar navbar-expand-lg fixed-top" style ="padding-bottom: 0.2%; color: white; background-color:black">
	  <a class="navbar-brand" href="#" style=" color: white; padding-left: 8%;font-family: 'Poppins', sans-serif; font-size: 24px" ><b>BV Space</b>
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-right: 5%">
	    <ul class="navbar-nav ms-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php" style=" color: white;font-family: 'Poppins', sans-serif; font-size: 14px">Home </a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link"  href="search.php" style=" color: white;font-family: 'Poppins', sans-serif; font-size: 14px">Search Student</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link"  href="submitMaterial.php" style=" color: white;font-family: 'Poppins', sans-serif; font-size: 14px">Study Material</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link"  href="display.php" style=" color: white;font-family: 'Poppins', sans-serif; font-size: 14px">QnA</a>
	      </li>
		
		<?php
		session_start();
		if(isset($_SESSION['id']))
		{?>
          <li class="nav-item active">
	        <a class="nav-link" href="logout.php" style=" color: white;font-family: 'Poppins', sans-serif; font-size: 14px">Logout</a>
	      </li>
		<?php
		}
		?>
          
	  </div>
	</nav>
    