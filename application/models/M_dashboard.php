<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	/*HALO+*/

	public function get_jml_agent_halo_plus()
	{
		$sql="SELECT sum(jumlah_agent) as jml_agent_halo_plus FROM app_tam_dashboard_halo where jenis='HALO+'";
		$result= $this->db->query($sql);
		return $result->row()->jml_agent_halo_plus;
	}
	public function get_jml_call_halo_plus()
	{
		$sql="SELECT sum(jumlah_call) as jml_call_halo_plus FROM app_tam_dashboard_halo where jenis='HALO+'";
		$result= $this->db->query($sql);
		return $result->row()->jml_call_halo_plus;
	}
	public function get_jml_call_contacted_halo_plus()
	{
		$sql="SELECT sum(jumlah_call_contacted) as jml_call_contacted_halo_plus FROM app_tam_dashboard_halo where jenis='HALO+'";
		$result= $this->db->query($sql);
		return $result->row()->jml_call_contacted_halo_plus;
	}
	public function get_jml_call_agree_halo_plus()
	{
		$sql="SELECT sum(jumlah_call_agree) as jml_call_agree_halo_plus FROM app_tam_dashboard_halo where jenis='HALO+'";
		$result= $this->db->query($sql);
		return $result->row()->jml_call_agree_halo_plus;
	}
	public function get_jml_revenue_halo_plus()
	{
		$sql="SELECT sum(jumlah_revenue) as jml_revenue_halo_plus FROM app_tam_dashboard_halo where jenis='HALO+'";
		$result= $this->db->query($sql);
		return $result->row()->jml_revenue_halo_plus;
	}
	public function get_jml_rpa_halo_plus()
	{
		$sql="SELECT sum(rpa) as jml_rpa_halo_plus FROM app_tam_dashboard_halo where jenis='HALO+'";
		$result= $this->db->query($sql);
		return $result->row()->jml_rpa_halo_plus;
	}
	public function get_jml_ppa_halo_plus()
	{
		$sql="SELECT sum(ppa) as jml_ppa_halo_plus FROM app_tam_dashboard_halo where jenis='HALO+'";
		$result= $this->db->query($sql);
		return $result->row()->jml_ppa_halo_plus;
	}


	/*P2P REGULER*/

	public function get_jml_agent_p2p_reguler()
	{
		$sql="SELECT sum(jumlah_agent) as jml_agent_p2p_reguler FROM app_tam_dashboard_halo where jenis='P2P REGULER'";
		$result= $this->db->query($sql);
		return $result->row()->jml_agent_p2p_reguler;
	}
	public function get_jml_call_p2p_reguler()
	{
		$sql="SELECT sum(jumlah_call) as jml_call_p2p_reguler FROM app_tam_dashboard_halo where jenis='P2P REGULER'";
		$result= $this->db->query($sql);
		return $result->row()->jml_call_p2p_reguler;
	}
	public function get_jml_call_contacted_p2p_reguler()
	{
		$sql="SELECT sum(jumlah_call_contacted) as jml_call_contacted_p2p_reguler FROM app_tam_dashboard_halo where jenis='P2P REGULER'";
		$result= $this->db->query($sql);
		return $result->row()->jml_call_contacted_p2p_reguler;
	}
	public function get_jml_call_agree_p2p_reguler()
	{
		$sql="SELECT sum(jumlah_call_agree) as jml_call_agree_p2p_reguler FROM app_tam_dashboard_halo where jenis='P2P REGULER'";
		$result= $this->db->query($sql);
		return $result->row()->jml_call_agree_p2p_reguler;
	}
	public function get_jml_revenue_p2p_reguler()
	{
		$sql="SELECT sum(jumlah_revenue) as jml_revenue_p2p_reguler FROM app_tam_dashboard_halo where jenis='P2P REGULER'";
		$result= $this->db->query($sql);
		return $result->row()->jml_revenue_p2p_reguler;
	}
	public function get_jml_rpa_p2p_reguler()
	{
		$sql="SELECT sum(rpa) as jml_rpa_p2p_reguler FROM app_tam_dashboard_halo where jenis='P2P REGULER'";
		$result= $this->db->query($sql);
		return $result->row()->jml_rpa_p2p_reguler;
	}
	public function get_jml_ppa_p2p_reguler()
	{
		$sql="SELECT sum(ppa) as jml_ppa_p2p_reguler FROM app_tam_dashboard_halo where jenis='P2P REGULER'";
		$result= $this->db->query($sql);
		return $result->row()->jml_ppa_p2p_reguler;
	}

	/*P2P CROSS*/

	public function get_jml_agent_p2p_cross()
	{
		$sql="SELECT sum(jumlah_agent) as jml_agent_p2p_cross FROM app_tam_dashboard_halo where jenis='P2P CROSS'";
		$result= $this->db->query($sql);
		return $result->row()->jml_agent_p2p_cross;
	}
	public function get_jml_call_p2p_cross()
	{
		$sql="SELECT sum(jumlah_call) as jml_call_p2p_cross FROM app_tam_dashboard_halo where jenis='P2P CROSS'";
		$result= $this->db->query($sql);
		return $result->row()->jml_call_p2p_cross;
	}
	public function get_jml_call_contacted_p2p_cross()
	{
		$sql="SELECT sum(jumlah_call_contacted) as jml_call_contacted_p2p_cross FROM app_tam_dashboard_halo where jenis='P2P CROSS'";
		$result= $this->db->query($sql);
		return $result->row()->jml_call_contacted_p2p_cross;
	}
	public function get_jml_call_agree_p2p_cross()
	{
		$sql="SELECT sum(jumlah_call_agree) as jml_call_agree_p2p_cross FROM app_tam_dashboard_halo where jenis='P2P CROSS'";
		$result= $this->db->query($sql);
		return $result->row()->jml_call_agree_p2p_cross;
	}
	public function get_jml_revenue_p2p_cross()
	{
		$sql="SELECT sum(jumlah_revenue) as jml_revenue_p2p_cross FROM app_tam_dashboard_halo where jenis='P2P CROSS'";
		$result= $this->db->query($sql);
		return $result->row()->jml_revenue_p2p_cross;
	}
	public function get_jml_rpa_p2p_cross()
	{
		$sql="SELECT sum(rpa) as jml_rpa_p2p_cross FROM app_tam_dashboard_halo where jenis='P2P CROSS'";
		$result= $this->db->query($sql);
		return $result->row()->jml_rpa_p2p_cross;
	}
	public function get_jml_ppa_p2p_cross()
	{
		$sql="SELECT sum(ppa) as jml_ppa_p2p_cross FROM app_tam_dashboard_halo where jenis='P2P CROSS'";
		$result= $this->db->query($sql);
		return $result->row()->jml_ppa_p2p_cross;
	}

	/*Total All*/

	public function get_sum_all_agent()
	{
		$sql="SELECT sum(jumlah_agent) as jml_sum_agent FROM app_tam_dashboard_halo";
		$result= $this->db->query($sql);
		return $result->row()->jml_sum_agent;
		$jmlagnt = $this->get_jml_agent_halo_plus;
		dst...
		$totsum = $jmlagnt + ... + ..;
	}
}

