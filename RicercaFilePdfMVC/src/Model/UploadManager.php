<?php 
declare(strict_types=1);

namespace SimpleMVC\Model;
use SimpleMVC\Model\Session;
use PDO;
use Smalot\PdfParser\Parser;

class UploadManager
{
    
	protected $con;
    protected $parser; 
    protected $session; 

	public function __construct(PDO $con, Parser $parser, Session $session)
	{
		$this->con = $con;
        $this->parser = $parser;
		$this->session = $session;
	
		// if($this->session->getStatus() === 1 || empty($this->session->get('email')))
     	// 	exit('Access Denied');

	}

    public function uploadFile($fileOrigin, $fileStore)
    {


		//$fileOrigin= $_FILES['fileToUpload']['tmp_name']; //cartella temporanea di php
    	//$fileStore = "pdf/".$_FILES['fileToUpload']['name']; //mia cartella
       
        if (isset($_REQUEST['upload'])){ //mudar por se existe method==POST

			if(isset($_FILES['fileToUpload'])){ // $files= $request->getUploadedFiles();
       
				if ($_FILES['fileToUpload']['type'] === "application/pdf") { //usa file->getClientMediaType

					if (!file_exists($fileStore)) {

					move_uploaded_file($fileOrigin, $fileStore); //inves de usar essa funcao usar moveto q èe funcao do PSR7

						if($_FILES['fileToUpload']['error'] == 0) {
							print "File caricato con successo!";
						
							//estrazione contenuto com parser
							$path= 'pdf'; 
							$fnamePath= utf8_decode($_FILES["fileToUpload"]["name"]);				
							$pdf = $this->parser->parseFile("$path/$fnamePath");  
							$content = $pdf->getText();//prendo o texto forma de stringa	
							 			

							//inserzione db 
							$sth = $this->con->prepare("INSERT INTO files (filename, content) VALUES (:filename, :content)");
							$sth->bindParam(':filename', $_FILES["fileToUpload"]["name"]);
							$sth->bindParam(':content',$content); 
							$sth->execute();
						
						}
					}else
					print "Questo file già esiste nella cartella!!";	

				}else
				print "ERRORE: ".$_FILES['fileToUpload']['name']." non è di estensione PDF o è inesistente!";
				
			}else
			print("Seleziona un file!!");
        
		}
			

					
	}




	public function logout()
  	{
		$this->session->close();
		header('location: /');
  	}
        
    


}
