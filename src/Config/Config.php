<?php
/**
 * An implementor class for IConfig interface
 * 
 * @package		repository
 * @version		1.0.0
 * @author		Prakash Rajput
 * @license		Proprietary
 * @copyright
 */
namespace PCH\Library\Config;

use PCH\Library\Config\iConfig;
/**
 * A configuration class to set/get configurations  
 * @author prajput
 *
 */
class Config implements iConfig {
	private  $config = array ();

	public function __construct() {
		$this->config = array(
				'database' => array(
						'mysql' => [
						'host' => 'localhost',
						'driver'    => 'pdo_mysql',
						'dbname'  => 'pack-repository',
						'user'  => 'root',
						'password'  => '',
						'charset'   => 'utf8',
						'collation' => 'utf8_unicode_ci',
						'prefix'    => '',
						]
				),
				'isDevMode' =>true
		);

	}
	public function get($section, $parameter = null) {
		if (! isset ( $this->config [$section] )) {
			throw new \Exception ( "{$section} is NOT a valid section in config" );
		}

		if ($parameter) {
			if (! isset ( $this->config [$section] [$parameter] )) {
				throw new \Exception ( "{$parameter} is NOT a valid parameter in {$section} Section" );
			}
			return $this->config [$section] [$parameter];
		}

		return $this->config [$section];
	}
}
