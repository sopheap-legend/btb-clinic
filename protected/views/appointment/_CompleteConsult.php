<?php $this->widget( 'ext.modaldlg.EModalDlg' ); ?>
<div class="register_container">
<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), 
            'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'),
        ),
)); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        //'id'=>'doctor_consult',
        //'action'=>Yii::app()->createUrl('appointment/DoctorConsult'),
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'layout'=>TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id'=>'add_item_form',
)); ?>

    <?php if(Yii::app()->user->hasFlash('error')):?>
        <?php $this->widget('bootstrap.widgets.TbAlert'); ?>
    <?php endif; ?>
    <div class="col-sm-6"> 

        <?php echo $form->textAreaControlGroup($visit,'sympton',array('rows'=>1 , 'cols'=>10, 'class'=>'span2')); ?>

        <?php echo $form->textAreaControlGroup($visit,'assessment',array('rows'=>1 , 'cols'=>10, 'class'=>'span2')); ?>
    </div>

    <div class="col-sm-6">
        <!--<h4 class="header blue bolder smaller"><i class="ace-icon fa fa-key blue"></i><?php //echo Yii::t('app','Treatment Result') ?></h4>--->

        <?php echo $form->textAreaControlGroup($visit,'observation',array('rows'=>1 , 'cols'=>10, 'class'=>'span2')); ?>
        <?php echo $form->textAreaControlGroup($visit,'plan',array('rows'=>1 , 'cols'=>10, 'class'=>'span2')); ?>
    </div>

    <div class="col-sm-12">
        <?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
            'title' => Yii::t('app','Treatment'),
            'headerIcon' => 'ace-icon fa fa-medkit',
            'headerButtons' => array(
                $this->renderpartial('_select_treatment',array('treatment'=>$treatment,'treatment_items'=>$treatment_items),true)            
            ),
            'htmlHeaderOptions'=>array('class'=>'widget-header-flat widget-header-small'),
            //'content' => $this->renderPartial('_form_treatment'),
        ));?> 
            <div class="grid-view" id="select_treatment_form">                
                <?php $this->renderPartial('_ajax_treatment', array('treatment_selected_items' => $treatment_selected_items,'treatment'=>$treatment), false) ?>                 
            </div>
        <?php $this->endWidget(); ?> 
    </div>  

    <div class="col-sm-12" id="medicine_form">
        <?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
                'title' => 'Medicine',
                'headerIcon' => 'ace-icon fa fa-medkit',
                    'headerButtons' => array(
                    $this->renderpartial('_Medicine',array('medicine'=>$medicine),true)
                ),
                'htmlHeaderOptions'=>array('class'=>'widget-header-flat widget-header-small'),
                //'content' => $this->renderPartial('_form', array('model'=>$model,'model_search'=>$model_search,'leave_detail_wrapper'=>$leave_detail_wrapper,'employee_id'=>$employee_id), true),
            ));?> 
                <div id="select_medicine_form">
                    <?php $this->renderPartial('_select_medicine', array('medicine_selected_items'=>$medicine_selected_items,'medicine'=>$medicine,), false); ?>
                </div>
        <?php $this->endWidget(); ?> 
    </div>
    
    <div class="col-sm-12">
        <div class="form-actions" id="form-actions">
             <?php echo TbHtml::submitButton($visit->isNewRecord ? Yii::t('app','Save') : Yii::t('app','Save'),array(
               'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
               'size'=>TbHtml::BUTTON_SIZE_SMALL, 
               'id'=>'Save_consult',  
               'name'=>'Save_consult' 
               //'size'=>TbHtml::BUTTON_SIZE_SMALL,
           )); ?>
            <?php if(!empty($chk_bill_saved)) { ?>            
            <?php 
                $this->widget('bootstrap.widgets.TbModal', array(
                    'id' => 'show-payment-modal',
                    'header' => 'Payment Amount',
                    'content' => $this->renderpartial("_add_payment",array('form'=>$form,'model'=>$model),true,false),                    
                    'footer' => implode(' ', array(
                        TbHtml::submitButton(Yii::t('app','Pay'), array(
                            'name'=>'Completed_consult',
                            'id'=>'Completed_consult',
                            'color' => TbHtml::BUTTON_COLOR_PRIMARY)
                        ),
                        TbHtml::button('Close', array('data-dismiss' => 'modal')),
                    )),
                ));
            ?>
            <?php echo TbHtml::button(Yii::t('app','Completed Consultation'), array(
                'color' => TbHtml::BUTTON_COLOR_SUCCESS,
                'size' => TbHtml::BUTTON_SIZE_SMALL,
                'data-toggle' => 'modal',
                'data-target' => '#show-payment-modal',
            )); ?>
            <?php             
            /*echo TbHtml::submitButton($visit->isNewRecord ? Yii::t('app','Completed Consultation') : Yii::t('app','Completed Consultation'),array(
               'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
               'name'=>'Completed_consult' 
               //'size'=>TbHtml::BUTTON_SIZE_SMALL,
           ));*/
            
            /*echo TbHtml::linkButton(Yii::t( 'app', 'Completed Consultation' ),array(
                        'color'=>TbHtml::BUTTON_COLOR_SUCCESS,
                        'size'=>TbHtml::BUTTON_SIZE_SMALL,
                        //'icon'=>'ace-icon fa fa-undo white',
                        'url'=>$this->createUrl('appointment/ActualAmount',array("visit_id"=>$_GET['visit_id'],"patient_id"=>$_GET['patient_id'],"doctor_id"=>$_GET['doctor_id'])),
                        'class'=>'update-dialog-open-link',
                        'data-update-dialog-title' => Yii::t( 'app', 'Payment Amount' ),))*/
            
            ?>                
            <?php } ?>
        </div>  
    </div>


