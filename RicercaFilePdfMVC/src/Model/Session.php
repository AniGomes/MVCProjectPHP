<?php
declare(strict_types=1);

namespace SimpleMVC\Model;


//Classe per la gestione delle sessione

class Session
{
  
  public function __construct()
  {
    session_start();
  }
  
  /**
   * Agrega elemento a sessione
   * @param string $key chiave dell array della sessione
   * @param string $value valore per elemento della sessione
   */
  public function add($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  /**
   * Ritorna un elemento 
   * @param string $key 
   * @return string 
   */
  public function get($key)
  {
    return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
  }

  /**
   * Retorna tutti valori
   * @return array completo della session
   */
  public function getAll()
  {
    return $_SESSION;
  }

  /**
   * Rimuove elemento
   * @param string $key chiave dell array
   */
  public function remove($key)
  {
    if(!empty($_SESSION[$key]))
      unset($_SESSION[$key]);
  }

 
  public function close()
  {
    session_unset();
    session_destroy();
  }

  /**
   * Ritorna status
   * @return string 
   */
  public function getStatus()
  {
    return session_status();
  }

  public function exists($key): bool
  {
    if(isset($_SESSION[$key]))
    {
      return true;
    }
    return false;
    
  }

}