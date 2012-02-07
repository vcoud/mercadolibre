<?php


require '../src/meli.php';

// Create our Application instance (replace this with your country, appId and secret).
$meli = new Meli(array(
	'countryId' => 'ar',
	'appId'  	=> '344617158898614',
	'secret' 	=> '6dc8ac871858b34798bc2488200e503d',
));

if(isset($_REQUEST['q'])){
	
	$query = $_REQUEST['q'];
	
	$search = $meli->get(false,'/sites/#{siteId}/search',array(
	'q' => $query,
	));
	
}



?>
<!doctype html>
<html>
  <head>
	<meta charset="UTF-8"/>
    <title>MeliPHP SDK - Example Search</title>
  </head>
  <body>
  	<h1>MeliPHP SDK - Example Search</h1>
    
    <form>
    	<input name="q" value="<?php echo $query; ?>" />
    	<input type="submit" name="search" value="search"/>
    </form>
	<ol>
	<?php
		foreach ($search['results'] as &$searchItem) {
		   echo '<li><a href="' . $searchItem['permalink'] . '">'. $searchItem['title'].'</a></li>';
		}
	?>
    </ol>
  </body>
</html>