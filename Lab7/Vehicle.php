<?php
include ("Header.php");
include ("Menu.php");
include ("Footer.php");
?>

<html>
<head>
<title>Vehicle</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="content">
		<?php
        interface Vehicle {
        	
        	public function displayVehicleInfo();
        }
        
        class LandVehicle implements Vehicle {
        	
        	protected $make;
        	protected $model; 
        	protected $year; 
        	protected $price;
        	
        	function __construct($make, $model, $year, $price) {
        		
        		$this->make = $make;
        		$this->model = $model;
        		$this->year = $year;
        		$this->price = $price;
        	}
        	
        	public function displayVehicleInfo() {
        		
        		return "<strong>Make</strong>: " . $this->make . 
        		", <strong>Model</strong>: " . $this->model . 
        		", <strong>Year</strong>: " . $this->year . 
        		", <strong>Price</strong>: " . $this->price;
        	}
        }
        
        class Car extends LandVehicle {
        	
        	private $speedLimit;
        	
        	function __construct($make, $model, $year, $price, $speedLimit) {
        		
        		parent::__construct($make, $model, $year, $price);
        		$this->speedLimit = $speedLimit;
        	}
        	
        	public function displayVehicleInfo() {
        		
        		return parent::displayVehicleInfo() . 
        		", <strong>Speed Limit</strong>: " . $this->speedLimit;
        	}
        }
        
        class WaterVehicle implements Vehicle {
        	
        	protected $make;
        	protected $model; 
        	protected $year; 
        	protected $price;
        	
        	function __construct($make, $model, $year, $price) {
        		
        		$this->make = $make;
        		$this->model = $model;
        		$this->year = $year;
        		$this->price = $price;
        	}
        	
        	public function displayVehicleInfo() {
        		
        		return "<strong>Make</strong>: " . $this->make . 
        		", <strong>Model</strong>: " . $this->model . 
        		", <strong>Year</strong>: " . $this->year . 
        		", <strong>Price</strong>: " . $this->price;
        	}
        }
        
        class Boat extends WaterVehicle {
        	
        	private $boatCapacity;
        	
        	function __construct($make, $model, $year, $price, $boatCapacity) {
        	
        		parent::__construct($make, $model, $year, $price);
        		$this->boatCapacity = $boatCapacity;
        	}
        	
        	public function displayVehicleInfo() {
        	
        		return parent::displayVehicleInfo() .
        		", <strong>Boat Capacity</strong>: " . $this->boatCapacity;
        	}
        }
        
        echo "<h2><u>Car</u></h2>";
        $camry = new Car("Toyota", "Camry", 1992, 2000, 180);
        $accord = new Car("Honda", "accord", 2002, 6000, 200);
        echo $camry->displayVehicleInfo() . "<br /><br />" . $accord->displayVehicleInfo() . "<br /><br />";
        
        echo "<h2><u>Boat</u></h2>";
        $turbo = new Boat("Mitsubishi", "Turbo", 1999, 20000, 18);
        $xt = new Boat("Hyundai", "XT", 2012, 26000, 8);
        echo $turbo->displayVehicleInfo() . '<br><br>' . $xt->displayVehicleInfo();
        
        ?>
        </div>
	</body>		
</html>