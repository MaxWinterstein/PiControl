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
                
                console.debug("Checkbox is checked.");
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
                
                console.debug("Checkbox is unchecked.");
                
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

        
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                alert("Checkbox is checked.");
                console.debug("Checkbox is checked.");
            }
            else if($(this).is(":not(:checked)")){
                alert("Checkbox is unchecked.");
                console.debug("Checkbox is unchecked.");
            }
        });
    });
</script>


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
