<?php

class Poi
{
    private $name;
    private $coord_x, $coord_y;
    private $service;
    
    function __construct($name, $x, $y, $service)
    {
        $this->name = $name;
        $this->coord_x = $x;
        $this->coord_y = $y;
        $this->service = $service;
    }
    
    public function get_feature(){
        $feature = "{
            position: new google.maps.LatLng($this->coord_x, $this->coord_y),
            type: '$this->service'
        }";
        return $feature;
    }
}

