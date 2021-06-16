<?php $this->layout('layout', ['title' => 'Upload']) ?>

<?php
if (!empty($error)) { 
    echo $this->e($error); 
}
?>

<h2 style= "text-align: center;">Upload files</h2>


<form name="upload" action="/upload" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
<br>
<div><fieldset><legend><span >Upload PDF Form</span></legend>Seleziona un file PDF:<div>
<br>
<div> <input type="file" name="fileToUpload" size="10000000000"/></div>
<br>
<input type="submit" name="upload" value="Upload nella cartela prestabilita">
</div>
<p > <a href="/">Back to Home </a> </p>
</fieldset>

