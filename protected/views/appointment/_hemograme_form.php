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
        border: 2px solid #1F497D;
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

    /*#basic-addon1{
        background:none;
        border:none;
        box-shadow:none;
    }*/

</style>

<div class="form">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'action'=>Yii::app()->createUrl('appointment/CompletedLab/visit_id/'.$visit_id),
        'id'=>'bloodtest-form',
        //
        'enableAjaxValidation'=>false,
        'layout'=>TbHtml::FORM_LAYOUT_INLINE,
        'htmlOptions'=> array('enctype'=>'multipart/form-data','class' =>'form-transp-input',)
    )); ?>
    <fieldset>
        <legend>Lab Analyst</legend>
    <?php
        $result=array();
        foreach ($lab_selected  as $key=>$value)
            $result[$value['blood_id']]=$value;
    ?>
    <!--<div class="form-group">-->
        <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="hematology"><strong><u>Hematology</u></strong></label>
            <div>
            <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=1') as $key=>$hematology){ ?>
                <?php
                    $input_disabled='';

                    if(!array_key_exists ($hematology->id,$result))
                    {
                        $input_disabled ='disabled';

                    }else{
                        $hematology_id = $result[$hematology->id]['id'];
                    }
                ?>
                <p/>
                <!--<label><?php //echo $hematology->treatment_item; ?></label>:
                <?php //echo "<input type='text' name='itemtest[$hematology->treatment_item][$hematology_id]' $input_disabled >";?>
                <label><?php //echo $hematology->caption; ?></label>-->
                <div class="input-group col-xs-10">
                    <span class="input-group-addon in-group-transp">
                        <?php echo TbHtml::label($hematology->treatment_item, 'text'); ?>:
                    </span>
                    <?php echo TbHtml::textField('text', '', array('name'=>"itemtest[$hematology->treatment_item][$hematology_id]",'disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
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
                    if(!array_key_exists ($immuno_hematology->id,$result))
                    {
                        $input_disabled ='disabled';

                    }else{
                        $immuno_hematology_id = $result[$immuno_hematology->id]['id'];
                    }
                    ?>
                    <p>
                    <div class="input-group col-xs-10">
                    <span class="input-group-addon in-group-transp">
                        <?php echo TbHtml::label($immuno_hematology->treatment_item, 'text'); ?>:
                    </span>
                        <?php echo TbHtml::textField('text', '', array('name'=>"itemtest[$immuno_hematology->treatment_item][$immuno_hematology_id]",'disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                        <?php if($immuno_hematology->id==4){ ?>
                        <?php echo TbHtml::label('Rh', 'text'); ?>:
                        <?php echo "<input type='text' name='itemtest[$immuno_hematology->treatment_item".' Rh'."][$immuno_hematology_id]' $input_disabled>";}  ?>
                    <?php if(isset( $immuno_hematology->caption)){ ?>
                        <span class="input-group-addon in-group-transp">
                            <?php echo TbHtml::label($immuno_hematology->caption, 'text'); ?>
                        </span>
                    <?php } ?>
                    </div>
                    <?php } ?>
            </div>
            <label class="control-label" for="immunology"><strong><u>Immuno</u></strong></label>
            <div>
                <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=3') as $key=>$immunology){ ?>
                <?php
                $input_disabled='';
                $immunology_id=null;
                if(!array_key_exists ($immunology->id,$result))
                {
                    $input_disabled ='disabled';

                }else{
                    $immunology_id = $result[$immunology->id]['id'];
                }
                ?>
                <p>
                <div class="input-group col-xs-10">
                    <span class="input-group-addon in-group-transp">
                        <?php echo TbHtml::label($immunology->treatment_item, 'text'); ?>:
                    </span>
                    <?php echo TbHtml::textField('text', '', array('name'=>"itemtest[$immunology->treatment_item][$immunology_id]",'disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
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
                if(!array_key_exists ($hormones->id,$result))
                {
                    $input_disabled ='disabled';

                }else{
                    $hormones_id = $result[$hormones->id]['id'];
                }
                ?>
                <p>
                <div class="input-group col-xs-10">
                    <span class="input-group-addon in-group-transp">
                        <?php echo TbHtml::label($hormones->treatment_item, 'text'); ?>:
                    </span>
                    <?php echo TbHtml::textField('text', '', array('name'=>"itemtest[$hormones->treatment_item][$hormones_id]",'disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
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
                if(!array_key_exists ($coagulation->id,$result))
                {
                    $input_disabled ='disabled';

                }else{
                    $coagulation_id = $result[$coagulation->id]['id'];
                }
                ?>
                <p>
                <div class="input-group col-xs-10">
                    <span class="input-group-addon in-group-transp">
                        <?php echo TbHtml::label($coagulation->treatment_item, 'text'); ?>:
                    </span>
                    <?php //echo "<input type='text' name='itemtest[$coagulation->treatment_item".' mm'."][$coagulation_id]' $input_disabled>";?>

                    <?php echo TbHtml::textField('text', '', array('name'=>"itemtest[$coagulation->treatment_item".' mm'."][$coagulation_id]",'disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                    <?php echo TbHtml::label('mm', 'text'); ?>
                    <?php if($coagulation->id==16 || $coagulation->id==17){ ?>
                        <?php echo "<input type='text' name='itemtest[$coagulation->treatment_item".' sec'."][$coagulation_id]' $input_disabled>";}  ?>
                    <?php if(isset( $coagulation->caption)){ ?>
                        <span class="input-group-addon in-group-transp">
                        <?php echo TbHtml::label($coagulation->caption, 'text'); ?>
                        </span>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-4">
            <label class="control-label" for="serology"><strong><u>Serology</u></strong></label>
            <p>
            <label class="control-label" for="micro_biology"><strong><u>Micro Biology</u></strong></label>
            <p>
        </div>
        <div class="col-sm-4">
            <label class="control-label" for="blood_biochemistry"><strong><u>Blood Biochemistry</u></strong></label>
            <p>
            <label class="control-label" for="urology"><strong><u>Urology</u></strong></label>
            <p>
            <label class="control-label" for="bacteriology"><strong><u>Bacteriology</u></strong></label>
            <p>
        </div>
        <div class="col-sm-12">
            <div class="form-actions" id="form-actions">
                <?php echo TbHtml::submitButton(Yii::t('app', 'Save'), array(
                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                    'size' => TbHtml::BUTTON_SIZE_SMALL,
                    'id' => 'save-bloodtest-form',
                    'name' => 'Save_bloodtest',
                    //'disabled'=>$disabled
                    //'size'=>TbHtml::BUTTON_SIZE_SMALL,
                )); ?>
            </div>
        </div>
    </div>
    </fieldset>
    <?php $this->endWidget(); ?>
</div>