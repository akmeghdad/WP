<?php
/*
header ('Content-Type: image/png');
$im = @imagecreatetruecolor(120, 20)
or die('Cannot Initialize new GD image stream');
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5,  'A Simple Text String', $text_color);
imagepng($im);
imagedestroy($im);

$Width = 64;
$Height = 32;

$Image = imagecreatetruecolor(120, 200);
for($Row = 1; $Row <= $Height; $Row++) {
	for($Column = 1; $Column <= $Width; $Column++) {
		$Red = mt_rand(0,255);
		$Green = mt_rand(0,255); 
		$Blue = mt_rand(0,255);
		$Colour = imagecolorallocate ($Image, $Red , $Green, $Blue);
		imagesetpixel($Image,$Column - 1 , $Row - 1, $Colour);
	}
}

header('Content-type: image/png');
imagepng($Image);
*/
?>
<?php
/*
http://www.thesitewizard.com/php/create-image.shtml
<img src="<?php echo get_template_directory_uri()?>/ak/imge.php?e=<?php echo mt_rand(1,200);?>&w=350&h=200" alt="ALTT"  width="256" height="133">
*/
for($i=1;$i<4;$i++){
$c1 = mt_rand(0,255); //r(ed)
$c2 = mt_rand(0,255); //g(reen)
$c3 = mt_rand(0,255); //b(lue) 


$my_img = imagecreate( 350, 200 );

if(empty($_GET["w"])) $_GET["w"]=350;

if(empty($_GET["h"])) $_GET["h"]=200;
	
$my_img = imagecreate( $_GET["w"], $_GET["h"] );
$background = imagecolorallocate( $my_img, $c1, $c2, $c3 );
$text_colour = imagecolorallocate( $my_img, 128, 255, 0 );
$line_colour = imagecolorallocate( $my_img, 128, 255, 0 );
imagestring( $my_img, 5, 50, 25, "matni roye tasvir", $text_colour );
imagesetthickness ( $my_img, 5 );
imageline( $my_img, 50, 45, 190, 45, $line_colour );

header( "Content-type: image/png" );
imagepng( $my_img );
imagecolordeallocate( $line_color );
imagecolordeallocate( $text_color );
imagecolordeallocate( $background );
imagedestroy( $my_img );
echo '<br>';
}
?>