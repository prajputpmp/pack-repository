<?php

namespace Tests\Unit\Domain;
		
use PCH\Library\Config\Config;
use PCH\Library\DB\RepositoryManager;
use PCH\Library\DB\DemoEntity;

class DemoRepositoryTest extends \PHPUnit_Framework_TestCase {
	
	
	protected  $repositoryMgr;
	public function setUp() {
		$this->repositoryMgr = RepositoryManager::getInstance(new Config());
	}

	public function test_repository_manager_instance() {
	
		if (is_object($this->repositoryMgr)) 
			$this->assertTrue(true);
		else 
			$this->assertTrue(false);

	}
	
	public function test_insert_entity() {
	
		$entity = new DemoEntity();
	
		$entity->setName("TestUser");
		$entity->setEmail("test@test.com");
		$entity->setPassword("demopassword");
		
		// Save in the database
		$this->repositoryMgr->persist($entity);
		$this->repositoryMgr->flush();
	}
		
	public function test_update_entity() {
	
		$entity = $this->repositoryMgr->getRepository("PCH\Library\DB\DemoEntity")->find(1);
	
		$datetime = new \DateTime();
		
		$entity->setName("TestUser001");
		$entity->setEmail("test001@test.com");
		$entity->setPassword((string)$datetime->getTimestamp());
	
		// Save in the database
		$this->repositoryMgr->persist($entity);
		$this->repositoryMgr->flush();
	}
	
	public function test_remove_domain() {
	
		$entitys = $this->repositoryMgr->getRepository("PCH\Library\DB\DemoEntity")->findAll();
	
		foreach ($entitys as $entity) {
			if ($entity->id <= 2) continue;
		
			$this->repositoryMgr->remove($entity);
		}
		// Save in the database
		$this->repositoryMgr->flush();
	}
	
}

?>

