<?php
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('CONTENT_DIR', ROOT_DIR .'content/'); //content directory

// Site and asset variables
$site_address = "http://sfudebate.ca";
$site_name = "SFU Debate Society";

$assets_location = $site_address . "/assets";
$file_format = ".md"; //file type for pages

$theme_location = $assets_location . "/default.min.css";
$logo_location = $assets_location . "/logo.png";

$favicon_location = $assets_location . "/favicon.png";
$bootstrap_location = $assets_location . "/bootstrap.min.css";
$bootstrapjs_location = $assets_location . "/bootstrap.min.js";
$jquery_location = $assets_location . "/jquery.min.js";

// Parse Text Properly
include 'vendor/Parsedown.php';
include 'vendor/ParsedownExtra.php';
$Extra = new ParsedownExtra();

// Get request url and script url
$url = '';
$request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
$script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';
	
// Get url path and trim the / of left and right
if($request_url != $script_url) $url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');

// Get file path
if($url) $file = strtolower(CONTENT_DIR . $url);
else $file = CONTENT_DIR .'index';

// Load file
if(is_dir($file)) $file = CONTENT_DIR . $url .'/index' . $file_format;
else $file .=  $file_format;

// Show 404 if file cannot be found
if(file_exists($file)) $content = file_get_contents($file);
else $content = file_get_contents(CONTENT_DIR .'404' . $file_format);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $site_name, ' ', ucwords(strtolower($url)); ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $bootstrap_location; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo $theme_location; ?>">
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans'>
		<link rel="shortcut icon" type="image/png" href="<?php echo $favicon_location ?>">
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-57158949-1', 'auto');
			ga('send', 'pageview');
		</script>
	</head>
	<body>
		<header>
<?php include 'templates/header.php'; ?>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-md-8" id="content">
<?php echo $Extra->text($content); ?>
				</div>
				<div class="col-md-4" id="sidebar">
<?php include 'templates/sidebar.php'; ?>
				</div>
			</div>
		</div>
		<footer class="footer">
<?php include 'templates/footer.php'; ?>
		</footer>
	</body>
	<script src="<?php echo $jquery_location; ?>"></script>
	<script src="<?php echo $bootstrapjs_location; ?>"></script>
</html>