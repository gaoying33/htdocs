<?php
   
 /**
 * 
 */
class LocationAction extends Action
{
    public function getStreet()
    {
        $placeM = M( 'Place' );
        $streetlist = $placeM->where( 'p_fid='.I('district') )->field("p_id,p_name")->select();
        echo json_encode($streetlist); 
    }

    public function getDistrictStreet()
    {
        $placeM = M( 'Place' );
        $districtlist = $placeM->where( 'p_fid='.I('city') )->field("p_id,p_name")->select();
        $districtId = 0;
        if(sizeof($districtlist)>1)
            $districtId = $districtlist[0][p_id];
        $streetlist = $placeM->where( 'p_fid='.$districtId )->field("p_id,p_name")->select();
        $data['districtlist'] = $districtlist;
        $data['streetlist'] = $streetlist;
        echo json_encode($data); 
    }

    public function getCityDisStr()
    {
        $placeM = M( 'Place' );
        $citylist = $placeM->where('p_type=5')->field("p_id,p_name")->select();
        $cityId = 0;
        $districtId = 0;

        if(sizeof($citylist)>=1)
            $cityId = $citylist[0][p_id];
        $districtlist = $placeM->where( 'p_fid='.$cityId )->field("p_id,p_name")->select();
        if(sizeof($districtlist)>=1)
            $districtId = $districtlist[0][p_id];
        $streetlist = $placeM->where( 'p_fid='.$districtId )->field("p_id,p_name")->select();
        $data['citylist'] = $citylist;
        $data['districtlist'] = $districtlist;
        $data['streetlist'] = $streetlist;
        
        echo json_encode($data);
    }
}

?>