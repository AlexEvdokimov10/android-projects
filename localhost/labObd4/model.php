<?
class Car {
	private $code;
	private $number;
	private $places;
	private $code_owner;
	private $code_autopark;
	public function __construct($code,$number=null,$places=null, Owner $code_owner=null,Autopark $code_autopark=null){
		$this->code=$code;
		$this->number=$number;
		$this->places=$places;
		$this->code_owner=$code_owner;
		$this->code_autopark=$code_autopark;
	}
		public function getCode(){
			return $this->code;
		}
		public function setCode($code){
			$this->code=$code;
		}
		public function getNumber(){
			return $this->number;
		}
		public function setNumber($number){
			$this->number=$number;
		}
		public function getPlaces(){
			return $this->places;
		}
		public function setPlaces($places){
			$this->places=$places;
		}
		public function getOwner(){
			return $this->code_owner;
		}
		public function setOwner(Owner $code_owner){
			$this->code_owner=$code_owner;
		}
		public function getAutopark(){
			return $this->code_autopark;
		}
		public function setAutopark(Autopark $code_autopark){
			$this->code_autopark=$code_autopark;
		}


	}

	/**
	 * 
	 */
	class Owner
	{
		private $code;
		private $name;
		
		function __construct($code,$name=null)
		{
			$this->code=$code;
			$this->name=$name;
		}
		public function getCode(){
			return $this->code;
		}
		public function setCode($code){
			$this->code=$code;
		}
		public function getName(){
			return $this->name;
		}
		public function setName($name){
			$this->name=$name;
		}


	}
	/**
	 * 
	 */
	class Autopark
	{
		private $code;
		private $name;
		private $count_places;
		
		function __construct($code,$name=null,$count_places=null)
		{
			$this->code=$code;
			$this->name=$name;
			$this->count_places=$count_places;
		}
		public function getCode(){
			return $this->code;
		}
		public function setCode($code){
			$this->code=$code;
		}
		public function getName(){
			return $this->name;
		}
		public function setName($name){
			$this->name=$name;
		}
		public function getPlaces(){
			return $this->count_places;
		}
		public function setPlaces($count_places){
			$this->count_places=$count_places;
		}
		
	}
		class Config
		{
			public static $server="localhost:3306";
			public static $user="root";
			public static $pwd="root";
			public static $db="autopark";
		}
		class CarDB{
			private $db;

			function __construct(){
				$this->db=new \mysqli(\Config::$server, \Config::$user, \Config::$pwd, \Config::$db);
				$this->db->query("SET NAMES 'utf-8'");
			}
			function getCars(){
				$sql='select s.code, number, places, code_owner, code_autopark from cars s inner join owners g on s.code_owner = g.code INNER JOIN autopark k on s.code_autopark=k.code ';
				$rs=$this->db->query($sql);
				$cars=[];
				while ($row=$rs->fetch_assoc()) {
					$cars[]=new Car(
						$row['code'],
						$row['number'],
						$row['places'],
						new Owner($row['code_owner'],$row['name']),
						new Autopark($row['code_autopark'],$row['name'],$row['count_places'])
						
					);
				}
				return $cars;
			}
			function removeCar(Car $car){
				$sql='delete from cars where code =' . $car->getCode();
				$this->db->query($sql);
			}
			function addCar(Car $car){
				$sql="insert into cars(number, places, code_owner, code_autopark) values('" . $car->getNumber() . "', '" . $car->getPlaces() . "',' " . $car->getOwner()->getCode() ."',". $car->getAutopark()->getCode() . ");";
				$this->db->query($sql);
			}
			function getOwners(){
				$sql="select code, name from owners";
				$rs=$this->db->query($sql);
				$owners=[];
				while ($row=$rs->fetch_assoc()) {
					$owners[]=new Owner($row['code'], $row['name']);
				}
				return $owners;
			}
			function getAutoparks(){
				$sql="select code, name, count_places from autopark";
				$rs=$this->db->query($sql);
				$autoparks=[];
				while ($row=$rs->fetch_assoc()) {
					$autoparks[]=new Autopark($row['code'], $row['name'], $row['count_places']);
				}
				return $autoparks;
			}
			function readCar(Car $car){
				$sql="select s.code, number, places, code_owner, code_autopark from cars s inner join owners g on s.code_owner = g.code INNER JOIN autopark k on s.code_autopark=k.code where s.code = " . $car->getCode();
				$rs=$this->db->query($sql);
				if($row=$rs->fetch_assoc()){
					$car->setNumber($row['number']);
					$car->setPlaces($row['places']);
					$car->setOwner(new Owner($row['code_owner'],$row['name']));
					$car->setAutopark(new Autopark($row['code_autopark'],$row['name'],$row['count_places']));
				}
				return $car;
			}
			function editCar(Car $car){
				$this->db->query('set @code = ' . $car->getCode());
				$sql="call edit_car(
				@code,
				'" . $car->getNumber() . "',
				" . $car->getOwner()->getCode() . ",
				". $car->getAutopark()->getCode() .",
				'" . $car->getPlaces() ."',
				@status
				)";
				$this->db->query($sql);
				$rs=$this->db->query("select @status as s");
				$row = $rs->fetch_assoc();
				return $row['s'];
			}
		}

	
