<?php
/* @var $this FichaInstitucionController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1>Instituciones que utilizan DoFit!</h1>
<table border="1">
    <tr><th>Nombre</th><th>Cuit</th><th>Direccion</th><th>Localidad</th><th>Provincia</th><th>Telefono Fijo</th><th>Celular</th><th>Departamento</th><th>Piso</th><th>Google Maps</th></tr>
<?php foreach ($ficha_institucion as $ficins) { ?>
   <tr>
   <td><?php echo $ficins->nombre ?></td>
   <td><?php echo $ficins->cuit ?></td>
   <td><?php echo $ficins->direccion ?></td>
   <td><?php $id_localidad = $ficins->id_localidad; 
       $localidad = Localidad::model()->find('id_localidad=:id_localidad',array(':id_localidad'=>$id_localidad));
      echo $localidad->localidad;?></td>  
   <td><?php $id_provincia = $localidad->id_provincia;
        $provincia = Provincia::model()->find('id_provincia=:id_provincia',array(':id_provincia'=>$id_provincia));
        echo $provincia->provincia;?></td>		
   <td><?php echo $ficins->telfijo ?></td>
   <td><?php echo $ficins->celular?></td>
   <td><?php echo $ficins->depto?></td>
   <td><?php echo $ficins->piso?></td>
   <td><?php echo CHtml::link('Ver ubicacion en Google Maps!',array('GoogleMaps','nombre'=>$ficins->nombre,'direccion'=>$ficins->direccion,'localidad'=>$localidad->localidad,'provincia'=>$provincia->provincia));?></td>
   </tr>
 <?php } ?>
