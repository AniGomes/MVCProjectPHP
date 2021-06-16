<?php
declare(strict_types=1);


namespace SimpleMVC\Controller;
use SimpleMVC\Model\HomeSearch;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;


class Home implements ControllerInterface
{
    protected $plates;
    protected $search;

    public function __construct(Engine $plates, HomeSearch $search)
    {
        $this->plates = $plates;
        $this->search = $search;
        
    }

    public function execute(ServerRequestInterface $request)
    {
        
        $content= $_REQUEST["contentFile"];
        
        
        echo $this->plates->render('home');
        
        $this->search->searchContent($content);
               
    }



}
