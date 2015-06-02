 <?php
// 本类由系统自动生成，仅供测试用途
class CarAction extends Action {
 
    const bigmiddle = 20;           //大型车和中型车体积的分割点
    const midllesmall = 10;         //中型车和小型车体积的分割点

    /**
     * 添加车辆
     * @param person         载人数
     * @param capacity       载重量
     * @param phone          电话
     * @param familyname     姓氏
     * @param city           归属地所在城市的id
     * @param district       归属地所在街区的id
     * @param street         归属地所在街道的id
     * @param append         备注
     * @param length         长
     * @param width          宽
     * @param height         高
     * @param status         可用状态
     * @param scopeCity      服务范围城市的id数组
     * @param scopeDistrict  服务范围城区的id数组（没有选择的为0）
     * @param scopeStreet    服务范围街道的id数组（没有选择的我0）
     * @return  id           新添加车辆的id
    */
    public function addCar(){
		$carD = D('Car');
    	$carD->startTrans();    	
    	$car['c_titleimage'] = 'car1.jpg';

        $car['c_person'] = I('person');
        $car['c_capacity'] = I('capacity');
        $car['c_phone'] = I('phone');
        $car['c_name'] = I('familyname');

    	$car['c_city'] = I('city');
    	$car['c_district'] = I('district');
    	$car['c_street'] = I('street');
        $car['c_append'] = I('append');
        $car['c_status'] = I('status');

    	$car['c_image'] = 'jj';
        $length = I('length');
        $width = I('width');
        $height = I('height');
        $appearence = $length * $width * $height;
        if($appearence>self::bigmiddle)
            $car['c_sizetype'] = 1;
        else if($appearence>self::midllesmall)
            $car['c_sizetype'] = 2;
        else
            $car['c_sizetype'] = 3;
        $car['c_appearance'] = $length.'×'.$width.'×'.$height;
    	$car['c_priority'] = rand();
    

        $car['scope'] = array();
        $scopeCity = I('scopeCity');
        $scopeDistrict = I('scopeDistrict');
        $scopeStreet = I('scopeStreet');
        $len = sizeof($scopeCity);
        for($i=0;$i<$len;$i++){
            array_push($car['scope'], array('s_cityid'=>$scopeCity[$i],'s_districtid'=>$scopeDistrict[$i],'s_streetid'=>$scopeStreet[$i]));
        }

    	$id = $carD->relation(true)->add($car);
    	if($id){
    		$carD->commit();
    	}
    	else{
    		$carD->rollback();
    	}
    	echo $id;
    }


    /**
     * 获取所有的车辆数量以及某一页的车辆列表
     * @param  [nowPage] [现在第几页]
     * @param  [pageRow] [description]
     * @return [json] [arrayList]
     */
    public function getAllCars(){
        $page=$_POST['nowPage'];
        $pageRows=$_POST['pageRow'];
        $firstRow=($page-1)*$pageRows;
        $carM=M('car');
        $totalCount= $carM->count();

        if($totalCount==0)
        { 
            echo "null";
            exit();
        }
        $sql="select c_id,c_phone,c_name,c_person,c_capacity,c_appearance,c_sizetype,c_status,Pc.p_name city,Pd.p_name distict,Ps.p_name street from dt_car,dt_place Pc,dt_place Pd,dt_place Ps where c_city=Pc.p_id and c_district=Pd.p_id and c_street=Ps.p_id limit ".$firstRow.','.$pageRows;

        $Model = new Model(); // 实例化一个model对象 没有对应任何数据表
        
        $cars = $Model->query($sql);

        $arrayList = array('totalCount' => $totalCount,
                             'cars'=>$cars);
          
         echo json_encode($arrayList);
    }

    /**
     * 删除一个car
     * @param  [carId] [要删除的car的ID]
     */
    function deleteAnCar(){
        $id=$_POST['carId'];
        $carD = D('Car');
        $carD->find($id);
        $carD->relation(true)->delete(); 
    }
    public function getTitleImgs()
    {
        $carId = $_POST['carId'];
        $carM = M('Car');
        $car = $carM->where('c_id='.$carId)->field('c_image,c_titleimage')->find();
        echo json_encode($car);
    }
    public function getDetailImgs()
    {
        $carId = $_POST['carId'];
        $carM = M('Car');
        $car = $carM->where('c_id='.$carId)->field('c_image')->find();

        echo json_encode($car['c_image']);
    }
   public function deleteDetailImgs()
   {    
       $carId = $_POST['carId'];
       $index = $_POST['ddimg'];
       $carM = M('Car');
       $car = $carM->where('c_id='.$carId)->field('c_image')->find();
    
      
      


       $index2=$index.",";
       $newimgs=str_replace($index2,"",$car['c_image']);
       $data = array(  'c_id' => $carId,
                         'c_image' => $newimgs,
                          
                      );
                
        M('Car')->save($data); 
           
        unlink($index);
        unlink(str_replace("detail","title",$index));
   
   }

