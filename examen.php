<?php
require_once('class.collection.php');
class ZonaGeografica{
    //////Ejercicio4//////
    var $superficie;

    static $population = 0;
    /////////////////////

    private $NamePais;
    private $NameProvincia;
    private $zonaGeografica = array();

    public function add(ZonaGeografica  $ZonaGeografiques) {
        array_push($this->zonaGeografica, $ZonaGeografiques);
    }
    
    public function remove(ZonaGeografica  $ZonaGeografiques) {
        array_pop($this->zonaGeografica);
    }
            
    public function hasChildren() {
        return (bool)(count($this->zonaGeografica) > 0);
    }
        
    public function getChild($i) {
        return $this->zonaGeografica[i];
    }

    /////////Ejercicio4/////////
    public function __construct($superficie){
		$this->superficie = $superficie;
		echo "El valor es de la variable superficie es: " . $this->superficie . "<br/>"; 
		self::$population++;
		echo "Aquí te digo cuantas instancias recorre, como solo quiero recorrer la variable superficie, habrá " . self::$population . " instancia recorrida.";
	}


	static public function say_population(){
		echo "This is the population: " . self::$population;
	}

	function sayNums(){
		echo $this->one;
		echo $this->two;
		echo $this->three;
	}

	function say_age(){
		echo "This is the age: " . $this->age;
	}
    ///////////////////////////////////////////////////    
    public function getDescription() {
        echo "- one " . $this->getNamePais();
        if ($this->hasChildren()) {
            echo " which includes:<br>";
            foreach($this->zonaGeografica as $ZonaGeografiques) {
                echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
                $ZonaGeografiques->getDescription();
                echo "</td></tr></table>";
            }        
        }
    }
    public function getSuma() {
        echo "- one " . $this->getNamePais();
        $ProvinciaAbsoluta = 0;
        if ($this->hasChildren()) {
            echo " which includes:<br>";
            foreach($this->zonaGeografica as $ZonaGeografiques) {
                echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
                $ProvinciaAbsoluta = $ProvinciaAbsoluta + $ZonaGeografiques->getSuma();
                echo "</td></tr></table>";
            }        
        } 
        return $ProvinciaAbsoluta + $this->NameProvincia;
    }
    public function setNamePais($NamePais) {
        $this->NamePais = $NamePais;
    }
       
    public function getNamePais() {
        return $this->NamePais;
    }
              
    public function setNameProvincia($NameProvincia) {
        $this->NameProvincia = $NameProvincia;
    }
     
     public function getNameProvincia() {
         return $this->NameProvincia;
     }
}


  class Pais extends ZonaGeografica {
    function __construct($NamePais, $NameProvincia) {
      parent::setNamePais($NamePais);
      parent::setNameProvincia($NameProvincia);
    }      
  }
  
  class Provincia extends ZonaGeografica {
    function __construct($NamePais, $NameProvincia) {
     parent::setNamePais($NamePais);
     parent::setNameProvincia($NameProvincia);
    }
  }

  class Planeta extends ZonaGeografica {
    function __construct($NamePais, $NameProvincia) {
     parent::setNamePais($NamePais);
     parent::setNameProvincia($NameProvincia);
    }
  }

  $España = new Pais("Pais1", "Provincia1");
  $ProvinciaEspaña = new Provincia("Provincia1", "Pais1");
  $Francia = new Pais("Pais2", "Provincia2");
  $ProvinciaFrancia = new Provincia("Provincia2", "Pais2");
  $Planeta = new Planeta("Aquí dentro irá los paises y las provincias", "Aquí dentro irá las provincias");

  $ProvinciaEspaña->add($España);
  $ProvinciaFrancia->add($Francia);

  //$Planeta->getDescription();
  echo "Ejercicio 1";
  echo "</br>";
  echo "Apartado A";
  echo "</br>";
  $ProvinciaAbsoluta = $Planeta->getDescription();
  echo "</br>";
  echo $ProvinciaAbsoluta;






/*
class ZonaGeografica{

  private $_pais;
  private $_provincia;


  public function __construct($pais, $provincia){
    $this->_pais = $pais;
    $this->_provincia = $provincia;
  }

  public function __toString() {
    return $this->_pais . ' es provincia ' . $this->_provincia;
  }

}

$colHerencia = new Collection();
$colHerencia->addItem(new ZonaGeografica("Pais1", "Provincia1"), "pais1");
$colHerencia->addItem(new ZonaGeografica("Pais2", "Provincia2"), "pais2");
$colHerencia->addItem(new ZonaGeografica("Pais3", "Provincia3"), "pais3");

$objPais1 = $colHerencia->getItem("pais1");
$objPais2 = $colHerencia->getItem("pais2");
$objPais3 = $colHerencia->getItem("pais3");
echo "Ejercicio1";
echo "</br>";
echo "Apartado A";
echo "</br>";
print $objPais1; //prints "Steve is number 14"
echo "</br>";
print $objPais2;
echo "</br>";
print $objPais3;

//ejercicio2

$dat = new DataSource();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);

$dat->addRecord("vejez", "60", 1955);
$dat->addRecord("adulto", "$12.95", 1955);
$dat->addRecord("drum", "$12.95", 1955);

$widgetA->draw();
$widgetB->draw();
*/
/////////Ejercicio3////////////
/////////Apartado1////////////
class Casa{
  private $_Puerta;
  private $_Ventana;
  private $_Persiana;

  public function __construct($Puerta, $Ventana, $Persiana){
    $this->_Puerta = $Puerta;
    $this->_Ventana = $Ventana;
    $this->_Persiana = $Persiana;
  }

  public function __toString() {
    return $this->_Puerta . ' esta puerta accede a la ' . $this->_Ventana . ' que tiene una ' . $this->_Persiana;
  }
}




$casa = new Collection();
$casa->addItem(new Casa("Puerta1", "Ventana1", "Persiana1"),"Casita1");
$casa->addItem(new Casa("Puerta2", "Ventana2", "Persiana2"),"Casita2");
$casa->addItem(new Casa("Puerta3", "Ventana3", "Persiana3"),"Casita3");

$Casita1 = $casa->getitem("Casita1");
$Casita2 = $casa->getitem("Casita2");
$Casita3 = $casa->getitem("Casita3");
echo "</br>";
echo "</br>";
echo "Apartado B";
echo "</br>";
print $Casita1;
echo "</br>";
print $Casita2;
echo "</br>";
print $Casita3;
echo "</br>";
echo "</br>";

////////Ejercicio3////////

class Calefactor{

    private $Calor;
	private $Frio;


    public function __set($encender, $temperatura){
		if( (property_exists($this, $encender)) && ($temperatura >=0) && ($temperatura <=50) ) {
			$this->$encender = $temperatura;
			echo "Está encendido ON {$temperatura} º.";
		} else {
			echo "No está encendido OFF {$temperatura} º.";
		}
	}

	//public function __get(...)
	public function __get($encender){
		echo "You tried to update or access {$encender}";
	}
}

$dude = new Calefactor();
echo "Ejercicio 3";
echo "</br>";
$dude->Calor = 20;
echo "</br>";
$dude->Frio = -10;
echo "</br>";
echo "</br>";

echo "Ejercicio 4";
echo "</br>";
$dude = new ZonaGeografica("ValorDeLaSuperficie");