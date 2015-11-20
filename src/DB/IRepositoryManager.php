<?php
/**
 * An interface for Repository Manager
*
* @package		core
* @version		1.0.0
* @author		Prakash Rajput
* @license		Proprietary
* @copyright
*/
namespace PCH\Library\DB;

use PCH\Library\DB\iEntity;
use PCH\Library\Config\iConfig;

/**
 * Repository Manager interface
 **/
interface  iRepositoryManager {
		
	public static function getInstance(iConfig $config=null); 
	
	public function flush();
	
	public function persist(iEntity $entity); 
	
	public function remove(iEntity $entity);
	
	public function getRepository($entityClassName);
}

?>