


    <?php $deporte = Deporte::model()->find('id_deporte=:id_deporte',array(':id_deporte'=>$ac->id_deporte));?>
    echo "<td>";
        <?php echo $deporte->deporte; ?></td>
    <?php $ah = ActividadHorario::model()->find('id_actividad='.$ac->id_actividad);
    $dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
    $cantdias = count($dias);
    $cont = 0;
    while ($cont < $cantdias){
        if($cont+1 == $ah->id_dia){
            echo "<td>$dias[$cont]</td>";
        }
        $cont++;
    }?>
    echo "<td>";
        <?php echo $ah->hora ?>
        echo " </td>";





<?php/*
		        $institucion = FichaInstitucion::model()->find('id_institucion='.$ac->id_institucion);
			    echo "<td>$institucion->nombre</td>";
			    echo "<td>$institucion->direccion</td>";
			    $id_localidad = $institucion->id_localidad;
                $localidad = Localidad::model()->find('id_localidad='.$id_localidad);
                echo "<td>$localidad->localidad</td>";
                $id_provincia = $localidad->id_provincia;
                $provincia = Provincia::model()->find('id_provincia='.$id_provincia);
  		        echo "<td>$provincia->provincia</td>";
			    echo "<td>$institucion->telfijo</td>";
			    echo "<td>$institucion->celular</td>";
			    echo "<td>$institucion->acepta_mp</td>";
			    echo "<td>$ac->valor_actividad</td>";?>
                      <td> <?php echo CHtml::link('Ver ubicacion!',array('FichaInstitucion/GoogleMaps','nombre'=>$institucion->nombre,'direccion'=>$institucion->direccion,'localidad'=>$localidad->localidad,'provincia'=>$provincia->provincia));?></td>
                      <td><?php echo "<a href='InscripcionActividad/?id_actividad=$ac->id_actividad' class='btn btn-default'>Inscribirme!</a>"?></td>
    </table>
<?php		
}
	}
else
{
  echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>Ya se encuentra inscripto a todas las actividades de DoFit!</h2>
                        </div>
                    </div>";
}
 }
else
{
 
  echo    "<div class='row'>
                        <div class='.col-md-6 .col-md-offset-3'>
                            <h2 class='text-center'>No se encuentran actividades creadas!</h2>
                        </div>
                   </div>";	
}				  */
?>
</div>
<br/>
