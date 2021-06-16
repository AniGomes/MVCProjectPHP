<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;
use SimpleMVC\Model\LoginManager;
use SimpleMVC\Model\Session;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

class Login implements ControllerInterface
{
    protected $login;
    protected $plates;
    protected $session;

    public function __construct(LoginManager $login, Engine $plates, Session $session)
    {
        $this->login = $login;
		$this->plates = $plates;
        $this->session = $session;//qdo chamo inicializa a session devido construct della calsse Session
       
    }

    public function execute(ServerRequestInterface $request)
    {
      
        //se exixtir um metodo de tipo Get renderizzo meu form login
        if($request->getMethod() === 'GET') { 
            $this->renderLoginForm();
            return;
        }

        //capturo o body dos post passados no form
        $postData = $request->getParsedBody();        
        $email = $postData['email'];
        $password = $postData['password'];    

        if(false === $this->login->loginVerify($email, $password)) {
            $this->renderLoginForm('Credenziali Invalidi..Riprova!');
            return;
            
        } 

        if(true === $this->login->loginVerify($email, $password)) {//view
            header("Location: /upload");
        }

       
        //se true memorizo utente na session e faco redirect com header
        $this->session->add('email', $email);//conflito UnitTest
        //var_dump($this->session->getAll());	
        header("Location: /upload");
	
    }

    private function renderLoginForm(string $error = ''): void
    {
        echo $this->plates->render('login', [
            'error' => $error
        ]);
    }
    


}