    public function setTitleImg()
    {
        $titlePath=$_POST['titlePath'];
        $carId=$_POST['carId'];

        $data = array(  'c_id' => $carId,
                         'c_titleimage' => $titlePath,
                          
                      );
                
        M('Car')->save($data);
        echo 'done';
    }

    public function setDetailImg()
    {
        $detailPath=$_POST['detailPath'];
         $carId=$_POST['carId'];
          $data = array(  'c_id' => $carId,
                         'c_image' => $detailPath,
                          
                      );
                
        M('Car')->save($data);
        echo $carId;

    }


    /**
     * 修改一辆车的可用状态
     * @param  [carId] [车的ID]
     * @param  [status] [修改后车的状态，1表示可用，即未锁定；0表示不可用，即锁定]
     * @return [type] [description]
     */
    function lockAnCar(){
        $id=$_POST['carId'];
        $lock=$_POST['status'];
        $carM = M('Car');
        $data = array(
                       'c_id' => $id,
                       'c_status' =>$lock,
                        
                      );
        $carM->save($data);
    }

    /**
     * 获得一辆车的详细信息
     * @param  [carId] [要查看的车的ID]
     * @return [car] [车的信息]
     */
    function getCar(){
        $carId = $_POST['carId'];
        $carM = M('Car');
        $car = $carM->where('c_id='.$carId)->field('c_phone,c_name,c_person,c_capacity,c_append,c_appearance,c_city,c_district,c_street')->find();
        
        //归属地
        $placeM = M( 'Place' );
        $citylist = $placeM->where('p_type=5')->field("p_id,p_name")->select();
        $districtlist = $placeM->where( 'p_fid='.$car['c_city'] )->field("p_id,p_name")->select();
        if($car['c_district']!=0)
            $streetlist = $placeM->where( 'p_fid='.$car['c_district'] )->field("p_id,p_name")->select();
        $car['citylist'] = $citylist;
        $car['districtlist'] = $districtlist;
        $car['streetlist'] = $streetlist;

        //服务范围
        $sqlScope="select s_id,s_cityid,s_districtid,s_streetid,Pc.p_name city,Pd.p_name district,Ps.p_name street from dt_scope,dt_place Pc,dt_place Pd,dt_place Ps where s_cid=".$carId." and s_cityid=Pc.p_id and s_districtid=Pd.p_id and s_streetid=Ps.p_id";
        $Model = new Model(); // 实例化一个model对象 没有对应任何数据表
        $scopeList=$Model->query($sqlScope);
        $car['scopeList'] = $scopeList;

        echo json_encode($car);
    }


    function saveEditCar(){
        $carD = D('Car');
        $carD->startTrans();        
        $car['c_id'] = $_POST['carId'];
        $car['c_person'] = $_POST['person'];
        $car['c_capacity'] = $_POST['capacity'];
        $car['c_phone'] = $_POST['phone'];
        $car['c_name'] = $_POST['familyname'];

        $car['c_city'] = $_POST['city'];
        $car['c_district'] = $_POST['district'];
        $car['c_street'] = $_POST['street'];
        $car['c_append'] = $_POST['append'];
       
        $length = $_POST['length'];
        $width = $_POST['width'];
        $height = $_POST['height'];
        $appearence = $length * $width * $height;
        if($appearence>self::bigmiddle)
            $car['c_sizetype'] = 1;
        else if($appearence>self::midllesmall)
            $car['c_sizetype'] = 2;
        else
            $car['c_sizetype'] = 3;
        $car['c_appearance'] = $length.'×'.$width.'×'.$height;
        $car['c_priority'] = rand();
    

        $car['scope'] = array();
        $scopeCity = $_POST['scopeCity'];
        $scopeDistrict = $_POST['scopeDistrict'];
        $scopeStreet = $_POST['scopeStreet'];
        $len = sizeof($scopeCity);
        for($i=0;$i<$len;$i++){
            array_push($car['scope'], array('s_cityid'=>$scopeCity[$i],'s_districtid'=>$scopeDistrict[$i],'s_streetid'=>$scopeStreet[$i]));
        }

        $scopeM = M('Scope');
        $scopeM->where('s_cid='.$car['c_id'])->delete();

        $result = $carD->relation(true)->save($car);
        if($result){
            $carD->commit();
        }
        else{
            $carD->rollback();
        }
        echo $result;
    }


}