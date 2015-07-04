<?php
/* @var $this InstitucionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Institucions',
);

$this->menu=array(
	array('label'=>'Create Institucion', 'url'=>array('create')),
	array('label'=>'Manage Institucion', 'url'=>array('admin')),
);
?>

<h1>Institucions</h1>

    <table border="1">
    <tr><th>Nombre</th><th>Título</th><th>Acción</th></tr>
<?php foreach ($institucion as $ins) { ?>
   <tr><td><?php echo $ins->password ?></td>
   <td><?php echo $ins->email ?></td>
   <td><a href="?r=profesor/consulta&id=<?php
    echo $ins->id_institucion ?>"/>
     Detalle</a></td>
   </tr>
 <?php } ?>