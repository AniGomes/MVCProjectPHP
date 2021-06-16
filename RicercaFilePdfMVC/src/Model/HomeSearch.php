<?php 
declare(strict_types=1);

namespace SimpleMVC\Model;
use PDO;


class HomeSearch
{
    protected $con;
    

	public function __construct(PDO $con)
	{
		$this->con = $con;
        
    }
    
    public function searchContent(string $content) 
    {
        //$files=[];
           
   
        $sth = $this->con->prepare("SELECT * FROM files WHERE content LIKE '%{$content}%'");
        $sth->execute();
        $result = $sth->fetchAll();
        print_r($result);

        // foreach ($result as $row) {
        //     $files[] = $row['content'];
        // }
        
        

    }



}
  
		

    		



