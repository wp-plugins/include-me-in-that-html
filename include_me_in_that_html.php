<?php
/*
Plugin Name: Include Me In That (html)...
Plugin URI: http://www.bochgoch.com/?p=wp
Description: include external HTML files in any post, simply add a <!--IMITH *yourfilename.inc*IMITH--> comment into the post in the position you want the file to appear replacing *yourfilename.inc* as appropriate
Version: 1.0
Author: bochgoch
Author URI: http://www.bochgoch.com
*/

/*  Copyright 2007  Martin Ford  (email : wordpress@bochgoch.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
function include_me_in_that_html($content) {

 		$IMIT_directory = 'IMIT_files/';
		if (preg_match('/<!--IMITH .*-->/i',$content,$matches))
		{
      preg_match_all('/<!--IMITH/',$content,$matches1,PREG_OFFSET_CAPTURE);
      preg_match_all('/IMITH-->/',$content,$matches2,PREG_OFFSET_CAPTURE);
			$retval = "";
			$startPos = 0;
			for ( $counter = 0; $counter < count($matches1[0]); $counter += 1 ) 
			{ 
			 	$contentFiles = explode("|",substr($content,$matches1[0][$counter][1]+9,$matches2[0][$counter][1]-$matches1[0][$counter][1]-9));
  			if (count($contentFiles) > 1) // we have been provided with a number of files to randomly select between 
  				   {$contentFile = $contentFiles[rand(0,count($contentFiles)-1)];}
  			else {$contentFile = $contentFiles[0];} 
        $fh = fopen($IMIT_directory.trim($contentFile), 'r');
        $fileData = fread($fh, filesize($IMIT_directory.trim($contentFile)));
        fclose($fh);
	 
			 $retval .= substr($content,$startPos,$matches1[0][$counter][1]-$startPos); 
			 $retval .= $fileData;
			 $startPos = $matches2[0][$counter][1]+8;
			}
			$retval .= substr($content,$startPos,strlen($content)-$startPos); 
 			return $retval;
		}
		else
		{
		 return $content;
		}
}
add_filter('the_content','include_me_in_that_html');
?>
