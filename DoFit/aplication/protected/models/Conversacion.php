<?php
class Conversacion extends CActiveRecord
{
   public function tableName()
   {
		return 'conversacion';
   }

   public function rules()
   {
	 return array(
           array('usuario, mensaje','required','message'=>'Ingrese un {attribute}'),
         );
   }		 
   public static function model($className=__CLASS__)
   {
	 return parent::model($className);
   }
 }  
?>   
   