<?php $this->endWidget(); ?>
    
</div>  



<?php 
$url=Yii::app()->createUrl('Appointment/Addmedicine/');        
Yii::app()->clientScript->registerScript( 'update_medicine',"
    $('#Item_id').on('change',function(e) {
        medicine_id=$('#Item_id').val();
        $.ajax({
            url:'$url', 
            dataType : 'json',    
            type : 'post',
            data : {medicine_id:medicine_id},
            beforeSend: function() { $('.waiting').show(); },
            complete: function() { $('.waiting').hide(); },
            success : function(data) {
                if(data.status=='success')
                {
                    $('#select_medicine_form').html(data.div_medicine_form);
                    $('#Item_id').select2('val', 'All');
                }    
            }
        });
    });
"); 
?>

<?php
Yii::app()->clientScript->registerScript( 'deleteMedicine',"
        $('div#select_medicine_form').on('click','a.delete-item',function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url:url,
            dataType:'json',
            type:'post',    
            beforeSend: function() { $('.waiting').show(); },
            complete: function() { $('.waiting').hide(); },
            success:function(data) {
                if(data.status=='success')
                {
                    $('#select_medicine_form').html(data.div_medicine_form);
                }
            }
        });
    });
");
?>

<?php
Yii::app()->clientScript->registerScript( 'deleteTreatment',"
        $('div#select_treatment_form').on('click','a.delete-treatment',function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url:url,
            dataType:'json',
            type:'post',    
            beforeSend: function() { $('.waiting').show(); },
            complete: function() { $('.waiting').hide(); },
            success:function(data) {
                if(data.status=='success')
                {
                    //$('#select_medicine_form').html(data.div_medicine_form);
                    $('#select_treatment_form').html(data.div_treatment_form);
                }
            }
        });
    });
");
?>

<?php
$url=Yii::app()->createUrl('Appointment/Addtreatment/');        
Yii::app()->clientScript->registerScript( 'update_treament',"
    $('#Treatment_id').on('change',function(e) {
        treatment_id=$('#Treatment_id').val();
        //alert(treatment_id);
        $.ajax({
            url:'$url', 
            dataType : 'json',    
            type : 'post',
            data : {treatment_id:treatment_id},
            beforeSend: function() { $('.waiting').show(); },
            complete: function() { $('.waiting').hide(); },
            success : function(data) {
                if(data.status=='success')
                {
                    $('#select_treatment_form').html(data.div_treatment_form);
                    $('#Treatment_id').select2('val', 'All');  //clear select2 value http://bit.ly/1Gttc7X
                }    
            }
        });
    });
");  
?>

<?php
$red_url = Yii::app()->createUrl('Appointment/waitingqueue/');  
Yii::app()->clientScript->registerScript( 'completedConsult',"
        $('div#form-actions').on('click','a.completed-consult',function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url:url,
            dataType:'json',
            type:'post',    
            beforeSend: function() { $('.waiting').show(); },
            complete: function() { $('.waiting').hide(); },
            success:function(data) {
                if(data.status=='success')
                {
                    //$('#select_medicine_form').html(data.div_medicine_form);
                    window.location.href = '$red_url';
                }
            }
        });
    });
");
?>

<script language="JavaScript" type="text/javascript">  
    $(document).ready(function()
    {
        $('a').click(function(e) {
            e.preventDefault();
            a_href = $(this).attr("href");
            var ans = confirm("Your Data will lose if you leave this page! Are wan to leave?");
            if(ans===true)
            { 
                $.ajax({ type: "POST",
                     url: "Emptytreatment",
                     success:function(){                        
                          window.location.href=a_href;
                     }
                });
            }
        });
    });
    function check_leave_page()
    {
        vchk=0;
        $.ajax({ type: "POST",
            url: "leavepage",
            success:function(){  
                vchk=1;
            }
        });
        return true;
    }
</script>  