<?php

	namespace App\Http\Controllers\Aefi;

	use Illuminate\Foundation\Bus\DispatchesJobs;
	use Illuminate\Routing\Controller as BaseController;
	use Illuminate\Foundation\Validation\ValidatesRequests;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use DB;
	use Illuminate\Support\Str;
	class SelectController extends Controller
	{
		public $result;

		public function __construct(){
			$this->result = null;
		}
		public function selectdatatablecaseAEFI1()
		{
		$caselstF1 = DB::select('select id_case,hn,
		an,
		first_name,
		sur_name,
		age_while_sick_year,
		nationality,
		gender,
		other_nationality,
		village_no,
		province,
		district,
		sub_district,
		necessary_to_investigate
		FROM aefi_form_1' );
		 //dd($caselst);
		 return view('AEFI.Apps.caselstAEFI1')->with('data', $caselstF1);

	 	}
		public function selectdatatablecaseAEFI1group()
		{
		$caselstF1group = DB::select('select id_case,hn,
		an,
		first_name,
		sur_name,
		age_while_sick_year,
		nationality,
		gender,
		other_nationality,
		village_no,
		province,
		district,
		sub_district,
		necessary_to_investigate
		FROM aefi_form_1' );
		 //dd($caselst);
		 return view('AEFI.Apps.caselstAEFI1group')->with('data', $caselstF1group);

		}
		public function selectdatatablecaseAEFI2()
		{
		$caselstF2 = DB::select('select id_case, hn,
		an,
		first_name,
		sur_name,
		age_while_sick_year,
		nationality,
		gender,
		other_nationality,
		village_no,
		province,
		district,
		sub_district,
		necessary_to_investigate
		FROM aefi_form_1 WHERE necessary_to_investigate = ?', [2] );
		 // dd($caselstF2);
		 return view('AEFI.Apps.caselstAEFI2')->with('data', $caselstF2);

		}

		public function selectdataAEFI2()
		{
		$aefiF2id = DB::select('select id_case FROM aefi_form_1');
		// dd($aefiF2id);
		 return view('AEFI.Apps.form2')->with('data', $aefiF2id);

		}
		public function selectalldataAEFI1(Request $req)
		{
		$EditAEFI1 = DB::table('aefi_form_1')->select('*')->where('id_case', [$req->id_case] )->get();
		 	//dd($EditAEFI1);
			if ($EditAEFI1) {
				$EditAEFI1vac = DB::table('aefi_form_1_vac')->select('*')->where('id_case', [$req->id_case] )->get();
			}
			//dd($EditAEFI1vac);
		 return view('AEFI.Apps.EditAEFI1')->with('data', $EditAEFI1)->with('datavac', $EditAEFI1vac);

		}
		public function selectalldataAEFI2(Request $req)
		{
		$EditAEFI2 = DB::table('aefi_form_2')->select('*')->where('id_case', [$req->id_case] )->get();
			//dd($EditAEFI1);
			if ($EditAEFI2) {
				$EditAEFI2vac = DB::table('aefi_form_2_vac')->select('*')->where('id_case', [$req->id_case] )->get();
				// dd($EditAEFI2vac);
			}
			if ($EditAEFI2) {
				$EditAEFI2inv = DB::table('aefi_inv')->select('*')->where('id_case', [$req->id_case] )->get();
				// dd($EditAEFI2vac);
			}
			//dd($EditAEFI1vac);
		 return view('AEFI.Apps.EditAEFI2')->with('data', $EditAEFI2)->with('datavac', $EditAEFI2vac)->with('datainv', $EditAEFI2inv);

		}
		public function selectdatatableEditcaseAEFI2(Request $reqef2)
		{
		$ecaselstF2 = DB::table('aefi_form_1')
		->join('aefi_form_2', 'aefi_form_1.id_case', '=', 'aefi_form_2.id_case')
		->select('aefi_form_1.id_case','aefi_form_1.hn',
		'aefi_form_1.an',
		'aefi_form_1.first_name',
		'aefi_form_1.sur_name',
		'aefi_form_1.gender',
		'aefi_form_1.birthdate',
		'aefi_form_1.nationality',
		'aefi_form_1.province',
		'aefi_form_1.district',
		'aefi_form_1.sub_district')
		->get();
		 // dd($caselstF2);
		 return view('AEFI.Apps.EditlstAEFI2')->with('data', $ecaselstF2);
		}

		public function aecode(){
			$this->result = DB::table('dt_aecode')
			->get();
			return view('AEFI.Apps.form1')->with('dataaecode', $this->result);

		}
}
