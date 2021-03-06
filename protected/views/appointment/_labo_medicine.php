<?php //print_r($medicine_selected_items); die(); ?>
<table class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="display:none">ID</th>
            <th>Medicine Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="medicine_contents">
        <?php //print_r($medicine_selected_items); die(); ?>
        <?php foreach ($medicine_selected_items as $id => $item): ?>
        <?php $item_id=$item['id']; ?>
        <tr>
            <!--<td style="display:none"> 
                <?php //echo $item['id']; ?><br/>                        
            </td>-->
            <td style="display:none">
                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                        'method'=>'post',
                        'action' => Yii::app()->createUrl('appointment/EditMedicine?medicine_id='.$item_id),
                        'htmlOptions'=>array('class'=>'line_item_form'),
                    ));
                ?>
                <!--<input value="<?php //echo $item['id']; ?>" class="input-small numeric input-grid form-control" id="id_<?php //echo $item_id; ?>" name="item[id]" type="text" />-->
                <?php echo $form->textField($medicine, "id", array('disabled'=>'disabled','value' => $item['id'], 'class' => 'input-small input-grid', 'id' => "id_$item_id", 'placeholder' => 'Price', 'maxlength' => 10)); ?>
                <?php $this->endWidget(); ?>    
            </td>    
            <td> 
                <?php echo $item['medicine_name']; ?><br/>                        
            </td>
            <td>
                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                        'method'=>'post',
                        'action' => Yii::app()->createUrl('appointment/EditMedicine?medicine_id='.$item_id),
                        'htmlOptions'=>array('class'=>'line_item_form'),
                    ));
                ?>
                <?php echo $form->textField($medicine, "unit_price", array('disabled'=>'disabled','value' => $item['unit_price'], 'class' => 'input-small numeric input-grid', 'id' => "price_$item_id", 'placeholder' => 'Price', 'data-id' => "$item_id", 'maxlength' => 50, )); ?>
                <!--<input value="<?php //echo $item['price']; ?>" class="input-small numeric input-grid form-control" id="price_<?php //echo $item_id; ?>" placeholder="Price" data-id="2" maxlength="50" onkeypress="return isNumberKey(event)" name="item[price]" type="text" />-->
                <?php $this->endWidget(); ?>  
            </td>
            <td>
                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                        'method'=>'post',
                        'action' => Yii::app()->createUrl('appointment/EditMedicine?medicine_id='.$item_id),
                        'htmlOptions'=>array('class'=>'line_item_form'),
                    ));
                ?>
                <?php echo $form->textField($medicine, "quantity", array('disabled'=>'disabled','value' => $item['quantity'], 'class' => 'input-small numeric input-grid', 'id' => "quantity_$item_id", 'placeholder' => 'Price', 'data-id' => "$item_id", 'maxlength' => 50, )); ?>
                <!--<input value="<?php //echo $item['quantity']; ?>" class="input-small numeric input-grid form-control" id="price_<?php //echo $item_id; ?>" placeholder="Price" data-id="2" maxlength="50" onkeypress="return isNumberKey(event)" name="item[quatity]" type="text" />--->
                <?php $this->endWidget(); ?>
            </td>
            <td> 
                <?php echo $item['unit_price']*$item['quantity']; ?><br/>                        
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
    if (empty($medicine_selected_items)) {
        echo Yii::t('app', 'There are no medicine select');
    }
?> 
<script>
    var submitting = false;
    var url = $(this).attr('href');
    $(document).ready(function()
    {
        $('.waiting').hide();
        
        $('.line_item_form').ajaxForm({target: "#select_medicine_form", beforeSubmit: salesBeforeSubmit});
        
        $('#medicine_contents').on('change','input.input-grid',function(e) {
            e.preventDefault();
            $(this.form).ajaxSubmit({url: url,target: "#select_medicine_form", beforeSubmit: salesBeforeSubmit });
        });
    });
    
    /*$(document).ready(function()
    {
        $('.line_item_form').ajaxForm({target: "#register_container", beforeSubmit: salesBeforeSubmit});
        
        $('#medicine_contents').on('change','input.input-grid',function(e) {
            e.preventDefault();
            $(this.form).ajaxSubmit({target: "#register_container", beforeSubmit: salesBeforeSubmit });
        });
    });*/
    
    function salesBeforeSubmit(formData, jqForm, options)
    {
        if (submitting)
        {
            return false;
        }
        submitting = true;
        $('.waiting').show();
    }
    /*$(document).ready(function()
    {
        $('#medicine_contents').on('change','input.input-grid',function(e) {
            e.preventDefault();
            $(this.form).ajaxSubmit({target: "#register_container", beforeSubmit: salesBeforeSubmit });
        });
    });*/
    
</script>