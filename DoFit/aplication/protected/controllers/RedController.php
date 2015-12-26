
<?php

class RedController  extends Controller{
    public function actionIndex(){
        
        $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
        $resultSetProf = Yii::app()->db->createCommand("select pmp.id_posteo,pmp.posteo,ps.fotoPerfil,fu.nombre,fu.apellido from perfil_muro_profesor pmp inner join actividad ac on pmp.id_actividad=ac.id_actividad inner JOIN perfil_social ps on ps.id_usuario = ac.id_usuario inner join usuario usu on usu.id_usuario = ac.id_usuario inner join ficha_usuario fu on fu.id_usuario= usu.id_usuario where usu.id_usuario =".$usuario->id_usuario." order by pmp.fhcreacion desc,pmp.fhultmod desc")->queryAll();
       // $resultSetAl = Yii::app()->db->createCommand("select pm.id_posteo,pm.posteo,ps.fotoPerfil,fu.nombre,fu.apellido FROM perfil_muro_profesor pm,actividad_alumno aa, actividad a,ficha_usuario fu,perfil_social ps where pm.id_actividad=aa.id_actividad and aa.id_actividad = a.id_actividad and a.id_usuario=ps.id_usuario and aa.id_usuario=".$usuario->id_usuario )>queryAll();
        
        if($usuario->id_perfil == 1){
           // $this->render('index',array('usuario'=>$usuario,'resultSet'=>$resultSetAl));
        }else{
            $this->render('index',array('usuario'=>$usuario,'resultSet'=>$resultSetProf));
		}

    }

    
    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    





}

?>