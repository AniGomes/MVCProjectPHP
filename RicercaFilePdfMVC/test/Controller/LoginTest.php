<?php
declare(strict_types=1);

namespace SimpleMVC\Test\Controller;
use SimpleMVC\Controller\Login;
use SimpleMVC\Model\LoginManager;
use SimpleMVC\Model\Session;
use League\Plates\Engine;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

use SimpleMVC\Controller\ControllerInterface;


final class LoginTest extends TestCase
{
    public function setUp(): void
    {
        
        $this->plates = new Engine('src/View');//creo instanza concreta de plates che e libreria esterna
        
        //crio mock del modello e della sessione perche vogliamo testare il controller
        $this->loginManager = $this->createMock(LoginManager::class);
        $this->session = $this->createMock(Session::class);

        $this->login = new Login($this->loginManager,$this->plates, $this->session);
        $this->request = $this->createMock(ServerRequestInterface::class);
      
    }

    public function testLoginIsIstanceOfControllerInterface()
    {
        $this->assertInstanceOf(ControllerInterface::class, $this->login);
    }

  


    public function testExecuteMethodIsGet()
    {
        $this->request
            ->method('getMethod')
            ->willReturn('GET');

        $this->expectOutputString($this->plates->render('login'));
        $this->login->execute($this->request);
    }


    // public function testExecuteInvalidCredentials()
    // {
    //     $this->request
    //         ->method('getMethod')
    //         ->willReturn('POST');

    //     $this->request
    //         ->method('getParsedBody')
    //         ->willReturn([
    //             'email' => 'email', 
    //             'password' => 'password'
    //         ]);

    //     $this->loginManager
    //             ->method('loginVerify')
    //             ->willReturn(false);

    //     $this->expectOutputString($this->plates->render('login', [
    //         'error' => 'wrong email or password'
    //     ]));
    //     $this->login->execute($this->request);
    // } 

    
   
   
    
    
    

        
   
}
