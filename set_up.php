<?php
function setUp($siteName,$sitePath){
$pathway=''.$sitePath.''.$siteName.'';
//CREATE DIRECTORIES
mkdir("$pathway");
mkdir("$pathway/css");
mkdir("$pathway/includes");
mkdir("$pathway/images");
mkdir("$pathway/js");


//INDEX FILE CREATION
$h5_index = fopen("$pathway/index.php", "w") or die("Unable to open file!");
$php_opener=htmlspecialchars_decode('<?php');
$php_closer=htmlspecialchars_decode('?>');
$h5_index_txt=''.$php_opener.' 
include %includes/header.php%;
echo %<div class="bodyContainer container80">Hello World</div>%;
include %includes/footer.php%;
'.$php_closer.'';
$h5_index_txt=str_replace("%","'","$h5_index_txt");
fwrite($h5_index, $h5_index_txt);
fclose($h5_index);


//DATABASE CONNECTION FILE CREATION
$h5_db_config = fopen("$pathway/config.php", "w") or die("Unable to open file!");
$h5_db_config_txt = "/* HIGHFIVE BASE CONFIG */";
fwrite($h5_db_config, $h5_db_config_txt );
fclose($h5_db_config);

//INCLUDES CREATION
$h5_includes_nb = fopen("$pathway/includes/navbar.php", "w") or die("Unable to open file!");
$h5_includes_nb_txt='<nav><div class="container80"><div class="branding">'.$siteName.'</div><ul><li><a href="#">sample</a></li><li><a href="#">sample2</a></li><li><a href="#">sample3</a></li></ul></div></nav>';
fwrite($h5_includes_nb, $h5_includes_nb_txt);
fclose($h5_includes_nb);


$h5_includes_hdr = fopen("$pathway/includes/header.php", "w") or die("Unable to open file!");
$h5_includes_hdr_txt='
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>'.$siteName.'</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/highfive.css">
</head>

<body>
'.$php_opener.' 
include %includes/navbar.php%;
'.$php_closer.'';
$h5_includes_hdr_txt=str_replace("%","'","$h5_includes_hdr_txt");
fwrite($h5_includes_hdr, $h5_includes_hdr_txt);
fclose($h5_includes_hdr);


$h5_includes_ftr = fopen("$pathway/includes/footer.php", "w") or die("Unable to open file!");
$h5_includes_ftr_txt='<div style="clear:both;"></div><footer><div class="container90">footer</div></footer></body></html>';
fwrite($h5_includes_ftr, $h5_includes_ftr_txt);
fclose($h5_includes_ftr);


//CSS CREATION
$h5_css = fopen("$pathway/css/highfive.css", "w") or die("Unable to open file!");
$h5_css_hdr = '
/* 
HIGHFIVE BASE CSS FRAMEWORK
*/

/*BODY*/
body{padding:0px;margin:0px;background-color:#e6e7e8;font-family: "Roboto", sans-serif;}

/*BOXES*/
.white-box{min-height:50px;background-color:#fff;box-shadow:0px 2px 2px #666;padding-top:15px;}
.col-25{width:25%;}
.col-33{width:33.333333%;}
.col-50{width:50%;}
.col-75{width:75%;}
.col-100{width:100%;}
.containerL{width:98.5%;margin-right:2.5%;float:left;}
.containerR{width:98.5%;margin-left:2.5%;float:right;}
.containerMid{width:95%;margin-left:2.5%;margin-right:2.5%;}
.container p {width:95%;margin-left:2.5%;margin-right:2.5%;margin-top:0px;}
.container90{width:90%;margin-left:5%;margin-right:5%;}
.container80{width:80%;margin-left:10%;margin-right:10%;}
.container70{width:70%;margin-left:15%;margin-right:15%;}
.container60{width:60%;margin-left:20%;margin-right:20%;}
.bodyContainer{min-height:5in;}

/*NAVBAR*/
nav{line-height:75px;height:75px;width:100%;position:fixed;top:0px;left:0px;background-color:#1697c0;height:75px;}
nav ul{float:left;list-style-type:none;padding:none;margin:none;padding-top:0px;margin-top:0px;}
nav ul li{display:inline;margin-right:15px;padding-top:0px;margin-top:0px;}
.branding{float:left;margin-right:25px;}

/*SPACING*/
.floatL{float:left;}
.floatR{float:right;}
.clear{clear:both;}

/*FOOTER*/
footer{background-color:#404041;height:150px;color:#fff;padding-top:25px;}

/*BANNER*/
#banners{height:3in;width:95%;background-color:#ccc;float:left;}

/*HEIGHTS*/
.height-25{height:25px;}
.height-50{height:50px;}
.height-125{height:125px;}
.height-150{height:150px;}
.height-200{height:200px;}

/*BUTTONS AND FORMS*/
.btn-lg{padding:10px;text-align:Center;height:35px;line-height:35px;box-shadow:0px 2px 2px #666;}
.btn-md{padding:5px;text-align:Center;height:25px;line-height:25px;box-shadow:0px 2px 2px #666;}
.btn-sm{padding:3px;text-align:Center;height:15px;line-height:15px;box-shadow:0px 2px 2px #666;}
.btn-default{background-color:#666;color:#fff;}

';


fwrite($h5_css, $h5_css_hdr);
fclose($h5_css);

//SCSS CREATION
$h5_scss = fopen("$pathway/css/highFive_skin.scss", "w") or die("Unable to open file!");
$h5_scss_hdr = "/* HIGHFIVE BASE SCSS FRAMEWORK */";
fwrite($h5_scss,$h5_scss_hdr);
fclose($h5_scss);

//RESULT
echo '<br><br><span style="colore:green;">All Done</span>';
echo '<br><br><span style="colore:green;"><a href="'.$pathway.'/index.php">visit</a></span>';
}
?>
