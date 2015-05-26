<?php

include 'backend.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PiControl</title>

<!-- made with http://realfavicongenerator.net/ -->
<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="icons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="icons/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="icons/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="icons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="icons/manifest.json">
<link rel="shortcut icon" href="icons/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="icons/mstile-144x144.png">
<meta name="msapplication-config" content="icons/browserconfig.xml">
<meta name="theme-color" content="#ffffff">


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PiControl</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php 
                        foreach ($_rooms as $room) {
                        	echo '<li><a href="#' . $room['title'] . '">' . $room['title'] . '</a></li>' . PHP_EOL;
							
                    	}
			  		?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container"><div class="row">



        <?php 
            foreach ($_rooms as $room) {
            	echo '<a name="' . $room['title'] . '"></a>' . PHP_EOL;
				echo '    <div class="col-md-4">' . PHP_EOL;
			    echo '         <h1>' . $room["title"] . '</h1>'. PHP_EOL;
				
				foreach ($room["items"] as $d){
					
                echo '         <div class="checkbox">' . PHP_EOL;
                echo '         <label>'. PHP_EOL;
				
                echo '         <input id="toggle-' . $d["id"] . '" type="checkbox"';
                if (getStatus($d["id"]) == "true") echo ' checked ';
                    
                
                echo ' data-toggle="toggle">'. PHP_EOL;
                echo '             ' . $d["title"]. PHP_EOL;


?>				
				
<script>
  $(function() {
    $('#toggle-<?php echo $d["id"];?>').change(function() {
    	
    	    if($('#toggle-<?php echo $d["id"];?>').is(":checked")){
                
                xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    	//document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
			    }
			  }
			  

			xmlhttp.open("GET","backend.php?on=<?php echo $d["id"];?>",true);
			xmlhttp.send();
        }
            else if($('#toggle-<?php echo $d["id"];?>').is(":not(:checked)")){
                
                
                        xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    	//document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
			    }
			  }
			xmlhttp.open("GET","backend.php?off=<?php echo $d["id"];?>",true);
			xmlhttp.send();
        
            }
    	
    	
    })
  })
</script>
	
	
	<?php			
                echo '         </label>'. PHP_EOL;
                echo '    </div>'. PHP_EOL;
    
				
				}
			            echo '    </div>'. PHP_EOL;
        				
			}
  		?>

        

    </div>
    </div><!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>

</body>

</html>
