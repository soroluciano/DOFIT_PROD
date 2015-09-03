<?php


class JuiController extends Controller
{
    public function actioncompletarDeporte() {
        $res =array();

        if (isset($_GET['term'])) {
            $qtxt ="SELECT deporte FROM deporte WHERE deporte LIKE :deporte";
            $command =Yii::app()->db->createCommand($qtxt);
            $command->bindValue(":deporte", '%'.$_GET['term'].'%', PDO::PARAM_STR);
            $res =$command->queryColumn();
        }

        echo CJSON::encode($res);
        Yii::app()->end();
    }

    public function actioncompletarProfesor() {
        $res =array();

        if (isset($_GET['term'])) {
            $qtxt ="SELECT nombre FROM ficha_usuario WHERE nombre LIKE :nombre AND id_usuario IN (SELECT id_usuario FROM usuario WHERE id_estado = 1 AND id_perfil = 2)";
            $command =Yii::app()->db->createCommand($qtxt);
            $command->bindValue(":nombre", '%'.$_GET['term'].'%', PDO::PARAM_STR);
            $res =$command->queryColumn();
        }

        echo CJSON::encode($res);
        Yii::app()->end();
    }



}
?>
