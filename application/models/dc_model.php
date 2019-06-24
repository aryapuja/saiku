<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_Model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

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


    // public function generate_dropdown()
    // {
    //     $this->db->select('level.id, level.nama');
    //     $this->db->order_by('nama');

    //     $result = $this->db->get('level');

    //     $dropdown[''] = 'Pilih Agenda';

    //     if($result->num_row()>0){
    //         foreach ($$result->result_array() as $row) {
    //             $dropdown[$row['id']] = $row['nama'];
    //         }
    //     }
    //     return $dropdown;
    // }

    // public function get_all_level()
    // {
    //     $query = $this->db->get('level');
    //     return $query->result();
    // }

    // public function get_level_by_id($id)
    // {
    //     $query = $this->db->get_where('level', array('id' => $id));
    //     return $query->row();
    // }

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

}