<?php
/**
 * Repository Manager class 
*
* @package		core
* @version		1.0.0
* @author		Prakash Rajput
* @license		Proprietary
* @copyright
*/
namespace PCH\Library\DB;

use PCH\Library\DB\iRepositoryManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use PCH\Library\Config\iConfig;

/**
 * Repository manager class 
 **/
class RepositoryManager implements iRepositoryManager {
	
	protected $entityManager;
	protected static $instance;
	
	private function __construct(iConfig $config=null) {
		if (!$config) $config = new Config();
			
		$conn = $config->get('database')["mysql"];
			
		// Load entity configuration from PHP file annotations
		// This is the most versatile mode, I advise using it!
		// If you don't like it, Doctrine also supports YAML or XML
		$isDevMode = $config->get('isDevMode');
			
		$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
		$this->entityManager =  EntityManager::create($conn, $config);
	}
	public static function getInstance(iConfig $config=null) {

		if (!self::$instance) {
			self::$instance = new RepositoryManager($config);
		}
		return 	self::$instance ;
	}
	public function flush() {
		$this->entityManager->flush();
	}
	public function persist(iEntity $entity) {
		$this->entityManager->persist($entity);
	}
	
	public function remove(iEntity $entity) {
		$this->entityManager->persist($entity);
	}
	
	public function getEntityManager() {
		return $this->entityManager;
	}	

	public function getRepository($entityClassName) {
		return $this->entityManager->getRepository($entityClassName);
	}
}

?>