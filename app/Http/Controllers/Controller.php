<?php 

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController{
	public function index()
	{
		//mengambil data dari tabel syllabus
		$data = DB::table('pendaftar')->get();

		//mengirim data syllabus ke view index
		return view('welcome', ['datapelajaran' => $data]);
	}
}



?>