<?php 

 class ProfesorInstitucionController extends Controller
 {
  
  public function actionAdhesiongimnasio()
  {
     if(!Yii::app()->user->isGuest){
	//Es un usuario logueado.
	 $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
	 }
	  if(isset($_GET['id_institucion'])){
		$profins = new ProfesorInstitucion;
	    $id_institucion = $_GET['id_institucion'];
		$id_usuario = $usuario->id_usuario;
		$profins->id_usuario = $id_usuario;
		$profins->id_institucion = $id_institucion;
		$profins->id_estado = 0;
		$profins->fhcreacion = new CDbExpression('NOW()'); 
		$profins->fhultmod = new CDbExpression('NOW()');
		$profins->cusuario = $usuario->email;
	    if($profins->validate()){
			 if($profins->save()){?>
				 <script>alert("Se envio la solicitud para adherirse correctamente");</script>
			<?php	 
			}
		 }		
      }
		
	  $criteria = new CDbCriteria;
      $criteria->select = 't.id_institucion,t.nombre,t.cuit,t.direccion,t.id_localidad,t.telfijo,t.celular,t.depto,t.piso';
      $criteria->condition = 't.id_institucion NOT IN (SELECT id_institucion FROM profesor_institucion WHERE id_usuario ='.$usuario->id_usuario.')';
	  $ficinstituciones = FichaInstitucion::model()->findAll($criteria);
	  $this->render('Adhesiongimnasio',array('ficinstituciones'=>$ficinstituciones,));
    }
   
   public function actionListadoProfesores()
   {
     $this->render('ListadoProfesores');
   }
   public function actionMostrardatos()
   {
     $this->render('Mostrardatos');
   }	
 } 
