<?php Nerd::find(); 
$nerd->email= Input::get(email); 
$nerd->name= Input::get(name); 
$nerd->nerd_level= Input::get(nerd_level); 
nerd->save();
 ?>
