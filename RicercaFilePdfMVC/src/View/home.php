<?php $this->layout('layout', ['title' => 'Home']) ?>

<h1 style="text-align: center;">Home page</h1>
<p><strong>Per fare il login, click here: </strong><a href="\login">Login</a></p>

<h3>Cerca contenuto del file</h3>

<!-- Load icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/styleRicerca.css">


<form name="search" action="/"class="example" method="post" >
  <input type="text" name="contentFile" placeholder="Search.." >
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

<h4>Risultato della ricerca: </h4>


<?php foreach ($files as $file): ?>
            <li><?= $this->e($file)?></li>
<?php endforeach; ?>



