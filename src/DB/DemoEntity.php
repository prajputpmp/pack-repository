<?php
/**
 * A Test repository class to test repository functionality
 *
 * @package		repository
 * @version		1.0.0
 * @author		Prakash Rajput
 * @license		Proprietary
 * @copyright
 */

namespace PCH\Library\DB;

use PCH\Library\DB\iEntity;
/**
 * A Test repository class 
 * @author prajput
 * 
 * @Entity @Table(name="entity")
 */
class DemoEntity implements iEntity {
		
		/** @id @Column(type="integer") @GeneratedValue **/
		public $id;
	
		/** @Column(type="string") **/
		protected  $name;
	
		/** @Column(type="string") **/
		protected  $email;
	
		/** @Column(type="string") **/
		protected  $password;
	
		/******** Setter Methods ********/
		public function setName($value) {
			$this->name = $value;
		}
		
		public function setEmail($value) {	
			$this->email = $value;
		}
		public function setPassword($value) {
			$this->password = $value;
		}
	
		/******** Getter Methods ********/
		public function getName() {
			return $this->name;
		}
		public function getEmail() {
			return $this->email;
		}
		public function getPassword() {
			return $this->password;
		}

		/********** Protected Methoeds ***********/
		/**
		 * @PostLoad
		 */
		protected function postLoad() {
		
		}
		/**
		 * @PrePersist @PreUpdate
		 */
		protected function prePersist() {
		
		}
	
}