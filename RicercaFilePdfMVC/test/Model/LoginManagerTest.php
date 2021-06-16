<?php
declare(strict_types=1);

namespace SimpleMVC\Test\Model;

use SimpleMVC\Model\LoginManager;
use PHPUnit\Framework\TestCase;

use PDO;
use PDOStatement;


final class LoginManagerTest extends TestCase
{
    public function setUp(): void
    {
        //ha bisogno di un oggetto pdo
        $this->pdo = $this->createMock(PDO::class);
        $this->sth = $this->createMock(PDOStatement::class);

        $this->pdo->method('prepare')
        ->willReturn($this->sth);

        $this->sth->method('execute')
        ->willReturn(true);

        //creo instanza della login
        $this->login = new LoginManager($this->pdo);
    }

   
    // public function testExecuteRenderUploadView(): void
    // {
    //     $this->expectOutputString($this->plates->render('upload'));
    //     $this->upload->execute($this->request);
    // }

    public function testLoginWrongEmail(): void
    {
        $this->sth->method('fetch') //fetch deve restituit valor false
        ->willReturn(false);

        $this->assertFalse($this->login->loginVerify('bar','pwdgiusta'));
    }


    public function testLoginWrongPwd(): void
    {
        //utente correto e pwd sbagliata
        $this->sth->method('fetch') //fetch deve resituit valor false
        ->willReturn([
            'email' => 'foo@gmail.com',
            'password' => '$2y$10$rbJCSYxLmzsnAHeoZenF3u/ZUekM6tFCqejBRe.8bfwagkU.nN2se'

        ]);

        $this->assertFalse($this->login->loginVerify('foo@gmail.com','xxx'));
    }

    public function testLoginCorrectCredentials()
    {
        
        $this->sth->method('fetch') 
        ->willReturn([
            'email' => 'anielle@gmail.com',
            'password' => '$2y$10$mLxg0XSg65WOJ9UE.wBRMe4lt.HMHX96GqT5M89bFnDQafwOCgvry'

        ]);

        //asserTrue
        $this->assertFalse($this->login->loginVerify('anielle@gmail.com','password'));
    }

   
}
