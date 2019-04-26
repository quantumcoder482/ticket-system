<?php
Class View{
    private $html;
    function __construct()
    {
        $this->html = "";
    }


    public static function make(){
        return new View();
    }



    function buildMenuListGroup($data=array(),$active='')
    {

      //  $this->html .= '';
        $this->html .= '<div class="panel panel-default" id="ibox_panel_menu">';

        if(isset($data['title'])){
            $this->html .= '<div class="ibox-title">
                '.$data['title'].'
            </div>';
        }

        $extra_class = '';

        if(isset($data['panel_body_1'])){
            $this->html .= '<div class="panel-body">'.$data['panel_body_1'].'</div>';
            $extra_class = 'm-t-n-lg';
        }

        if(isset($data['items'])){


            $items = $data['items'];

            $this->html .= '<div class="panel-body list-group border-bottom  '.$extra_class.'">';

            foreach($items as $item){
                $this->html .= '<a href="'.$item[1].'" id="'.$item[3].'" class="list-group-item '.($active == $item[3] ? 'active' : '').'"><span class="'.$item[2].'"></span> '.$item[0].' </a>';
            }

            $this->html .= '</div>';



        }

        if(isset($data['panel_body_2'])){
            $this->html .= '<div class="panel-body">'.$data['panel_body_2'].'</div>';
        }

        if(isset($data['panel_body_3'])){
            $this->html .= '<div class="panel-body">'.$data['panel_body_3'].'</div>';
        }

        $this->html .= '</div>';
        return $this;


    }

    function addA()
    {
        $this->html .= "a";
        return $this;
    }

    function addB()
    {
        $this->html .= "b";
        return $this;
    }

    function getHtml()
    {
        return $this->html;
    }
}