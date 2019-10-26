<?php

class MapBlockB extends MapBlock {
	
	/**
	 * 
	 * @param unknown_type $startPosX
	 * @param unknown_type $startPosY
	 * @return unknown_type
	 */
	public function __construct($startPosX = false, $startPosY = false) {	
	   parent::__construct();
	   $this->setStartPosX($startPosX);
	   $this->setStartPosY($startPosY);   
	   $this->setWidth(5);
	   $this->setHeight(5);
	   $this->setBlockName('B');	   
	   $connection = new MapConnection();
	   $connection->class = 'C';
	   $connection->direction = Map::EAST;	
	   $this->addConnection($connection);
	}
		
	public function setMapElements(Map &$map) {
		/*
		 * setting-null-point. 
		 */
		$sx = $this->startPosX - 1; 
		$sy = $this->startPosY - 1;

        //Raum-B  !!!!!!!!!!!!!!!!     
        // 5 x 4
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(false,'0504N');
        $mapElement->eastElement = new MapDirectionElement(true, '0504E');     
        $mapElement->southElement = new MapDirectionElement(true, '0504S');
        $mapElement->westElement = new MapDirectionElement(true, '0504W');             
        $map->setElementAt($sx + 5, $sy + 4, $mapElement);  
        
                
        // 5 x 3
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(false,'0503N');
        $mapElement->eastElement = new MapDirectionElement(true, 'Kante1');     
        $mapElement->southElement = new MapDirectionElement(false, '0503S');
        $mapElement->westElement = new MapDirectionElement(false, '0503W', true);             
        $map->setElementAt($sx + 5, $sy + 3, $mapElement);
            
                
        // 5 x 2
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(false,'0502N');
        $mapElement->eastElement = new MapDirectionElement(true, 'Kante1');     
        $mapElement->southElement = new MapDirectionElement(false, '0502S', true);
        $mapElement->westElement = new MapDirectionElement(true, '0502W');             
        $map->setElementAt($sx + 5, $sy + 2, $mapElement);

                
        // 5 x 1
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(true,'0501N');
        $mapElement->eastElement = new MapDirectionElement(false, '0501E');      
        $mapElement->southElement = new MapDirectionElement(false, '0501S', true);
        $mapElement->westElement = new MapDirectionElement(false, '0501W');             
        $map->setElementAt($sx + 5, $sy + 1, $mapElement);  
   
        
        // 4 x 3
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(true, '0403N');
        $mapElement->eastElement = new MapDirectionElement(false,'0403E');      
        $mapElement->southElement = new MapDirectionElement(true, '0403S');
        $mapElement->westElement = new MapDirectionElement(false, '0403W');             
        $map->setElementAt($sx + 4, $sy + 3, $mapElement);

        
        // 4 x 1
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(true, 'Kante2X');
        $mapElement->eastElement = new MapDirectionElement(false,'0401E');      
        $mapElement->southElement = new MapDirectionElement(true, '0401S');
        $mapElement->westElement = new MapDirectionElement(false, '0401W');             
        $map->setElementAt($sx + 4, $sy + 1, $mapElement);  

                
        // 3 x 5
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(false, '0305N');
        $mapElement->eastElement = new MapDirectionElement(true, '0305E');     
        $mapElement->southElement = new MapDirectionElement(true,'0305S');
        $mapElement->westElement = new MapDirectionElement(false, '0305W');             
        $map->setElementAt($sx + 3, $sy + 5, $mapElement); 

        
        // 3 x 4
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(false, '0304N');
        $mapElement->eastElement = new MapDirectionElement(true, '0304E');     
        $mapElement->southElement = new MapDirectionElement(false,'0304S' );
        $mapElement->westElement = new MapDirectionElement(false, '0304W');             
        $map->setElementAt($sx + 3, $sy + 4, $mapElement); 
        
        
        // 3 x 3
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(true, 'Kante2');
        $mapElement->eastElement = new MapDirectionElement(false, '0303E', true); 
        $mapElement->southElement = new MapDirectionElement(false,'0303S' );
        $mapElement->westElement = new MapDirectionElement(false, '0303W');             
        $map->setElementAt($sx + 3, $sy + 3, $mapElement); 
        

        // 3 x 1
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(true, 'Kante2');
        $mapElement->eastElement = new MapDirectionElement(false, '0301E');     
        $mapElement->southElement = new MapDirectionElement(true, 'Kante1X');
        $mapElement->westElement = new MapDirectionElement(false, '0301W');             
        $map->setElementAt($sx + 3, $sy + 1, $mapElement);
        
                
        // 2 x 5
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(false, '0205N', true);
        $mapElement->eastElement = new MapDirectionElement(false, '0205E');      
        $mapElement->southElement = new MapDirectionElement(true, '0205S'); 
        $mapElement->westElement = new MapDirectionElement(false, '0205W');             
        $map->setElementAt($sx + 2, $sy + 5, $mapElement);

        
        // 2 x 4
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(false, '0204N');
        $mapElement->eastElement = new MapDirectionElement(false, '0204E');      
        $mapElement->southElement = new MapDirectionElement(false, '0204S'); 
        $mapElement->westElement = new MapDirectionElement(false, '0204W');             
        $map->setElementAt($sx + 2, $sy + 4, $mapElement);
        
                       
        // 2 x 3
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(true, 'Kante1');
        $mapElement->eastElement = new MapDirectionElement(false, '0203E');     
        $mapElement->southElement = new MapDirectionElement(false, '0203S');
        $mapElement->westElement = new MapDirectionElement(false,'0203W');              
        $map->setElementAt($sx + 2, $sy + 3, $mapElement);  
        
        
        // 2 x 1
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(true, '0201N');
        $mapElement->eastElement = new MapDirectionElement(false, '0201E');     
        $mapElement->southElement = new MapDirectionElement(true, '0201S');
        $mapElement->westElement = new MapDirectionElement(true, '0201W');             
        $map->setElementAt($sx + 2, $sy + 1, $mapElement); 

        
        // 1 x 5
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(false, '0105N');
        $mapElement->eastElement = new MapDirectionElement(false, '0105E');     
        $mapElement->southElement = new MapDirectionElement(false, '0105S'); 
        $mapElement->westElement = new MapDirectionElement(true, '0105W');              
        $map->setElementAt($sx + 1, $sy + 5, $mapElement);  

        
        // 1 x 4
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(false, '0104N');
        $mapElement->eastElement = new MapDirectionElement(false, '0104E');     
        $mapElement->southElement = new MapDirectionElement(false,'0104S');//noch machen!
        $mapElement->westElement = new MapDirectionElement(true, 'Kante1');             
        $map->setElementAt($sx + 1, $sy + 4, $mapElement);
        
                
        // 1 x 3
        $mapElement = new MapElement;
        $mapElement->northElement = new MapDirectionElement(true, '0103N');
        $mapElement->eastElement = new MapDirectionElement(false, '0103E', true);     
        $mapElement->southElement = new MapDirectionElement(false,'0103S');
        $mapElement->westElement = new MapDirectionElement(true, '0103W');              
        $map->setElementAt($sx + 1, $sy + 3, $mapElement); 
        
	}
}