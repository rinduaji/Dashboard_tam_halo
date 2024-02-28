<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $data['title'] = "Dashboard | TAM | HALO & P2P";
        // $area = 'BANDUNG';
        // $tanggal = '2022-11-03';
        // $tanggal = $_GET[''];
        // $mtrqry = $this->db->query("SELECT * FROM app_tam_dashboard_halo WHERE area='$area' AND tanggal='$tanggal'");
		if($this->input->post('site') != NULL) {
			$site = $this->input->post('site');
		}
		else {
			$site = "All Site";
		}

		if($this->input->post('tanggal_sekarang') != NULL) {
			$tanggal_sekarang = $this->input->post('tanggal_sekarang');
		}
		else {
			$tanggal_sekarang = date("Y-m-d");
		}

		if($this->input->post('tanggal_akhir') != NULL) {
			$tanggal_akhir = $this->input->post('tanggal_akhir');
		}
		else {
			$tanggal_akhir = date("Y-m-d");
		}
		
		if($site == "All Site") {
			$query_month_now = "
				SELECT jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
				SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
				SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
				SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
				MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir' GROUP BY jenis ORDER BY jenis ASC
			";
			$growth_sql = $this->db->query($query_month_now);
			$query_growth_sql1 = "
								SELECT area, jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
								SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
								SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
								SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
								MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE MONTH(tanggal) = MONTH(DATE_SUB('$tanggal_sekarang', INTERVAL 1 MONTH)) GROUP BY jenis ORDER BY jenis ASC
							";
			$growth_sql1 = $this->db->query($query_growth_sql1);
			$rowcount=mysqli_num_rows($growth_sql1);
		}
		if($site != "All Site") {
			$growth_sql = $this->db->query("
						SELECT area, jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
						SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
						SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
						SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
						MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE area = '$site' AND tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir'
						GROUP BY area, jenis ORDER BY jenis ASC
					");
			$query_growth_sql1 = "
								SELECT area, jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
								SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
								SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
								SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
								MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE area = '$site' AND MONTH(tanggal) = MONTH(DATE_SUB('$tanggal_sekarang', INTERVAL 1 MONTH)) 
								GROUP BY area, jenis ORDER BY jenis ASC
							";
			$growth_sql1 = $this->db->query($query_growth_sql1);
			$rowcount=mysqli_num_rows($growth_sql1);
		}
		$bulan_lalu = date("Y-m-d",strtotime("-1 months",strtotime($tanggal_sekarang)));
		$data['bulan_lalu'] = $bulan_lalu;
		if(isset($growth_sql)){
			foreach($growth_sql->result() as $dataMonthNow){
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['tanggal'] = $tanggal_sekarang;
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['area'] = $this->input->post('site');
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['jumlah_agent'] =+ $data['totalDataMonthNow'][$dataMonthNow->jenis]['jumlah_agent'] + $dataMonthNow->jumlah_agent;
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['jumlah_call'] =+ $data['totalDataMonthNow'][$dataMonthNow->jenis]['jumlah_call'] + $dataMonthNow->jumlah_call;
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['jumlah_call_contacted'] =+ $data['totalDataMonthNow'][$dataMonthNow->jenis]['jumlah_call_contacted'] + $dataMonthNow->jumlah_call_contacted;
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['jumlah_call_agree'] =+ $data['totalDataMonthNow'][$dataMonthNow->jenis]['jumlah_call_agree'] + $dataMonthNow->jumlah_call_agree;
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['revenue'] =+ $data['totalDataMonthNow'][$dataMonthNow->jenis]['revenue'] + $dataMonthNow->jumlah_revenue;
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['rpa'] =+ $data['totalDataMonthNow'][$dataMonthNow->jenis]['rpa'] + $dataMonthNow->rpa;
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['ppa'] =+ $data['totalDataMonthNow'][$dataMonthNow->jenis]['ppa'] + $dataMonthNow->ppa;
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['best_agent'] = $dataMonthNow->best_agent;
				$data['totalDataMonthNow'][$dataMonthNow->jenis]['revenue_tertinggi'] = $dataMonthNow->revenue_tertinggi;
			}
		}
		if(isset($growth_sql1)){
			// $data['bulan_lalu'] = $bulan_lalu;
			// if($rowcount > 0) {
				foreach($growth_sql1->result() as $dataLastMonth){
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['tanggal'] = $bulan_lalu;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['area'] = $bulan;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['jumlah_agent'] =+ $data['totalDataLastMonth'][$dataLastMonth->jenis]['jumlah_agent'] + $dataLastMonth->jumlah_agent;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['jumlah_call'] =+ $data['totalDataLastMonth'][$dataLastMonth->jenis]['jumlah_call'] + $dataLastMonth->jumlah_call;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['jumlah_call_contacted'] =+ $data['totalDataLastMonth'][$dataLastMonth->jenis]['jumlah_call_contacted'] + $dataLastMonth->jumlah_call_contacted;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['jumlah_call_agree'] =+ $data['totalDataLastMonth'][$dataLastMonth->jenis]['jumlah_call_agree'] + $dataLastMonth->jumlah_call_agree;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['revenue'] =+ $data['totalDataLastMonth'][$dataLastMonth->jenis]['revenue'] + $dataLastMonth->jumlah_revenue;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['rpa'] =+ $data['totalDataLastMonth'][$dataLastMonth->jenis]['rpa'] + $dataLastMonth->rpa;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['ppa'] =+ $data['totalDataLastMonth'][$dataLastMonth->jenis]['ppa'] + $dataLastMonth->ppa;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['best_agent'] = $dataLastMonth->best_agent;
					$data['totalDataLastMonth'][$dataLastMonth->jenis]['revenue_tertinggi'] = $dataLastMonth->revenue_tertinggi;
				}
		}
		$total_bulan = cal_days_in_month(CAL_GREGORIAN, date("m",strtotime($tanggal_sekarang)), date("Y",strtotime($tanggal_sekarang)));
		$date1 = date_create($tanggal_sekarang);
		$date2 = date_create($tanggal_akhir);
		$diff = date_diff($date1,$date2);
		$jumlah_hari = $diff->format("%a");
		// print_r($jumlah_hari);

		if($site == "All Site" && $jumlah_hari > 7) {
			$mtrqry = $this->db->query("
						SELECT area, jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
						SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
						SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
						SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
						MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir' GROUP BY jenis ORDER BY jenis ASC
					");
		}
		else if($site != "All Site" && $jumlah_hari > 7) {
			$mtrqry = $this->db->query("
						SELECT area, jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
						SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
						SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
						SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
						MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE area = '$site' AND tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir' 
						GROUP BY area, jenis ORDER BY jenis ASC
					");
		}
		else if(($site != "All Site" && $jumlah_hari == 1) || ($site != "All Site" && $jumlah_hari == 0)) {
			// $mtrqry = $this->db->query("SELECT * FROM app_tam_dashboard_halo WHERE area = '$site' AND tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir'");
			$mtrqry = $this->db->query("
						SELECT jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
						SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
						SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
						SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
						MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE area = '$site' AND tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir' GROUP BY jenis ORDER BY jenis ASC
					");
		}
		else if(($site == "All Site" && $jumlah_hari == 1) || ($site == "All Site" && $jumlah_hari == 0)) {
			$mtrqry = $this->db->query("
						SELECT jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
						SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
						SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
						SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
						MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir' GROUP BY jenis ORDER BY jenis ASC
					");
		}
		else if($site != "All Site" && $jumlah_hari > 1) {
			$mtrqry = $this->db->query("
						SELECT area, jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
						SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
						SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
						SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
						MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE area='$site' AND tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir' 
						GROUP BY area, jenis ORDER BY jenis ASC
					");
		}
		else if($site == "All Site" && $jumlah_hari > 1) {
			$mtrqry = $this->db->query("
						SELECT area, jenis, SUM(jumlah_agent) as jumlah_agent, SUM(jumlah_call) as jumlah_call, SUM(jumlah_call_contacted) as jumlah_call_contacted, 
						SUM(jumlah_call_agree) as jumlah_call_agree, SUM(jumlah_revenue) as jumlah_revenue, SUM(rpa) as rpa, sum(ppa) as ppa, SUM(total_agent) as total_agent, 
						SUM(total_call) as total_call, SUM(total_call_contacted) as total_call_contacted, SUM(total_call_agree) as total_call_agree, 
						SUM(total_revenue) as total_revenue, SUM(total_rpa) as total_rpa, SUM(total_ppa) as total_ppa, MAX(best_agent) as best_agent, 
						MAX(revenue_tertinggi) as revenue_tertinggi FROM app_tam_dashboard_halo WHERE tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir'
						 GROUP BY jenis ORDER BY jenis ASC
					");
		}

		if(isset($mtrqry)){
			foreach($mtrqry->result() as $datana){
				$data['tabeldata'][$datana->jenis]['tanggal'] = $tanggal_sekarang;
				$data['tabeldata'][$datana->jenis]['area'] = $site;
				if($jumlah_hari > 0) {
					$data['tabeldata'][$datana->jenis]['jumlah_agent'] = $datana->jumlah_agent / $jumlah_hari;
				}
				else {
					$data['tabeldata'][$datana->jenis]['jumlah_agent'] = $datana->jumlah_agent;
				}
				$data['tabeldata'][$datana->jenis]['jumlah_call'] = $datana->jumlah_call;
				$data['tabeldata'][$datana->jenis]['jumlah_call_contacted'] = $datana->jumlah_call_contacted;
				$data['tabeldata'][$datana->jenis]['jumlah_call_agree'] = $datana->jumlah_call_agree;
				$data['tabeldata'][$datana->jenis]['jumlah_revenue'] = $datana->jumlah_revenue;
				$data['tabeldata'][$datana->jenis]['rpa'] = $datana->rpa;
				$data['tabeldata'][$datana->jenis]['ppa'] = $datana->ppa;
				$data['tabeldata'][$datana->jenis]['total_agent'] = $datana->total_agent;
				$data['tabeldata'][$datana->jenis]['total_call'] = $datana->total_call;
				$data['tabeldata'][$datana->jenis]['total_call_contacted'] = $datana->total_call_contacted;
				$data['tabeldata'][$datana->jenis]['total_call_agree'] = $datana->total_call_agree;
				$data['tabeldata'][$datana->jenis]['total_revenue'] = $datana->total_revenue;
				$data['tabeldata'][$datana->jenis]['total_rpa'] = $datana->total_rpa;
				$data['tabeldata'][$datana->jenis]['total_ppa'] = $datana->total_ppa;
				$data['tabeldata'][$datana->jenis]['best_agent'] = $datana->best_agent;
				$data['tabeldata'][$datana->jenis]['revenue_tertinggi'] = $datana->revenue_tertinggi;
			}
		}

		if($site == "All Site") {
			$query_best_agent_max_revenue = "SELECT * FROM app_tam_dashboard_halo WHERE tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir' ORDER BY revenue_tertinggi DESC LIMIT 1";
		}
		if($site != "All Site") {
			$query_best_agent_max_revenue = "SELECT * FROM app_tam_dashboard_halo WHERE tanggal BETWEEN '$tanggal_sekarang' AND '$tanggal_akhir' AND area='$site' ORDER BY revenue_tertinggi DESC LIMIT 1";
		}

		if(isset($query_best_agent_max_revenue)){
			$result_best_agent_max_revenue = $this->db->query($query_best_agent_max_revenue);
			foreach($result_best_agent_max_revenue->result() as $data_best_agent_revenue_max){
				if($jumlah_hari > 1){
					$data['best_agent'] =  $data_best_agent_revenue_max->best_agent;
					$data['revenue_tertinggi'] =  $data_best_agent_revenue_max->revenue_tertinggi;
				}
				else if($jumlah_hari > 7) {
					// print_r($data_best_agent_revenue_max);
					$data['best_agent'] =  $data_best_agent_revenue_max->best_agent_week;
					$data['revenue_tertinggi'] =  $data_best_agent_revenue_max->revenue_tertinggi_week;
				}
				else {
					$data['best_agent'] =  $data_best_agent_revenue_max->best_agent_month;
					$data['revenue_tertinggi'] =  $data_best_agent_revenue_max->revenue_tertinggi_month;
				}
				
			}
		}

		if($jumlah_hari > 1) {
			$data['hari']['start'] = $tanggal_sekarang;
			$data['hari']['end'] = $tanggal_akhir;  
			// $data['hari'] = $this->rangeWeek($tanggal_sekarang);
		}
		else {
			$data['hari'] = $tanggal_sekarang;
		}
		$total_call_agree = number_format( $data['tabeldata']['HALO+']['jumlah_call_agree']+$data['tabeldata']['P2P REGULER']['jumlah_call_agree']+$data['tabeldata']['P2P CROSS']['jumlah_call_agree'],2,".",".");
        $total_agent = $data['tabeldata']['HALO+']['jumlah_agent']+$data['tabeldata']['P2P REGULER']['jumlah_agent']+$data['tabeldata']['P2P CROSS']['jumlah_agent'];
    	$data['total_ppa'] = number_format( $total_call_agree / $total_agent ,2,".",".");
	
		$this->load->view('Komponen/header',$data);
		$this->load->view('Dashboard/v_dashboard',$data);
		$this->load->view('Komponen/footer');
	}

	public function tampil() {

	}

	public function rangeMonth($datestr) {
		date_default_timezone_set (date_default_timezone_get());
		$dt = strtotime ($datestr);
		return array (
		  "start" => date ('Y-m-d', strtotime ('first day of this month', $dt)),
		  "end" => date ('Y-m-d', strtotime ('last day of this month', $dt))
		);
	}
	 
	public function rangeWeek($datestr) {
		date_default_timezone_set (date_default_timezone_get());
		$dt = strtotime ($datestr);
		return array (
		  "start" => date ('N', $dt) == 1 ? date ('Y-m-d', $dt) : date ('Y-m-d', strtotime ('last sunday', $dt)),
		  "end" => date('N', $dt) == 7 ? date ('Y-m-d', $dt) : date ('Y-m-d', strtotime ('next saturday', $dt))
		);
	}
}

