<style>
    #sale_return_policy {
        width: 80%;
        margin: 0 auto;
        text-align: center;
    }

    /*Receipt styles start*/
    #receipt_wrapper {
        font-family: Arial;
        width: 98% !important;
        font-size: 13px !important;
        margin: 0 auto !important;
        padding: 0 !important;
    }

    #receipt_items td {
        position: relative;
        padding: 3px;
    }

    @media print {
        .col-sm-1 {width:8%;  float:left;}
        .col-sm-2 {width:16%; float:left;}
        .col-sm-3 {width:25%; float:left;}
        .col-sm-4 {width:33%; float:left;}
        .col-sm-5 {width:42%; float:left;}
        .col-sm-6 {width:50%; float:left;}
        .col-sm-7 {width:58%; float:right; position: relative;}
        .col-sm-8 {width:66%; float:left;}
        .col-sm-9 {width:75%; float:left;}
        .col-sm-10{width:83%; float:left;}
        .col-sm-11{width:92%; float:left;}
        .col-sm-12{width:100%; float:left;}

        .col-xs-1 {width:8%;  float:left;}
        .col-xs-2 {width:16%; float:left;}
        .col-xs-3 {width:25%; float:left; display:inline-table;}
        .col-xs-4 {width:33%; float:left; display:inline-table;}
        .col-xs-5 {width:42%; float:left; display:inline-table;}
        .col-xs-6 {width:50%; float:left; display:inline-table;}
        .col-xs-7 {width:58%; float:left; display:inline-table;}
        .col-xs-8 {width:66%; float:left;}
        .col-xs-9 {width:75%; float:left;}
        .col-xs-10{width:83%; float:left;}
        .col-xs-11{width:92%; float:left;}
        .col-xs-12{width:100%; float:left;}

        .col-sm-offset-3 {
            margin-left: 25%;
        }

        .item-test{
            font-family: Arial;
            width: 300mm;
            hight: 350mm;
            alignment: center;
        }

        .form-transp-input input {
            border-bottom: 2px dashed #83A4C5 !important;
        }

        #footer {
            position: fixed;
            bottom: 0;
            width:100%;
        }
    }    

    .form-transp-input input{
        #font-style: italic;
        padding: 0px 0px 0px 0px;
        background: transparent;
        outline: none;
        border: none;
        border-bottom: 1px dashed #83A4C5;
        overflow: hidden;
        resize:none;
        height:18px;
    }

    fieldset {
        #font-family: sans-serif;
        border: 1px solid #1F497D;
        #font-size: 12px;
        #background: #EEF4F9;
        position: relative;
        border-radius: 2px;
        padding: 10px;
    }

    label{
        font-size: 14px;
    }

    label strong{
        font-size: 16px;
        color: blue !important;
    }

    .in-group-transp{
        background:none;
        border:none;
        box-shadow:none;
        text-align: left;
    }
</style>

