<?php
Class Ib_Animate{

    public $css_class_names = array(
        array(
           'group' => 'Attention Seekers',
            'names' => 'bounce,flash,pulse,rubberBand,shake,swing,tada,wobble,jello'
        ),
        array(
            'group' => 'Bouncing Entrances',
            'names' => 'bounceIn,bounceInDown,bounceInLeft,bounceInRight,bounceInUp'
        ),
//        array(
//            'group' => 'Bouncing Exits',
//            'names' => 'bounceOut,bounceOutDown,bounceOutLeft,bounceOutRight,bounceOutUp'
//        ),
        array(
            'group' => 'Fading Entrances',
            'names' => 'fadeIn,fadeInDown,fadeInDownBig,fadeInLeft,fadeInLeftBig,fadeInRight,fadeInRightBig,fadeInUp,fadeInUpBig'
        ),
//        array(
//            'group' => 'Fading Exits',
//            'names' => 'fadeOut,fadeOutDown,fadeOutDownBig,fadeOutLeft,fadeOutLeftBig,fadeOutRight,fadeOutRightBig,fadeOutUp,fadeOutUpBig'
//        ),
        array(
            'group' => 'Flippers',
            'names' => 'flip,flipInX,flipInYY'  // ,flipOutX,flipOut
        ),array(
            'group' => 'Lightspeed',
            'names' => 'lightSpeedIn' //,lightSpeedOut
        ),
        array(
            'group' => 'Rotating Entrances',
            'names' => 'rotateIn,rotateInDownLeft,rotateInDownRight,rotateInUpLeft,rotateInUpRight'
        ),
//        array(
//            'group' => 'Rotating Exits',
//            'names' => 'rotateOut,rotateOutDownLeft,rotateOutDownRight,rotateOutUpLeft,rotateOutUpRight'
//        ),
        array(
            'group' => 'Sliding Entrances',
            'names' => 'slideInUp,slideInDown,slideInLeft,slideInRight'
        ),
//        array(
//            'group' => 'Sliding Exits',
//            'names' => 'slideOutUp,slideOutDown,slideOutLeft,slideOutRight'
//        ),
        array(
            'group' => 'Zoom Entrances',
            'names' => 'zoomIn,zoomInDown,zoomInLeft,zoomInRight,zoomInUp'
        ),
//        array(
//            'group' => 'Zoom Exits',
//            'names' => 'zoomOut,zoomOutDown,zoomOutLeft,zoomOutRight,zoomOutUp'
//        ),
        array(
            'group' => 'Specials',
            'names' => 'rollIn'  # hinge,rollOut
        )
    );


    public function options($selected){

        $cs = $this->css_class_names;

        $html = '';

        foreach ($cs as $c){

            $group = $c['group'];

            $names = explode(',',$c['names']);

            $opt = '';

            foreach ($names as $name){

                $s = '';

                if('animated '.$name == $selected){
                    $s = ' selected';
                }

                $opt .= '<option value="animated '.$name.'"'.$s.'>'.$name.'</option>';

            }


            $html .= '<optgroup label="'.$group.'">
            '.$opt.'</optgroup>';



        }

        return $html;


    }


}