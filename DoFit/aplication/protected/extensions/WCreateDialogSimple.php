<?php

/**
 * Description of WCreateDialog
 * @author anisrehan (rehan@webcare.pk)
 * @link www.webcare.pk
 * @copyright (c) 2007-2015, Webcare.pk
 */
Yii::import('zii.widgets.jui.CJuiDialog');

/**
 * WCreateDialog displays a dialog widget with create form using the given controller path.
 *
 * WCreateDialog extends the CJuiDialog widget
 *
 * To use this widget, you may insert the following code in a view:
 * <pre>
 * $this->beginWidget('ext.webcare.widgets.WCreateDialog', array(// the dialog
 *      'id' => 'MyDialog',
 *      'linkText' => 'Create New MyClass', // The Button which is placed for opening the dialog
 *      'url' => array('controller/create'), // controller/action usually create
 *      'parentElementSelector' => '#selectElement',  // the parent select element in which the data returned will be populated
 *     // additional javascript options for the dialog plugin
 *     'options'=>array(
 *         'title'=>'Dialog box 1',
 *         'autoOpen'=>false,
 *     ),
 * ));
 *
 * $this->endWidget('ext.webcare.widgets.WCreateDialog');
 *
 * </pre>
 * 
 * Don't forget to change your controller's create action like the following
 * <pre>
 * if ($model->save()) {
 *      if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {
 *          echo CJSON::encode(
 *                  array(
 *                      'status' => 'success',
 *                      'div' => 'MyClass Record successfully added',
 *                      'newObj' => array('id'=>$model->id,'value'=>$model->title),
 *                  )
 *          );
 *          Yii::app()->end();
 *      } else {
 *          $this->redirect(array('view', 'id' => $model->id));
 *      }
 *  }
 * </pre>
 * 
 * And before the following code
 * 
 * <pre>
 * $this->render('create', array(
 *      'model' => $model,
 * ));
 * </pre>
 * Add the following
 * <pre>
 * if (Yii::app()->request->isAjaxRequest) {
 *   echo CJSON::encode(array(
 *     'status'=>'failure', 
 *     'div'=>$this->renderPartial('_form', array('model'=>$model), true)));
 *   Yii::app()->end();
 * }
 *
 *      
 * 
 * </pre>
 */
class WCreateDialog extends CJuiDialog {

    public $url;
    public $parentElementSelector; // it is the selector in which we would like to update the data after closing.
    public $linkText; // text to be diplayed over the create button

//    public $tagName='div'; //it's inherited

    /**
     * Renders the open tag of the dialog.
     * This method also registers the necessary javascript code.
     */
    public function init() {
//        parent::init();

        $id = $this->getId();
        if (isset($this->htmlOptions['id'])) {
            $id = $this->htmlOptions['id'];
        } else {
            $this->htmlOptions['id'] = $id;
        }

        $options = CJavaScript::encode($this->options);
        Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $id, "jQuery('#{$id}').dialog($options);");

        echo CHtml::button($this->linkText, // label
                array(
            'onclick' => "{addDialog(); jQuery('#{$id}').dialog('open');}"));

        echo CHtml::openTag($this->tagName, $this->htmlOptions) . "\n";
        
        echo CHtml::openTag('div', array('class' => 'resultContainer'));
        echo CHtml::closeTag('div');
        
        echo CHtml::script('function addDialog(){'
                . CHtml::ajax(array(
                    'url' => $this->url,
                    'data' => "js:$(this).serialize()",
                    'type' => 'post',
                    'dataType' => 'json',
                    'success' => "function(data)
                    {
                        if (data.status == 'failure') {
                            // Here is the trick: on submit-> once again this function!
                            jQuery('#{$id} div.resultContainer').html(data.div);
                            jQuery('#{$id} div.resultContainer form').submit(addDialog);
                        }
                        else if(data.status == 'success') {
                            jQuery('#{$id} div.resultContainer').html(data.div);
                            jQuery('" . $this->parentElementSelector . "').append('<option value=\"' + data.newObj.id + '\">' + data.newObj.value + '</option>');
                            setTimeout(\"jQuery('#{$id}').dialog('close') \",500);
                        }

                    } "
                )) . ';
                return false;}');
    }

    /**
     * Renders the close tag of the dialog.
     */
    public function run() {
        echo CHtml::closeTag($this->tagName);
    }

}
