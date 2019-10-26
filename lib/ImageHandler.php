<?php
/**
 * 
 * @author oc1d
 *
 */
class ImageHandler {
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function __construct() {
		
	}
	
	public function scaleImage($srcFilename, $dstFilename, $targetX, $targetY, $deleteOriginal = false) {
			$isPng = false;
			$isJpg = false;
			if(substr($srcFilename, -3) == 'png') {
				$im = imagecreatefrompng($srcFilename);
				$isPng = true;
			}					
			else if(substr($srcFilename, -3) == 'jpg') {
				$im = imagecreatefromjpeg($srcFilename);
				$isJpg = true;
			}	 
			else {
				throw new Exception('Wrong image format, only JPG and PNG supported!');
			}			
			$img_x = imagesx($im); 
			$img_y = imagesy($im); 
			
			if ($img_x > $img_y ) { 
				$x=$targetX; 
				$y = ($x*$img_y)/$img_x; 
			} 
			
			if ($img_x < $img_y ) { 
				$y=$targetY; 
				$x=($y*$img_x)/$img_y; 
			} 
			
			$neu = imagecreatetruecolor($x,$y); 
			imagecopyresampled($neu, $im, 0, 0, 0, 0, $x, $y, $img_x, $img_y); 
			if($isJpg) {
				if(imagejpeg($neu, $dstFilename, 95) && $deleteOriginal) unlink($srcFilename);
			} 
			else if ($isPng) {
				if(imagepng($neu, $dstFilename) && $deleteOriginal) unlink($srcFilename);
			}
			imagedestroy($im); 
			return true;
	}

}