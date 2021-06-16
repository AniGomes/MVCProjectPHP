<?php
// declare(strict_types=1);

// namespace SimpleMVC\Test\Controller;
// use SimpleMVC\Model\HomeSearch;
// use League\Plates\Engine;
// use PHPUnit\Framework\TestCase;
// use Psr\Http\Message\ServerRequestInterface;
// use SimpleMVC\Controller\Home;
// use SimpleMVC\Controller\ControllerInterface;

// final class HomeTest extends TestCase
// {
//     public function setUp(): void
//     {
//         $this->plates = new Engine('src/View');
//         $this->homeSearch = $this->createMock(HomeSearch::class);

//         $this->home = new Home($this->plates, $this->homeSearch);
//         $this->request = $this->createMock(ServerRequestInterface::class);
//     }

//     // public function testExecuteRenderHomeView(): void
//     // {
//     //     $this->expectOutputString($this->plates->render('home'));
//     //     $this->home->execute($this->request);
//     // }


//     public function testExecuteRenderHomeView(): void
//     {
//         $name = 'test';
//         $this->request->method('getAttribute')
//             ->with($this->equalTo('name'))
//             ->willReturn($name);

//         $this->expectOutputString($this->plates->render('home', ['name' => ucfirst($name)]));
//         $this->home->execute($this->request);
//     }

   
    
// }
