<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blood_model extends CI_Model {
	function insertTableData($table, $data){
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() > 0) ? True : False;
	}

	function getDataMultipleCheck($table, $selArr, $check){
	    $query  = $this->db->select(implode(',', $selArr))->from($table)->where($check)->get();
	    foreach ($query->result() as $value){
	        return $value;
        }
    }

    function tableSingleDataCheck($table, $sel, $field, $val){
	    $query = $this->db->select($sel)->from($table)->where($field, $val)->get();
	    foreach ($query->result() as $value){
	        return $value;
        }
    }

    function tableMultipleDataCheck($table, $selArr, $chckArr){
	    $query  = $this->db->select(implode(",", $selArr))->from($table)->where($chckArr)->get();
	    foreach ($query->result() as $value){
	        return $value;
        }
    }

    function tableMultipleDataMultipleCheck($table, $selArr, $chckArr){
        $query  = $this->db->select(implode(",", $selArr))->from($table)->where($chckArr)->get();
        return $query->result();
    }

    function tableMultipleDataMultipleCheckOrderBY($table, $selArr, $chckArr, $ordVal, $ordType){
        $query  = $this->db->select(implode(",", $selArr))->from($table)->where($chckArr)->order_by($ordVal, $ordType)->get();
        return $query->result();
    }

    function updateDataSingleTable($table, $updArr, $field, $value){
	    $this->db->where($field, $value);
	    $this->db->update($table, $updArr);
	    return ($this->db->affected_rows() > 0) ? True : False;
    }

    function updateTableInfoCheck($table, $updArr, $chkArr){
        $this->db->where($chkArr);
        $this->db->update($table, $updArr);
        return ($this->db->affected_rows() > 0) ? True : False;
    }

    function getAllDataSingleTable($table){
	    $query  = $this->db->select('*')->from($table)->where('status', '1')->get();
	    return $query->result();
    }

    function getDetailsByID($table, $selcArr, $field, $val){
	    $query  = $this->db->select(implode(',', $selcArr))->from($table)->where($field, $val)->get();
	    foreach ($query->result() as $value){
	        return $value;
        }
    }

    function uniqeDataGet($table, $selc, $checkArr){
        $query  = $this->db->select($selc)->from($table)->where($checkArr)->get();
        foreach ($query->result() as $value){
            return $value->$selc;
        }
    }

    function getDataByTableQuery($query){
	    $query = $this->db->query($query);
	    return $query->result();
    }
}
