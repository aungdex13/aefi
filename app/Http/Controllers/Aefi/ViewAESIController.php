<?php

namespace App\Http\Controllers\Aefi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Career;
class ViewAESIController extends Controller
{
	public $result;

	public function __construct(){
		$this->result = null;
	}

	public function index(Request $request){
		$yearnow =  now()->year+543;
		$list=$this->form1();
		$aecode=$this->aecode();
		$groupproduct=$this->groupproduct();
		$vac_list=$this->vaclist();
		$id_case= $request->id_case;
		$data=DB::table('aesi_form')
					->where('id_case',$id_case)
					->orderBy('ID', 'ASC')
					->get();
					if ($data) {
						$EditAESI1vac = DB::table('aesi_form_vac')->select('*')->where('id_case', [$request->id_case] )->get();
					}
					$count_data_vac= DB::table('aesi_form_vac')
                     ->select(DB::raw('count(*) as vac_count'))
                     ->where('id_case', [$request->id_case])
                     ->get();
		$listProvince=$this->listProvince();
		$listDistrict=$this->listDistrict();
		$listsubdistrict=$this->listsubdistrict();
		$list_hos=$this->list_hos();
		$list_career=$this->list_career();
		$listvac_arr=$this->listvac_arr();
		return view('AESI.ViewAESI1',
			[
				'vac_list'=>$vac_list,
				'list'=>$list ,
				'aecode'=>$aecode,
				'groupproduct'=>$groupproduct,
				'yearnow'=>$yearnow,
				'data'=>$data,
				'datavac'=>$EditAESI1vac,
				'listProvince'=>$listProvince,
				'listDistrict'=>$listDistrict,
				'listsubdistrict'=>$listsubdistrict,
				'count_data_vac'=>$count_data_vac,
				'list_hos'=>$list_hos,
				'list_career'=>$list_career,
				'listvac_arr'=>$listvac_arr
			]);
	}
	public function form1(){
		$list=DB::table('tbl_provinces')->get();
		 // return view('AESI.Apps.form1')->with('list',$list);
		 return $list;
	}
	protected function vaclist(){
		$arr_vaclist = DB::table('vac_tbl')
		->select('VAC_CODE','VAC_NAME_EN')
		->orderBy('ID', 'ASC')
		->get();
		 // dd($vaclist);
		return $arr_vaclist;
	}
	public function aecode(){
		$this->result = DB::table('dt_aecode')
		->get();
		return $this->result;

	}
	public function groupproduct(){
		$this->result = DB::table('VAC_tbl')
		->get();
		return $this->result;

	}
		public function fetch(Request $request){
		$id=$request->get('select');
		$result=array();
		$query=DB::table('tbl_provinces')
		->join('tbl_amphures','tbl_provinces.province_id','=','tbl_amphures.province_id')
		->select('tbl_amphures.amphur_name','tbl_amphures.amphur_id','tbl_amphures.amphur_code')
		->where('tbl_provinces.province_id',$id)
		->get();
		$output='<option value="">   อำเภอ   </option>';
			foreach ($query as $row) {
				$output.='<option value="'.$row->amphur_code.'">'.$row->amphur_name.'</option>';
			}
			echo $output;
	}
	public function fetchD(Request $request){
	$idD = $request->select;
	// dd($idD);
	$resultD=array();
	$queryD=DB::table('tbl_districts')
	->select('tbl_districts.district_name','tbl_districts.district_id','tbl_districts.district_code')
	->where(DB::raw('left(tbl_districts.district_code, 4)'),'=',$idD)
	->get();

	$outputD='<option value="">   ตำบล   </option>';
		foreach ($queryD as $rowD) {
			$outputD.='<option value="'.$rowD->district_code.'">'.$rowD->district_name.'</option>';
		}
		echo $outputD;

}

public function Get_Career_All(Request $request){
    $result = Career::query();

    if(isset($request->searchTerm)){
        $result = $result->where('career_name', 'like', '%' . $request->searchTerm . '%');

    $result = $result->select('career_code','career_name');
    $result = $result->get();
    }
    $datas = array();
    foreach($result as $data){
      $json_datas[] = array("id"=>$data->career_code, "text"=>$data->career_name);
    }
    if(count($result)>0){
      return response()->json($json_datas);
    }
  }
  protected function listProvince(){
	$province = DB::table('tbl_provinces')
	->select('province_code','province_name')
	->orderBy('province_code', 'ASC')
	->get();
	foreach ($province as  $value) {
		$province_arr[$value->province_code] =trim($value->province_name);
	}
	// dd($province_arr);
	return $province_arr;
}
protected function listDistrict(){
	$district = DB::table('tbl_amphures')->select('amphur_code','amphur_name')->get();
	foreach ($district as  $value) {
		$district_arr[$value->amphur_code] =trim($value->amphur_name);
	}
	// dd($province_arr);
	return $district_arr;
}
protected function listsubdistrict(){
	$subdistrict = DB::table('tbl_districts')->select('district_code','district_name')->get();
	foreach ($subdistrict as  $value) {
		$district_arr[$value->district_code] =trim($value->district_name);
	}
	// dd($province_arr);
	return $district_arr;
}
protected function list_hos(){
	$arr_hos = DB::table('chospital_new')->select('hospcode','hosp_name')->get();
	foreach ($arr_hos as  $value) {
		$arr_hos[$value->hospcode] =trim($value->hosp_name);
	}
	// dd($province_arr);
	return $arr_hos;
}
protected function list_career(){
	$arr_career = DB::table('ref_career')->select('career_code','career_name')->get();
	foreach ($arr_career as  $value) {
		$arr_career[$value->career_code] =trim($value->career_name);
	}
	// dd($province_arr);
	return $arr_career;
}
protected function listvac_arr(){
	$arr_vac = DB::table('vac_tbl')->select('VAC_CODE','VAC_NAME_EN')->get();
	foreach ($arr_vac as  $value) {
		$arr_vac[$value->VAC_CODE] =trim($value->VAC_NAME_EN);
	}
	// dd($province_arr);
	return $arr_vac;
}
}
