<?php
//esse arquivo tb è 1 classe mas que nao estara junto c as demais no controller

class Autoload{

    public function __construct()
    {
        //funcao q carrega a extensao
        spl_autoload_extensions('.class.php');
        //funco q registra a classe acessada
        spl_autoload_register(array($this, 'load'));
        //echo "meu metodo construct do autoload funciona<br>";
    }

    private function load($class){
        $extension = spl_autoload_extensions();
        require_once('controller/'.$class.$extension);
    }
}
//vc tb pode instanciar no index ou aki mesmo essa classe
$autoload = new Autoload();


// public function __construct()
//     {
//         spl_autoload_register([$this, @Paginas]);
//     }

//     private function Paginas($modelli){
//         $this->permitidos = (['./Models/'.$modelli.'.php']);
//         foreach ($this->permitidos as $modelli) {
//             if(!file_exists($modelli)){
//                 echo "<br>Nao foi possivel caarregar a classe: ".$modelli;
//                 exit;
//             }else{
//                 require_once($modelli);
//             }
//         }
//     }

?>
