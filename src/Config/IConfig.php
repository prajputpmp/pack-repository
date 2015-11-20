<?php
/**
 * An interface class for configuration class 
 *
 * @package		repository
 * @version		1.0.0
 * @author		Prakash Rajput
 * @license		Proprietary
 * @copyright
 */
namespace PCH\Library\Config;

interface iConfig {
	
	/****** Method to get propertry value ******/
	public function get($property) ;
	
}