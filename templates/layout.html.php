<!DOCTYPE html>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> <?=$title?> </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/date-1.1.1/r-2.2.9/sb-1.3.0/datatables.min.css"/>
 
        <link rel="stylesheet" href="/css/styles.css"/>
        

    </head>
	<body>
	
	    
        <?php include 'navigation.html.php'; ?>
            
       
        <div class="container-fluid p-0">
            <?=$output?>
        </div>
        
        <div class="container-fluid bg-dark text-light">
        <footer>
            <?php include 'footer.html.php'; ?>
        </footer>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/date-1.1.1/r-2.2.9/sb-1.3.0/datatables.min.js"></script>
        <script src="/js/script.js"></script>             
    </body>
</html>