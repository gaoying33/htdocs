<?php
     class CarPriorityAction extends Action
     {
        public function setPriority()
         {
          	  $carM = M("Car"); // 实例化普通车对象
          	  $totalCount= $carM->count();

          	  for($i=0;$i<$totalCount;++$i)
          	  { 
          	  	 $car = $carM->limit($i.','.'1')->select();
          	  	 $car[0]['c_priority']= rand(1,$totalCount);
          	  	 $carM->save($car[0]);
          	  }
             
         }  

    
     }
?>