<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_Model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

    /*============================ LOGIN ============================*/
    public function login($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user');
    }
    /*============================ END LOGIN ============================*/

    /*============================ DESIGN CHANGE ============================*/
    public function newDc($nor,$no,$item_changes,$line,$date_plan)
    {
        $data = array(
            'nor'               =>$nor,
            'no'                =>$no,
            'line'              =>$line,
            'item_changes'      =>$item_changes,
            'date_plan'         =>$date_plan,
        );

        return $this->db->insert('nor', $data);
    }


    public function updateDc($id,$nor,$no,$line,$item_changes,$date_plan)
    {

        $data = array(
            'nor'               =>$nor,
            'no'                =>$no,
            'line'              =>$line,
            'item_changes'      =>$item_changes,
            'date_plan'         =>$date_plan,
        );

        $this->db->where('id', $id);
        $result=$this->db->update('nor', $data);
        return $result;
    }


    public function deleteDc()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result = $this->db->delete('nor');
        return $result;
    }


    public function get_dc()
    {
        $query = $this->db->query("SELECT * FROM nor WHERE month(date_plan)=month(curdate()) and year(date_plan)=year(curdate()) order by date_plan ASC");
        return $query->result();
    }

    public function get_dc_sched($month,$years)
    {
        $query = $this->db->query("SELECT * FROM nor WHERE month(date_plan)=".$month." AND year(date_plan)=".$years." order by date_plan ASC");
        return $query->result();
    }

    /*============================ END DESIGN CHANGE ============================*/

    /*============================ ACTIVITY ============================*/

    public function newactivity($data)
    {
        return $this->db->insert_batch('activity', $data);
    }


    public function updateactivity($id,$nama_act,$plan_date,$plan_actual,$nama_dvs,$nor,$no)
    {

        $data = array(
            'nama_act'                  =>$nama_act,
            'date_plan'                 =>$plan_date,
            'date_actual'               =>$plan_actual,
            'nama_dvs'                  =>$nama_dvs,
            'nor'                       =>$nor,
            'no'                        =>$no,
        );

        $this->db->where('id', $id);
        $result=$this->db->update('activity', $data);
        return $result;
    }


    public function deleteactivity()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result = $this->db->delete('activity');
        return $result;
    }


    public function get_activity()
    {
        $query = $this->db->query("SELECT * FROM activity WHERE month(date_plan)=month(curdate()) and year(date_plan)=year(curdate()) order by date_plan ASC");
        return $query->result();
    }

    public function get_activity_sched($month,$years)
    {
        $query = $this->db->query("SELECT * FROM activity WHERE month(date_plan)=".$month." AND year(date_plan)=".$years." order by date_plan ASC");
        return $query->result();
    }

    public function get_nor()
    {
        $query = $this->db->query("SELECT DISTINCT nor FROM nor");
        return $query->result();
    }

    public function get_no()
    {
        $query = $this->db->query("SELECT DISTINCT no,nor FROM nor");
        return $query->result();
    }

    public function get_dc_sched_user($day,$month,$years)
    {
        $query = $this->db->query("SELECT * FROM nor WHERE day(date_plan)=".$day." AND month(date_plan)=".$month." AND year(date_plan)=".$years." order by date_plan ASC");
        return $query->result();
    }

    public function get_activity_sched_user($day,$month,$years)
    {
        $query = $this->db->query("SELECT * FROM activity WHERE day(date_plan)=".$day." AND month(date_plan)=".$month." AND year(date_plan)=".$years." order by date_plan ASC");
        return $query->result();
    }

    public function get_count_line($day,$month,$years)
    {
        $query = $this->db->query("SELECT DISTINCT 'line' FROM nor WHERE day(date_plan)=".$day." AND month(date_plan)=".$month." AND year(date_plan)=".$years);
        return $query->num_rows();
    }


    /*============================ ACTIVITY ============================*/

}