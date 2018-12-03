<?php
//Definimos nombre de clase
class Salud{
    //Definimos propiedades
    public $edad;
    public $nombre;
    public $pesoActual;
    public $pesoIdeal;
    public $estadoPeso;
    
    //Definimos método para calcular peso ideal
    function calcularPesoIdeal(){
        $this->pesoIdeal = $this->edad * 2 + 8;
        return $this->pesoIdeal;
    }
    function determinarEstadoPeso(){
           if($this->pesoActual == $this->pesoIdeal){
               $this->estadoPeso = "Peso Ideal";
           }else{
               if($this->pesoActual >$this->pesoIdeal){
                    $this->estadoPeso = "Sobrepeso";
               }else{
                    $this->estadoPeso = "Bajo peso";
               }
           }
           return $this->estadoPeso;
    }
} 
?>