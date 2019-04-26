<?php
Class Form{


    public $elements = '';
    public $form_class = '';
    public $form_id = false;
    public $form_name = '';
    public $panel = true;
    public $form_title = '';
    public $form_method = 'post';


    function __construct($form_class='',$form_id='',$form_name='') {
        $this->form_class = $form_class;
        $this->form_id = $form_id;
        $this->form_name = $form_name;
        return $this;
    }

    function setPanel($panel=true){
        $this->panel = $panel;
        return $this;
    }

    function setTitle($title){
        $this->form_title = $title;
        return $this;
    }

    function setId($id){
        $this->form_id = $id;
        return $this;
    }

    function text($name,$label='',$placeholder='',$id=''){

        if($id == ''){
            $id = $name;
        }

        if($label == ''){
            $label = ucwords($name);
        }

        if($placeholder != ''){
            $placeholder = ' placeholder="'.$placeholder.'"';
        }

        $this->elements .= '<div class="form-group">
        <label for="'.$id.'">'.$label.'</label>
        <input type="text" class="form-control" id="'.$id.'" '.$placeholder.'>
    </div>';

        return $this;

    }


    function render(){

        $form_id = '';

        if($this->form_id){
            $form_id .= 'id="'.$this->form_id.'"';
        }

        $form = '

<form method="'.$this->form_method.'" '.$form_id.'>

'.$this->elements.'
    
</form>';


        if($this->panel){

            $form = '<div class="panel panel-default">
                <div class="panel-heading">'.$this->form_title.'</div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        '.$form.'
                    </div>
                </div>

                <div class="panel-footer"> <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>

            </div>';

        }


        return $form;

    }







}

?>
