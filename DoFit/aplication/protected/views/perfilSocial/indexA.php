
<?php
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'post-form',
        'enableAjaxValidation' => FALSE,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
?>
<?php

echo "
    <h1 xmlns=\"http://www.w3.org/1999/html\">Pagina inicial Perfil Social</h1>
    <div id='content_perfil'>
        <p>Completa tu perfil</p>
        <div class='p_datos'>
            <div><p><span class='size_2'>Luciano Soro</span>, <span class='size_1'>25</span></p></div>
            <div><p><span class='size_2'>194</span><span class='size_1'> amigos</span></p></div>
        </div>


        <div class='' id='p_agregar_foto'>
            <img src=''><a href=''></a></img>
            <div class=''></div>
        </div>
        <div class='p_foto_1'>
            <img src='/DOFIT_FINAL/DoFit/aplication/images/pat1.jpg'><a href=''></a></img>
            <div class=''></div>
        </div>
        <div class='p_foto_2'>
            <img src='/DOFIT_FINAL/DoFit/aplication/images/pat2.jpg'><a href=''></a></img>
            <div class=''></div>
        </div>
        <div class='p_foto_3'>
            <img src='/DOFIT_FINAL/DoFit/aplication/images/pat3.jpg'><a href=''></a></img>
            <div class=''></div>
        </div>
        <div class='p_foto_4'>
            <img src='/DOFIT_FINAL/DoFit/aplication/images/pat4.jpg'><a href=''></a></img>
            <div class=''></div>
        </div>
    </div>";

?>
<?php
  
?>
<?php $this->endWidget(); ?>