<div class="container" id="receipt_wrapper">
    <div class="gift_receipt_element item-test">
        <div class="row">
            <div class="col-xs-3">
                <p>
                    <?php echo TbHtml::image(Yii::app()->baseUrl . '/images/shop_logo.png','Company\'s logo',array('width'=>'150')); ?> <br>
                </p>
            </div>
            <div class="col-xs-6 text-middle">
                <p align="middle">
                    <!--<strong style="font-size:x-large;color:blue;"><?php //echo TbHtml::encode($clinic_name);?></strong><br>
                <strong style="font-size:large;color:blue;"><?php //echo "KE SINOUN HOSPITAL"; ?></strong><br>
                <strong style="font-size:medium;color:blue;"><?php //echo TbHtml::encode($clinic_address); ?></strong><br>
                <strong style="font-size:medium;color:blue;"><?php //echo TbHtml::encode($clinic_mobile); ?></strong><br>-->
                    <?php echo TbHtml::image(Yii::app()->baseUrl . '/images/shop_name.png','Company\'s logo',array('width'=>'360')); ?> <br>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <p>
                    <?php echo TbHtml::encode(Yii::t('app','Patient name') . " : "  .$client->fullname); ?> <br>
                    <?php echo TbHtml::encode(Yii::t('app','Sex').': '.$client->sex.' '.Yii::t('app','Age').': '.$client->age.' '); ?> <br>
                    <?php echo TbHtml::encode(Yii::t('app','Diagnosis') . " : "  .$visit_info->sympton); ?> <br>
                    <?php echo TbHtml::encode(Yii::t('app','Address') . " : "  .$client->address_line_1); ?> <br>
                    <?php echo TbHtml::encode( Yii::t('app','Event Date') . " : "  . $visit_date); ?><br>
                </p>
            </div>
        </div>

        <div class="col-xs-7 col-xs-offset-1 text-right">
            <!-- <div class="panel panel-default"> -->
            <p>
                <?php //if (Yii::app()->settings->get('receipt', 'printcompanyName')=='1') { ?>
                <strong>
                    <?php //echo TbHtml::encode($clinic_name); ?>
                </strong>  <br>
                <?php //} ?>
                <?php //echo TbHtml::encode($clinic_mobile); ?>
                <?php //if (Yii::app()->settings->get('receipt', 'printcompanyPhone')=='1') { ?>
                <?php //echo TbHtml::encode(Yii::app()->settings->get('site', 'companyPhone')); ?><br>
                <?php //} ?>
                <?php //echo TbHtml::encode($clinic_address); ?>
                <?php //if (Yii::app()->settings->get('receipt', 'printcompanyAddress')=='1') { ?>
                <?php //echo TbHtml::encode(Yii::app()->settings->get('site', 'companyAddress')); ?><br>
                <?php //} ?>
                <?php //if (Yii::app()->settings->get('receipt', 'printcompanyAddress1')=='1') { ?>
                <?php //echo TbHtml::encode(Yii::app()->settings->get('site', 'companyAddress1')); ?><br>
                <?php //} ?>
                <?php if (Yii::app()->settings->get('receipt', 'printtransactionTime')=='1') { ?>
                    <?php echo TbHtml::encode($transaction_time); ?><br>
                <?php } ?>
            </p>
            <!-- </div> -->
        </div>
    </div>
    <!--<div class="gift_receipt_element item-test">
        <table id="receipt_items" style="width:100%">
            <tr>
                <td align="center"><h3><strong>LABORATORY RESULT</strong></h3></td>
            </tr>
            <tr>
                <td style='text-align:right;border-top:1px solid #000000;'></td>
            </tr>
        </table>
    </div>-->
    <div class="item-test">
        <div class="col-xs-12" align="middle">
            <div style="font-size:large;"><strong>ប័ណ្ណវិភាគវេជ្ជសាស្រ្ត</strong></div>
            <div style="font-size:large;">LAB ANALIZED SHEET</div>
        </div>
    </div>
    <div class="item-test gift_receipt_element">
        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id'=>'receipt_items',
            'enableAjaxValidation'=>false,
            'layout'=>TbHtml::FORM_LAYOUT_INLINE,
            'htmlOptions'=> array('class' =>'form-transp-input',)
        )); ?>
        <fieldset class="item-test">
            <?php
            $result=array();
            foreach ($lab_selected  as $key=>$value)
                $result[$value['blood_id']]=$value;
            ?>
            <!--<div class="form-group">-->
            <div class="row">
                <div class="col-sm-4" id="lab-analyzed">
                    <label class="control-label" for="hematology"><strong><u>Hematology</u></strong></label>
                    <div class="row">
                        <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=1') as $key=>$hematology){ ?>
                            <?php
                                $input_disabled='';
                                $hematology_id=null;
                                if(!array_key_exists ($hematology->id,$result))
                                {
                                    $input_disabled ='disabled';

                                }else{
                                    $hematology_id = $result[$hematology->id]['id'];
                                }
                            ?>
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon in-group-transp">
                                <?php echo TbHtml::label($hematology->treatment_item, 'text'); ?>:
                            </span>
                            <?php echo TbHtml::textField("itemtest[$hematology->treatment_item][$hematology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$hematology->treatment_item,$hematology_id), array('readonly'=>'readonly','class'=>"form-control",)); ?>
                            <?php if(isset( $hematology->caption)){ ?>
                                <span class="input-group-addon in-group-transp">
                                    <label><?php echo $hematology->caption; ?></label>
                                </span>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <label class="control-label" for="immuno_hematology"><strong><u>Immuno Hematology</u></strong></label>
                    <div class="row">
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
                            <?php if($immuno_hematology->id==4){ ?>
                                <div class="input-group col-xs-5">
                                    <span class="input-group-addon in-group-transp">
                                        <?php echo TbHtml::label($immuno_hematology->treatment_item, 'text'); ?>:
                                    </span>
                                    <?php echo TbHtml::textField("itemtest[$immuno_hematology->treatment_item][$immuno_hematology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$immuno_hematology->treatment_item,$immuno_hematology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                    <span class="input-group-addon in-group-transp">
                                        <?php echo TbHtml::label('Rh', 'text'); ?>
                                    </span>
                                </div>
                                <div class="input-group col-xs-5">
                                    <?php echo TbHtml::textField("itemtest[$immuno_hematology->treatment_item".' Rh'."][$immuno_hematology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$immuno_hematology->treatment_item.' Rh',$immuno_hematology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                    <span class="input-group-addon in-group-transp">
                                        <?php echo TbHtml::label($immuno_hematology->caption, 'text'); ?>
                                    </span>
                                </div>
                            <?php }else{ ?>
                                <div class="input-group col-sm-10">
                                    <span class="input-group-addon in-group-transp">
                                        <?php echo TbHtml::label($immuno_hematology->treatment_item, 'text'); ?>:
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
                    <div class="row">
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
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon in-group-transp">
                                    <?php echo TbHtml::label($immunology->treatment_item, 'text'); ?>:
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
                    <div class="row">
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
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon in-group-transp">
                                    <?php echo TbHtml::label($hormones->treatment_item, 'text'); ?>:
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
                    <div class="row">
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
                            <?php if($coagulation->id==16 || $coagulation->id==17){ ?>
                                <div class="input-group col-xs-7">
                                    <span class="input-group-addon in-group-transp">
                                        <?php echo TbHtml::label($coagulation->treatment_item, 'text'); ?>:
                                    </span>
                                    <?php echo TbHtml::textField("itemtest[$coagulation->treatment_item".' mm'."][$coagulation_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$coagulation->treatment_item.' mm',$coagulation_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                    <span class="input-group-addon in-group-transp">
                                        <?php echo TbHtml::label('mm', 'text'); ?>
                                    </span>
                                </div>
                                <div class="input-group col-xs-4">
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
                            if(!array_key_exists ($serology->id,$result))
                            {
                                $input_disabled ='disabled';

                            }else{
                                $serology_id = $result[$serology->id]['id'];
                            }
                        ?>
                        <?php if($serology->id==19 || $serology->id==29){ ?>
                            <div class="row">
                                <div class="col-sm-10">
                                <span>
                                    <?php echo TbHtml::label($serology->treatment_item, 'text'); ?>:
                                </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group col-sm-7 col-sm-offset-3">
                                    <?php if($serology->id==19){ ?>
                                        <span class="input-group-addon in-group-transp">
                                            <?php echo TbHtml::label('IgG', 'text'); ?>:
                                        </span>
                                        <?php echo TbHtml::textField("itemtest[$serology->treatment_item".' IgG'."][$serology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$serology->treatment_item.' IgG',$serology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                    <?php } ?>
                                    <?php if($serology->id==29){ ?>
                                        <span class="input-group-addon in-group-transp">
                                            <?php echo TbHtml::label('To', 'text'); ?>:
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
                            <div class="row">
                                <div class="input-group col-sm-7 col-sm-offset-3">
                                    <?php if($serology->id==19){ ?>
                                        <span class="input-group-addon in-group-transp">
                                            <?php echo TbHtml::label('IgM', 'text'); ?>:
                                        </span>
                                        <?php echo TbHtml::textField("itemtest[$serology->treatment_item".' IgM'."][$serology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$serology->treatment_item.' IgM',$serology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                    <?php } ?>
                                    <?php if($serology->id==29){ ?>
                                        <span class="input-group-addon in-group-transp">
                                            <?php echo TbHtml::label('TH', 'text'); ?>:
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
                        <div class="row">
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon in-group-transp">
                                    <?php echo TbHtml::label($serology->treatment_item, 'text'); ?>:
                                </span>
                                <?php echo TbHtml::textField("itemtest[$serology->treatment_item][$serology_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$serology->treatment_item,$serology_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                <?php if(isset( $serology->caption)){ ?>
                                    <span class="input-group-addon in-group-transp">
                                        <?php echo TbHtml::label($serology->caption, 'text'); ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    <?php } ?>
                    <label class="control-label" for="micro_biology"><strong><u>Micro Biology</u></strong></label>
                    <div class="row">
                        <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=7') as $key=>$micro_biology){ ?>
                            <?php
                                $input_disabled='';
                                $micro_biology_id=null;
                                if(!array_key_exists ($micro_biology->id,$result))
                                {
                                    $input_disabled ='disabled';
                                }else{
                                    $micro_biology_id = $result[$micro_biology->id]['id'];
                                }
                            ?>
                            <div class="col-sm-10">
                            <?php echo TbHtml::label($micro_biology->treatment_item, 'text'); ?>:
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="control-label" for="blood_biochemistry"><strong><u>Blood Biochemistry</u></strong></label>
                        <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=8') as $key=>$bbiochemistry){ ?>
                            <?php
                                $input_disabled='';
                                $bbiochemistry_id=null;
                                if(!array_key_exists ($bbiochemistry->id,$result))
                                {
                                    $input_disabled ='disabled';
                                }else{
                                    $bbiochemistry_id = $result[$bbiochemistry->id]['id'];
                                }
                            ?>
                            <?php if($bbiochemistry->id==44){ ?>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <span>
                                            <?php echo TbHtml::label($bbiochemistry->treatment_item, 'text'); ?>:
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group col-sm-7 col-sm-offset-3">
                                        <?php if($bbiochemistry->id==44){ ?>
                                            <span class="input-group-addon in-group-transp">
                                            <?php echo TbHtml::label('SGOT (ASAT)', 'text'); ?>:
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
                                <div class="row">
                                    <div class="input-group col-sm-7 col-sm-offset-3">
                                        <?php if($bbiochemistry->id==44){ ?>
                                            <span class="input-group-addon in-group-transp">
                                            <?php echo TbHtml::label('SGPT(ALAT)', 'text'); ?>:
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
                                <div class="row">
                                    <div class="input-group col-sm-10">
                                        <span class="input-group-addon in-group-transp">
                                            <?php echo TbHtml::label($bbiochemistry->treatment_item, 'text'); ?>:
                                        </span>
                                        <?php echo TbHtml::textField("itemtest[$bbiochemistry->treatment_item][$bbiochemistry_id]", LabAnalyzedResult::model()->getClientResult(@$visit_id,$bbiochemistry->treatment_item,$bbiochemistry_id), array('disabled'=>"$input_disabled",'class'=>"form-control",)); ?>
                                        <?php if(isset( $bbiochemistry->caption)){ ?>
                                            <span class="input-group-addon in-group-transp">
                                                <?php echo TbHtml::label($bbiochemistry->caption, 'text'); ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <label class="control-label" for="urology"><strong><u>Urology</u></strong></label>
                    <div class="row">
                        <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=9') as $key=>$urology){ ?>
                            <?php
                                $input_disabled='';
                                $urology_id=null;

                                if(!array_key_exists ($urology->id,$result))
                                {
                                    $input_disabled ='disabled';
                                }else{
                                    $urology_id = $result[$urology->id]['id'];
                                }
                            ?>
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon in-group-transp">
                                    <?php echo TbHtml::label($urology->treatment_item, 'text'); ?>:
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
                    <div class="row">
                        <?php foreach (TreatmentItemDetail::model()->findAll('t_group_id=10') as $key=>$bacteriology){ ?>
                            <?php
                                $input_disabled='';
                                $bacteriology_id=null;

                                if(!array_key_exists ($urology->id,$result))
                                {
                                    $input_disabled ='disabled';
                                }else{
                                    $$bacteriology_id = $result[$urology->id]['id'];
                                }
                            ?>
                            <div class="input-group col-sm-10">
                                <span class="input-group-addon in-group-transp">
                                    <?php echo TbHtml::label($bacteriology->treatment_item, 'text'); ?>:
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
            </div>
        </fieldset>
        <?php $this->endWidget(); ?>
    </div>
    <p/><p/>
    <div id="footer">
        <div class="row">
            <div class="col-sm-3">
                <table id="receipt_items" style="width:100%">
                    <tr>
                        <td style='text-align:right;border-top:1px solid #000000;'></td>
                    </tr>
                    <tr><td><?php echo TbHtml::encode(Yii::t('app','Doctor')); ?>: វជ្ជ. <?php echo $doctor->doctor_name; ?></td></tr>
                    <tr><td>Date:<?php echo date('d-M-Y') ?></td></tr>
                </table>
            </div>
            <div class="col-sm-3"></div>
            <!--<div class="col-sm-3">Account Process </div>-->
            <div class="col-sm-3"></div>
            <div class="col-sm-3 align-right">
                <table id="receipt_items" style="width:100%">
                    <tr>
                        <td style='text-align:right;border-top:1px solid #000000;'></td>
                    </tr>
                    <tr style='text-align:left'><td><?php echo TbHtml::encode(Yii::t('app','Technical')); ?>: <?php echo $lab_tech->doctor_name; ?></td></tr>
                    <tr style='text-align:left'><td>Date:<?php echo date('d-M-Y') ?></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $url = Yii::app()->createUrl('Appointment/labocheck/'); ?>
<script>
    $(window).bind("load", function() {
        setTimeout(window.location.href='<?php echo $url; ?>',5000);
        window.print();
        return true;
    });
</script>