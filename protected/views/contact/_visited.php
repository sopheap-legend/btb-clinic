<?php $this->widget('ext.modaldlg.EModalDlg'); ?>
<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
        'id'=>'patient-his-grid',
        //'fixedHeader' => true,
        //'responsiveTable' => true,
        //'type'=>'striped bordered hover',
        'template'=>"{summary}{items}\n{pager}",
        'dataProvider'=>$visit->showPatientHis($patient_id),
        'summaryText' =>'<p class="text-info"> Visit History </p>',
        'htmlOptions'=>array('class'=>'table-responsive panel'),
        'columns'=>array(
                array('name'=>'id',
                    'header'=>Yii::t('app','ID'),
                    'headerHtmlOptions' => array('style' => 'display:none'),
                    'htmlOptions' => array('style' => 'display:none'),
                ),
                array('name'=>'visit_date',
                      'header'=>'Visit Date', 
                ),
               /* array('name'=>'display_id',
                       'header'=>'Patient ID', 
                ),*/
                array('name'=>'sympton',
                       'header'=>'Sympton', 
                ),
                array('name'=>'observation',
                       'header'=>'Observation', 
                ),
                array('name'=>'diagnosis',
                    'header'=>'Diagnosis',
                ),
                /*array('name'=>'assessment',
                       'header'=>'Assessment', 
                ),
                array('name'=>'plan',
                       'header'=>'Plan', 
                ),*/
                array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    //'template'=>'{view}',
                    'template'=>'<div class="hidden-sm hidden-xs btn-group">{detail}</div>',
                    'buttons'=>array(
                        'detail' => array(
                            'label' => Yii::t('app','Detail'),
                            'icon' => 'ace-icon fa fa-eye',
                            'click' => 'updateDialogOpen',
                            'url'=>'Yii::app()->createUrl("contact/visitDetail", array("visit_id"=>$data["visit_id"],"patient_id"=>$data["patient_id"]))',
                            'options' => array(
                                'data-toggle' => 'tooltip', 
                                'data-update-dialog-title' => 'Visit Detail',
                                'class'=>'btn btn-xs btn-info', 
                                'title'=>'Visit Detail',
                            ),
                        ),
                        /*'revisit' => array(
                            'label' => Yii::t('app','Revisit'),
                            //'icon' => 'ace-icon fa fa-hospital-o',
                            'url'=>'Yii::app()->createUrl("contact/VisitUnderConst", array("visit_id"=>$data["visit_id"],"patient_id"=>$data["patient_id"]))',
                            'options' => array(
                                'class'=>'btn btn-xs btn-success',
                                'title'=>'Re-Visit',
                            ),
                        ),*/
                    ),
                ),
        ),
)); 
?>   