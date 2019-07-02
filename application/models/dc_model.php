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
    public function newDc($nor,$no,$item_changes,$line,$nor_plan_imp)
    {
        $data = array(
            'nor'               =>$nor,
            'no'                =>$no,
            'line'              =>$line,
            'item_changes'      =>$item_changes,
            'nor_plan_imp'         =>$nor_plan_imp,
            'nor_act_imp'         =>"0000-00-00",
        );

        return $this->db->insert('nor', $data);
    }


    public function updateDc($id,$nor,$no,$item_changes,$line,$nor_plan_imp,$nor_act_imp)
    {

        $data = array(
            'nor'               =>$nor,
            'no'                =>$no,
            'line'              =>$line,
            'item_changes'      =>$item_changes,
            'nor_plan_imp'         =>$nor_plan_imp,
            'nor_act_imp'         =>$nor_act_imp,
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
        $query = $this->db->query("SELECT * FROM nor WHERE month(nor_plan_imp)=month(curdate()) and year(nor_plan_imp)=year(curdate()) order by nor_plan_imp ASC");
        return $query->result();
    }

    public function get_dc_sched($month,$years)
    {
        $query = $this->db->query("SELECT * FROM nor WHERE month(nor_plan_imp)=".$month." AND year(nor_plan_imp)=".$years." order by nor_plan_imp ASC");
        return $query->result();
    }

    /*============================ END DESIGN CHANGE ============================*/

    /*============================ ACTIVITY ============================*/

    public function newactivity($data)
    {
        return $this->db->insert_batch('activity', $data);
    }


    public function updateactivity($id,$nama_act,$ak_plan_imp,$ak_act_imp,$nama_dvs,$nor,$no)
    {
        if($ak_act_imp==null&&$ak_plan_imp==null){
            // $ak_act_imp="0000-00-00";
            $data = array(
                'nama_act'                  =>$nama_act,
                'nama_dvs'                  =>$nama_dvs,
                'nor'                       =>$nor,
                'no'                        =>$no,
            );
        }else if($ak_act_imp==null){
            $data = array(
                'nama_act'                  =>$nama_act,
                'nama_dvs'                  =>$nama_dvs,
                'ak_plan_imp'                 =>$ak_plan_imp,
                'nor'                       =>$nor,
                'no'                        =>$no,
            );
        }else if($ak_plan_imp==null){
            $data = array(
                'nama_act'                  =>$nama_act,
                'nama_dvs'                  =>$nama_dvs,
                'ak_act_imp'               =>$ak_act_imp,
                'nor'                       =>$nor,
                'no'                        =>$no,
            );    
        }else{
            $data = array(
                'nama_act'                  =>$nama_act,
                'nama_dvs'                  =>$nama_dvs,
                'ak_plan_imp'                 =>$ak_plan_imp,
                'ak_act_imp'               =>$ak_act_imp,
                'nor'                       =>$nor,
                'no'                        =>$no,
            );
        }


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
        $query = $this->db->query("SELECT * FROM activity WHERE month(ak_plan_imp)=month(curdate()) and year(ak_plan_imp)=year(curdate()) order by ak_plan_imp ASC");
        return $query->result();
    }

    public function get_activity_sched($month,$years)
    {
        $query = $this->db->query("SELECT * FROM activity WHERE month(ak_plan_imp)=".$month." AND year(ak_plan_imp)=".$years." order by ak_plan_imp ASC");
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
        $query = $this->db->query("SELECT * FROM nor WHERE day(nor_plan_imp)=".$day." AND month(nor_plan_imp)=".$month." AND year(nor_plan_imp)=".$years." order by nor_plan_imp ASC");
        return $query->result();
    }

    public function get_activity_sched_user($day,$month,$years)
    {
        $query = $this->db->query("SELECT * FROM activity as a inner join nor as n on n.nor=a.nor and n.no=a.no WHERE day(ak_plan_imp)=".$day." AND month(ak_plan_imp)=".$month." AND year(ak_plan_imp)=".$years." order by ak_plan_imp ASC");
        return $query->result();
    }

    public function get_count_line($day,$month,$years)
    {
        $query = $this->db->query("SELECT DISTINCT line FROM nor WHERE day(nor_plan_imp)=".$day." AND month(nor_plan_imp)=".$month." AND year(nor_plan_imp)=".$years);
        return $query->result();
    }

    public function get_count_line_month($month)
    {
        $this->db->select('day(nor_plan_imp) as tgl,count(distinct(line)) as jml');
        $this->db->from('nor');
        $this->db->where('month(nor_plan_imp)',$month);
        $this->db->group_by('day(nor_plan_imp)');
        $query = $this->db->get();
    
        return $query->result();
    }


    /*============================ ACTIVITY ============================*/


    /*============================ section ============================*/
    public function get_activity_section($month,$years,$section)
    {
        $query = $this->db->query("SELECT *,a.id as idact FROM activity as a inner join nor as n on n.nor=a.nor and n.no=a.no WHERE month(ak_plan_imp)=".$month." AND year(ak_plan_imp)=".$years." AND nama_dvs='".$section."' order by ak_plan_imp ASC");
        return $query->result();
    }

    public function get_act_line_month($month,$years,$section)
    {
        $this->db->select('day(ak_plan_imp) as tgl, count(id) as jml');
        $this->db->from('activity');
        $this->db->where('month(ak_plan_imp)',$month);
        $this->db->where('year(ak_plan_imp)',$years);
        $this->db->where('nama_dvs',$section);
        $this->db->group_by('day(ak_plan_imp)');
        $query = $this->db->get();
    
        return $query->result();
    }

    public function updateSection($id,$ak_act_imp)
    {
            $data = array(
                'ak_act_imp'                  =>$ak_act_imp,
                
            );


        $this->db->where('id', $id);
        $result=$this->db->update('activity', $data);
        return $result;
    }

}