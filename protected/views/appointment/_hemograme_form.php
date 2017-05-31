<style type="text/css">
    .form-transp-input input{
        #font-style: italic;
        padding: 0px 0px 0px 0px;
        background: transparent;
        outline: none;
        border: none;
        border-bottom: 1px dashed #83A4C5;
        #width: 100%;
        overflow: hidden;
        resize:none;
        height:18px;
    }

    fieldset {
        font-family: sans-serif;
        border: 1px solid #1F497D;
        font-size: 12px;
        background: #EEF4F9;
        border-radius: 2px;
        padding: 10px;
    }

    fieldset legend {
        background: #6f3cc4;
        color: #fff;
        padding: 2px 2px ;
        font-size: 22px;
        border-radius: 5px;
        box-shadow: 0 0 0 5px #ddd;
        margin-left: 5px;
    }

    label{
        font-size: 12px;
    }

    label strong{
        font-size: 15px;
        color: blue;
    }

    .in-group-transp{
        background:none;
        border:none;
        box-shadow:none;
        text-align: left;
    }

    /*.fixedheader {
        position: fixed;
        background: none repeat scroll red;
        width: calc(100% - 40px);
    }*/

</style>

<?php $this->breadcrumbs = array(
    'Laboratory' => array('labocheck'),
    'Lab Analized Sheet',
);
?>
<div class="row">
    <div class="row">
        <div class="col-sm-12">
            <div class="widget-box">
                <div class="widget-header widget-header-flat widget-header-small">
                    <i class="ace-icon fa fa-stethoscope"></i>
                    <h4 class="widget-title">Patient Name : <?php echo ucwords($patient_name); ?></h4>
                </div>
                <div class="profile-user-info profile-user-info-striped">
                    <ul class="list-unstyled spaced">
                        <?php foreach ($treatment_selected_items as $id => $item): ?>
                            <li>
                                <h2> <i class="ace-icon fa fa-check icon-animated-bell bigger-110 orange"></i><?php echo $item['treatment']; ?></h2>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'action'=>Yii::app()->createUrl('appointment/CompletedLab/visit_id/'.$visit_id),
        'id'=>'bloodtest-form',
        //
        'enableAjaxValidation'=>false,
        'layout'=>TbHtml::FORM_LAYOUT_INLINE,
        'htmlOptions'=> array('enctype'=>'multipart/form-data','class' =>'form-transp-input',)
    )); ?>
    <fieldset class="row">
        <!--<legend>LAB ANALIZED SHEET</legend>-->
    <?php
        $result=array();
        foreach ($lab_selected  as $key=>$value)
            $result[$value['blood_id']]=$value;
    ?>
    <!--<div class="form-group">-->
        <div class="row">
        <div class="col-sm-4" id="lab-analyzed">
            <label class="control-label" for="hematology"><strong><u>Hematology</u></strong></label>
            <div>
            <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=1') as $key=>$hematology){ ?>
                <?php
                    $input_disabled='';
                    $hematology_id=null;
                    $my_style='';
                    if(!array_key_exists ($hematology->id,$result))
                    {
                        $input_disabled ='disabled';

                    }else{
                        $hematology_id = $result[$hematology->id]['id'];
                        $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                    }
                ?>
                <p/>
                <!--<label><?php //echo $hematology->treatment_item; ?></label>:
                <?php //echo "<input type='text' name='itemtest[$hematology->treatment_item][$hematology_id]' $input_disabled >";?>
                <label><?php //echo $hematology->caption; ?></label>-->
                <div class="input-group col-xs-10">
                    <span class="input-group-addon in-group-transp">
                        <?php //echo TbHtml::label($hematology->treatment_item, 'text'); ?>
                        <label <?php echo $my_style; ?>><?php echo $hematology->treatment_item; ?></label>
                    </span>
                    <?php echo TbHtml::textField("itemtest[$hematology->treatment_item][$hematology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$hematology->treatment_item,$hematology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                    <?php if(isset( $hematology->caption)){ ?>
                        <span class="input-group-addon in-group-transp">
                            <label><?php echo $hematology->caption; ?></label>
                        </span>
                    <?php } ?>
                </div>
            <?php } ?>
            </div>
            <label class="control-label" for="immuno_hematology"><strong><u>Immuno Hematology</u></strong></label>
            <div>
                <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=2') as $key=>$immuno_hematology){ ?>
                    <?php
                    $input_disabled='';
                    $immuno_hematology_id=null;
                    $my_style='';
                    if(!array_key_exists ($immuno_hematology->id,$result))
                    {
                        $input_disabled ='disabled';

                    }else{
                        $immuno_hematology_id = $result[$immuno_hematology->id]['id'];
                        $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                    }
                    ?>
                    <p>
                    <?php if($immuno_hematology->id==4){ ?>
                        <div class="input-group col-xs-6">
                            <span class="input-group-addon in-group-transp">
                            <?php //echo TbHtml::label($immuno_hematology->treatment_item, 'text'); ?>
                                <label <?php echo $my_style; ?>><?php echo $immuno_hematology->treatment_item; ?>:</label>
                            </span>
                                 <?php echo TbHtml::textField("itemtest[$immuno_hematology->treatment_item][$immuno_hematology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$immuno_hematology->treatment_item,$immuno_hematology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                            <span class="input-group-addon in-group-transp">
                                <?php echo TbHtml::label('Rh', 'text'); ?>
                            </span>
                        </div>
                        <div class="input-group col-xs-4">
                            <?php echo TbHtml::textField("itemtest[$immuno_hematology->treatment_item".' Rh'."][$immuno_hematology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$immuno_hematology->treatment_item.' Rh',$immuno_hematology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                            <span class="input-group-addon in-group-transp">
                                <?php echo TbHtml::label($immuno_hematology->caption, 'text'); ?>
                            </span>
                        </div>
                    <?php }else{ ?>
                        <div class="input-group col-xs-10">
                        <span class="input-group-addon in-group-transp">
                            <?php //echo TbHtml::label($immuno_hematology->treatment_item, 'text'); ?>
                            <label <?php echo $my_style; ?>><?php echo $immuno_hematology->treatment_item; ?>:</label>
                        </span>
                                <?php echo TbHtml::textField("itemtest[$immuno_hematology->treatment_item][$immuno_hematology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$immuno_hematology->treatment_item,$immuno_hematology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                <?php if(isset( $immuno_hematology->caption)){ ?>
                                    <span class="input-group-addon in-group-transp">
                                        <?php echo TbHtml::label($immuno_hematology->caption, 'text'); ?>
                                    </span>
                                <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <label class="control-label" for="immunology"><strong><u>Immuno</u></strong></label>
            <div>
                <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=3') as $key=>$immunology){ ?>
                <?php
                $input_disabled='';
                $immunology_id=null;
                $my_style='';
                if(!array_key_exists ($immunology->id,$result))
                {
                    $input_disabled ='disabled';

                }else{
                    $immunology_id = $result[$immunology->id]['id'];
                    $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                }
                ?>
                <p>
                <div class="input-group col-xs-10">
                    <span class="input-group-addon in-group-transp">
                        <?php //echo TbHtml::label($immunology->treatment_item, 'text'); ?>
                        <label <?php echo $my_style; ?>><?php echo $immunology->treatment_item; ?>:</label>
                    </span>
                    <?php echo TbHtml::textField("itemtest[$immunology->treatment_item][$immunology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$immunology->treatment_item,$immunology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                    <?php if(isset( $immunology->caption)){ ?>
                        <span class="input-group-addon in-group-transp">
                            <?php echo TbHtml::label($immunology->caption, 'text'); ?>
                        </span>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <label class="control-label" for="hormones"><strong><u>Hormones</u></strong></label>
            <div>
                <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=4') as $key=>$hormones){ ?>
                <?php
                    $input_disabled='';
                    $hormones_id=null;
                    $my_style='';
                    if(!array_key_exists ($hormones->id,$result))
                    {
                        $input_disabled ='disabled';

                    }else{
                        $hormones_id = $result[$hormones->id]['id'];
                        $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                    }
                ?>
                    <p>
                    <div class="input-group col-xs-10">
                        <span class="input-group-addon in-group-transp">
                            <?php //echo TbHtml::label($hormones->treatment_item, 'text'); ?>
                            <label <?php echo $my_style; ?>><?php echo $hormones->treatment_item; ?>:</label>
                        </span>
                        <?php echo TbHtml::textField("itemtest[$hormones->treatment_item][$hormones_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$hormones->treatment_item,$hormones_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                    <?php if(isset( $hormones->caption)){ ?>
                        <span class="input-group-addon in-group-transp">
                            <?php echo TbHtml::label($hormones->caption, 'text'); ?>
                        </span>
                    <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <label class="control-label" for="coagulation"><strong><u>Coagulation</u></strong></label>
            <div>
                <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=5') as $key=>$coagulation){ ?>
                <?php
                $input_disabled='';
                $coagulation_id=null;
                $my_style='';
                if(!array_key_exists ($coagulation->id,$result))
                {
                    $input_disabled ='disabled';

                }else{
                    $coagulation_id = $result[$coagulation->id]['id'];
                    $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                }
                ?>
                <p>
                    <?php if($coagulation->id==16 || $coagulation->id==17){ ?>
                    <div class="input-group col-xs-6">
                        <span class="input-group-addon in-group-transp">
                        <?php //echo TbHtml::label($coagulation->treatment_item, 'text'); ?>
                            <label <?php echo $my_style; ?>><?php echo $coagulation->treatment_item; ?>:</label>
                        </span>
                        <?php echo TbHtml::textField("itemtest[$coagulation->treatment_item".' mm'."][$coagulation_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$coagulation->treatment_item.' mm',$coagulation_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                        <span class="input-group-addon in-group-transp">
                            <?php echo TbHtml::label('mm', 'text'); ?>
                        </span>
                    </div>
                    <div class="input-group col-xs-4">
                        <span class="input-group-addon in-group-transp">
                        <label></label>
                        </span>
                                <?php echo TbHtml::textField("itemtest[$coagulation->treatment_item".' sec'."][$coagulation_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$coagulation->treatment_item.' sec',$coagulation_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                        <span class="input-group-addon in-group-transp">
                        <?php echo TbHtml::label($coagulation->caption, 'text'); ?>
                    </span>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-4">
            <label class="control-label" for="serology"><strong><u>Serology</u></strong></label>
            <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=6') as $key=>$serology){ ?>
            <?php
                $input_disabled='';
                $serology_id=null;
                $my_style='';
                if(!array_key_exists ($serology->id,$result))
                {
                    $input_disabled ='disabled';

                }else{
                    $serology_id = $result[$serology->id]['id'];
                    $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                }
            ?>
            <p>
                <?php if($serology->id==19 || $serology->id==29){ ?>
                    <span class="input-group-addon in-group-transp">
                        <?php //echo TbHtml::label($serology->treatment_item, 'text'); ?>
                        <label <?php echo $my_style; ?>><?php echo $serology->treatment_item; ?>:</label>
                    </span>
                    <div>
                        <div class="input-group col-xs-3"></div>
                        <div class="input-group col-xs-7">
                        <?php if($serology->id==19){ ?>
                        <span class="input-group-addon in-group-transp">
                            <?php //echo TbHtml::label('IgG', 'text'); ?>
                            <label <?php echo $my_style; ?>>IgG:</label>
                        </span>
                            <?php echo TbHtml::textField("itemtest[$serology->treatment_item".' IgG'."][$serology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$serology->treatment_item.' IgG',$serology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                        <?php } ?>
                        <?php if($serology->id==29){ ?>
                        <span class="input-group-addon in-group-transp">
                            <?php //echo TbHtml::label('To', 'text'); ?>
                            <label <?php echo $my_style; ?>>To:</label>
                        </span>
                            <?php echo TbHtml::textField("itemtest[$serology->treatment_item".' To'."][$serology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$serology->treatment_item.' To',$serology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                        <?php } ?>
                        <?php if(isset($serology->caption)){ ?>
                            <span class="input-group-addon in-group-transp">
                                <?php echo TbHtml::label($serology->caption, 'text'); ?>
                            </span>
                        <?php } ?>
                        </div>
                    </div>
                    <div>
                        <div class="input-group col-xs-3"></div>
                        <div class="input-group col-xs-7">
                            <?php if($serology->id==19){ ?>
                                <span class="input-group-addon in-group-transp">
                                    <?php //echo TbHtml::label('IgM', 'text'); ?>
                                    <label <?php echo $my_style; ?>>IgM:</label>
                                </span>
                                <?php echo TbHtml::textField("itemtest[$serology->treatment_item".' IgM'."][$serology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$serology->treatment_item.' IgM',$serology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                <?php } ?>
                                <?php if($serology->id==29){ ?>
                                <span class="input-group-addon in-group-transp">
                                    <?php //echo TbHtml::label('TH', 'text'); ?>
                                    <label <?php echo $my_style; ?>>TH:</label>
                                </span>
                                <?php echo TbHtml::textField("itemtest[$serology->treatment_item".' TH'."][$serology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$serology->treatment_item.' TH',$serology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                <?php } ?>
                                <?php if(isset($serology->caption)){ ?>
                                    <span class="input-group-addon in-group-transp">
                                <?php echo TbHtml::label($serology->caption, 'text'); ?>
                            </span>
                                <?php } ?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="input-group col-xs-10">
                        <span class="input-group-addon in-group-transp">
                            <?php //echo TbHtml::label($serology->treatment_item, 'text'); ?>
                            <label <?php echo $my_style; ?>><?php echo $serology->treatment_item; ?>:</label>
                        </span>
                        <?php echo TbHtml::textField("itemtest[$serology->treatment_item][$serology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$serology->treatment_item,$serology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                        <?php if(isset( $serology->caption)){ ?>
                            <span class="input-group-addon in-group-transp">
                            <?php echo TbHtml::label($serology->caption, 'text'); ?>
                        </span>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
            <label class="control-label" for="micro_biology"><strong><u>Micro Biology</u></strong></label>
            <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=7') as $key=>$micro_biology){ ?>
            <?php
                $input_disabled='';
                $micro_biology_id=null;
                $my_style='';
                if(!array_key_exists ($micro_biology->id,$result))
                {
                    $input_disabled ='disabled';

                }else{
                    $micro_biology_id = $result[$micro_biology->id]['id'];
                    $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                }
            ?>
            <p>
            <span class="input-group-addon in-group-transp">
                <?php //echo TbHtml::label($micro_biology->treatment_item, 'text'); ?>
                <label <?php echo $my_style; ?>><?php echo $micro_biology->treatment_item; ?>:</label>
            </span>
            <?php } ?>
        </div>
        <div class="col-sm-4">
            <label class="control-label" for="blood_biochemistry"><strong><u>Blood Biochemistry</u></strong></label>
            <div>
            <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=8') as $key=>$bbiochemistry){ ?>
            <?php
                $input_disabled='';
                $bbiochemistry_id=null;
                $my_style='';
                if(!array_key_exists ($bbiochemistry->id,$result))
                {
                    $input_disabled ='disabled';

                }else{
                    $bbiochemistry_id = $result[$bbiochemistry->id]['id'];
                    $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                }
            ?>
            <p>
                <?php if($bbiochemistry->id==44){ ?>
                    <span class="input-group-addon in-group-transp">
                        <?php //echo TbHtml::label($bbiochemistry->treatment_item, 'text'); ?>
                        <label <?php echo $my_style; ?>><?php echo $bbiochemistry->treatment_item; ?>:</label>
                    </span>
                    <div>
                        <div class="input-group col-xs-3"></div>
                        <div class="input-group col-xs-7">
                            <?php if($bbiochemistry->id==44){ ?>
                                <span class="input-group-addon in-group-transp">
                                    <?php //echo TbHtml::label('SGOT (ASAT)', 'text'); ?>
                                    <label <?php echo $my_style; ?>>SGOT (ASAT):</label>
                                </span>
                                <?php echo TbHtml::textField("itemtest[$bbiochemistry->treatment_item".' SGOT (ASAT)'."][$bbiochemistry_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$bbiochemistry->treatment_item.' SGOT (ASAT)',$bbiochemistry_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                            <?php } ?>
                            <?php if(isset($bbiochemistry->caption)){ ?>
                                <span class="input-group-addon in-group-transp">
                                <?php echo TbHtml::label($bbiochemistry->caption, 'text'); ?>
                            </span>
                            <?php } ?>
                        </div>
                    </div>
                    <div>
                        <div class="input-group col-xs-3"></div>
                        <div class="input-group col-xs-7">
                            <?php if($bbiochemistry->id==44){ ?>
                                <span class="input-group-addon in-group-transp">
                                    <?php //echo TbHtml::label('SGPT(ALAT)', 'text'); ?>
                                    <label <?php echo $my_style; ?>>SGPT(ALAT):</label>
                                </span>
                                <?php echo TbHtml::textField("itemtest[$bbiochemistry->treatment_item".' SGPT(ALAT)'."][$bbiochemistry_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$bbiochemistry->treatment_item.' SGPT(ALAT)',$bbiochemistry_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                            <?php } ?>
                            <?php if(isset($bbiochemistry->caption)){ ?>
                                <span class="input-group-addon in-group-transp">
                                <?php echo TbHtml::label($bbiochemistry->caption, 'text'); ?>
                            </span>
                            <?php } ?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="input-group col-xs-10">
                        <span class="input-group-addon in-group-transp">
                            <?php //echo TbHtml::label($bbiochemistry->treatment_item, 'text'); ?>
                            <label <?php echo $my_style; ?>><?php echo $bbiochemistry->treatment_item; ?>:</label>
                        </span>
                        <?php echo TbHtml::textField("itemtest[$bbiochemistry->treatment_item][$bbiochemistry_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$bbiochemistry->treatment_item,$bbiochemistry_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                        <?php if(isset( $bbiochemistry->caption)){ ?>
                            <span class="input-group-addon in-group-transp">
                            <?php echo TbHtml::label($bbiochemistry->caption, 'text'); ?>
                        </span>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
            </div>
            <label class="control-label" for="urology"><strong><u>Urology</u></strong></label>
            <div>
                <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=9') as $key=>$urology){ ?>
                    <?php
                    $input_disabled='';
                    $urology_id=null;
                    $my_style='';

                    if(!array_key_exists ($urology->id,$result))
                    {
                        $input_disabled ='disabled';

                    }else{
                        $urology_id = $result[$urology->id]['id'];
                        $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                    }
                    ?>
                    <p/>
                    <!--<label><?php //echo $hematology->treatment_item; ?></label>:
                <?php //echo "<input type='text' name='itemtest[$hematology->treatment_item][$hematology_id]' $input_disabled >";?>
                <label><?php //echo $hematology->caption; ?></label>-->
                    <div class="input-group col-xs-10">
                    <span class="input-group-addon in-group-transp">
                        <?php //echo TbHtml::label($urology->treatment_item, 'text'); ?>
                        <label <?php echo $my_style; ?>><?php echo $urology->treatment_item; ?>:</label>
                    </span>
                        <?php echo TbHtml::textField("itemtest[$urology->treatment_item][$urology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$urology->treatment_item,$urology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                        <?php if(isset( $urology->caption)){ ?>
                            <span class="input-group-addon in-group-transp">
                            <label><?php echo $urology->caption; ?></label>
                        </span>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <label class="control-label" for="bacteriology"><strong><u>Bacteriology</u></strong></label>
            <div>
                <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=10') as $key=>$bacteriology){ ?>
                    <?php
                    $input_disabled='';
                    $bacteriology_id=null;
                    $my_style='';

                    if(!array_key_exists ($urology->id,$result))
                    {
                        $input_disabled ='disabled';

                    }else{
                        $bacteriology_id = $result[$urology->id]['id'];
                        $my_style='style="font-weight: bold;color:#bf800c;font-style: italic;"';
                    }
                    ?>
                    <p/>
                    <!--<label><?php //echo $hematology->treatment_item; ?></label>:
                <?php //echo "<input type='text' name='itemtest[$hematology->treatment_item][$hematology_id]' $input_disabled >";?>
                <label><?php //echo $hematology->caption; ?></label>-->
                    <div class="input-group col-xs-10">
                    <span class="input-group-addon in-group-transp">
                        <?php //echo TbHtml::label($bacteriology->treatment_item, 'text'); ?>
                        <label <?php echo $my_style; ?>><?php echo $bacteriology->treatment_item; ?>:</label>
                    </span>
                        <?php echo TbHtml::textField("itemtest[$bacteriology->treatment_item][$bacteriology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$bacteriology->treatment_item,$bacteriology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                        <?php if(isset( $bacteriology->caption)){ ?>
                            <span class="input-group-addon in-group-transp">
                            <label><?php echo $bacteriology->caption; ?></label>
                        </span>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

        </div>
        <div class="col-sm-12">
            <div class="form-actions" id="form-actions">
                <?php echo TbHtml::submitButton(Yii::t('app', 'Save'), array(
                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                    'size' => TbHtml::BUTTON_SIZE_SMALL,
                    'id' => 'save-labo-form',
                    'name' => 'Save_labo',
                    //'disabled'=>$disabled
                    //'size'=>TbHtml::BUTTON_SIZE_SMALL,
                )); ?>
            </div>
        </div>
    </div>
    </fieldset>
    <?php $this->endWidget(); ?>
</div>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $('#save-labo-form').on('click',function(e) {
            var isValid = true;
            $('input[type="text"]').each(function() {
                var dis=$(this).attr('disabled');
                if (dis!='disabled')
                {
                    if ($.trim($(this).val()) == '') {
                        isValid = false;
                        $(this).css({
                            "border": "1px solid red",
                            "background": "#FFCECE"
                        });

                        //Validate input field
                        //http://bit.ly/1FIzQaX
                    }
                    else {
                        $(this).css({
                            "border": "",
                            "background": ""
                        });
                    }
                }
            });
            if (isValid == false)
            {
                e.preventDefault();
            }
        });
    });
</script>

<div class="waiting"><!-- Place at bottom of page --></div>