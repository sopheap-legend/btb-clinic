<?php

if (!defined('YII_PATH'))
    exit('No direct script access allowed');

class TreatmentCart extends CApplicationComponent
{
    private $session;

    //private $decimal_place;

    public function getSession()
    {
        return $this->session;
    }

    public function setSession($value)
    {
        $this->session = $value;
    }
    
    public function getDecimalPlace()
    {
        return Yii::app()->settings->get('system', 'decimalPlace') == '' ? 2 : Yii::app()->settings->get('system', 'decimalPlace');
    }
    
    public function getCart()
    {
        $this->setSession(Yii::app()->session);
        if (!isset($this->session['cart'])) {
            $this->setCart(array());
        }
        return $this->session['cart'];
    }

    public function setCart($cart_data)
    {
        $this->setSession(Yii::app()->session);
        $this->session['cart'] = $cart_data;
        //$session=Yii::app()->session;
        //$session['cart']=$cart_data;
    }
    
    public function addItem($item_id, $price = null)
    {
        $this->setSession(Yii::app()->session);
        //Get all items in the cart so far...
        $items = $this->getCart();
        
        //$model = Item::model()->findbyPk($item_id);
        $models = Treatment::model()->get_selected_treatment($item_id);
        
        if (!$models) {
            return false;
        }

        foreach ($models as $model) {
        
            $item_data = array((int)$item_id =>
                array(
                    'id' => $model["id"],
                    'treatment' => $model["treatment"],
                    'price' => $model["price"],
                )
            );
        }

        if (!isset($items[$item_id])) {
            $items += $item_data;
        }

        $this->setCart($items);
        return true;
    }
    
    public function addMedicine($medicine_id,$quantity = 1)
    {
        $this->setSession(Yii::app()->session);
        //Get all items in the cart so far...
        $items = $this->getMedicine();
        
        //$model = Item::model()->findbyPk($item_id);
        $models = Item::model()->get_selected_medicine($medicine_id);
        
        if (!$models) {
            return false;
        }

        foreach ($models as $model) {
        
            $item_data = array((int)$medicine_id =>
                array(
                    'id' => $model["id"],
                    'name' => $model["name"],
                    'price' => $model["unit_price"],
                    'quantity' => $quantity,
                )
            );
        }

        if (!isset($items[$medicine_id])) {
            $items += $item_data;
        }

        $this->setMedicine($items);
        return true;
    }
    
    public function setMedicine($medicine_data)
    {
        $this->setSession(Yii::app()->session);
        $this->session['medicine'] = $medicine_data;
    }

    public function getMedicine()
    {
        $this->setSession(Yii::app()->session);
        if (!isset($this->session['medicine'])) {
            $this->setMedicine(array());
        }
        return $this->session['medicine'];
        //return array();
    }

        public function deleteItem($item_id)
    {
        $this->setSession(Yii::app()->session);
        $items = $this->getCart();
        unset($items[$item_id]);
        $this->setCart($items);
    }
    
    public function deleteMedicine($item_id)
    {
        $this->setSession(Yii::app()->session);
        $items = $this->getMedicine();
        unset($items[$item_id]);
        $this->setMedicine($items);
    }
    
    public function editMedicine($medicine_id, $quantity, $price)
    {
        $medicines = $this->getMedicine();
        if (isset($medicines[$medicine_id])) {
            $medicines[$medicine_id]['quantity'] = $quantity !=null ? $quantity : $medicines[$medicine_id]['quantity'];
            $medicines[$medicine_id]['price'] = $price !=null ? round($price, $this->getDecimalPlace()) : $medicines[$medicine_id]['price'];
            $this->setMedicine($medicines);
        }

        return false;
    }
    
    public function editTreatment($treatment_id, $price)
    {
        $treatments = $this->getCart();
        if (isset($treatments[$treatment_id])) {
            //$medicines[$medicine_id]['quantity'] = $quantity !=null ? $quantity : $medicines[$medicine_id]['quantity'];
            $treatments[$treatment_id]['price'] = $price !=null ? round($price, $this->getDecimalPlace()) : $treatments[$treatment_id]['price'];
            $this->setCart($treatments);
        }

        return false;
    }
}

?>