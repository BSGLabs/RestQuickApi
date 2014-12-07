<?php 
/**
 * 
 */
 class form
 {
 	
 	function check($source )
 	{
 		
 		foreach ($source as $key => $value) {
 			if(!$this->valid($value))
 			{
 				return false;
 			}
 		}
 		return true;
 	}
 	function valid($text)
 	{
 		return $text != null;
 	}
 }