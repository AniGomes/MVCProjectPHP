<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;
use SimpleMVC\Model\UploadManager;
use SimpleMVC\Model\Session;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;


class Upload implements ControllerInterface
{
    
    protected $upload;
    protected $plates;
    protected $session; 


    public function __construct(UploadManager $upload, Engine $plates, Session $session)
    {
        $this->upload = $upload;
        $this->plates = $plates;
        //accesso restrito session
		$this->session = $session;
	
		//  if($this->session->getStatus() === 1 || empty($this->session->get('email')))
        //  exit('Access Denied');
     
    }

    public function execute(ServerRequestInterface $request)
    {

        //controllo se nao esiste la sessione retorno a page login
        if(false === $this->session->exists('email')){
            header('Location: /login');
            return;
        }  

        //se exixtir um metodo de tipo Get renderizzo meu form upload
        //$request è un standard PSR-7 p evitar de usar variavel global  como $_POST,$_SERVER..
        if($request->getMethod() === 'GET') { 
            $this->renderUploadForm();
            return;
        }

       //prendo i file inviati dall POst com $request->getFiles
        $files= $request->getUploadedFiles();
        //var_dump($files);
        $file = $files['fileToUpload'];
        var_dump($file);

        $fileName= $file->getClientFilename();//pega so o nome do file

          
        $fileOrigin= $_FILES['fileToUpload']['tmp_name'];//$file->getUri(); ve como se pega um file com getUri non va
        $FileStore= "pdf/" . $fileName;

       
        $this->upload->uploadFile($fileOrigin, $FileStore);   
        //$files = $request->getUploadedFiles(['clientFilename']);
            


        //} 
        
        //$this->session->close();
	
    }

    

    private function renderUploadForm(string $error = ''): void
    {
        echo $this->plates->render('upload', [
            'error' => $error
        ]);
    }
}
  


            

            