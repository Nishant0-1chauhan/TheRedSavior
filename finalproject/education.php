<?php 
	
	class education	{
		private $id;
			private $name;
			private $address;
			private $bgroup;
			private $age;
			private $mobile;
			private $lat;
			private $lng;
			private $conn;
			private $tableName="donors";

			function setId($id) { $this->id = $id; }
			function getId() { return $this->id; }
			function setName($name) { $this->name = $name; }
			function getName() { return $this->name; }
			function setAddress($address) { $this->address = $address; }
			function getAddress() { return $this->address; }
			function setBgroup($bgroup) { $this->bgroup = $bgroup; }
			function getBgroup() { return $this->bgroup; }
			function setAge($age) { $this->age = $age; }
			function getAge() { return $this->age; }
			function setMobile($mobile) { $this->mobile = $mobile; }
			function getMobile() { return $this->mobile; }
			function setLat($lat) { $this->lat = $lat; }
			function getLat() { return $this->lat; }
			function setLng($lng) { $this->lng = $lng; }
			function getLng() { return $this->lng; }

		public function __construct() {
			require_once('db/DbConnect.php');
			$conn = new DbConnect;
			$this->conn = $conn->connect();
		}

		

		public function getAllColleges() {
			$sql = "SELECT * FROM $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}

		
	}

?>