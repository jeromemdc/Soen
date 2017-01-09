<?php 

class Admin_model extends CI_Model {

    function __construct(){ 
        parent::__construct();
    }

	function get_products(){
		return $this->db
			->select('products.*, categories.*, products.image AS image')
			->join('categories', 'products.cat_id = categories.cat_id', 'left')
			->where('status', 1)
	 		->get('products')
			->result();
	}

	function get_all($table, $where = array(), $ordering = array()){
        if(!empty($where) && $where != NULL){
            $this->db->where($where);
        }

        if(!empty($ordering) && $ordering != NULL){
            $this->db->order_by($ordering);
        }

        return $this->db->get($table)->result();
    }

    function get_first($table, $where = array(), $ordering = array()){
        if(!empty($where) && $where != NULL){
            $this->db->where($where);
        }

        if(!empty($ordering) && $ordering != NULL){
            $this->db->order_by($ordering);
        }

        return $this->db->get($table)->row();
    }

	function insert_database($to_insert,$table){
		return $this->db
	 		->insert($table,$to_insert);
	}

	function update_database($to_update,$id,$table,$where){
		return $this->db
			->where($where,$id)
	 		->update($table,$to_update);
	}

	function delete_database($id,$table,$where){
		return $this->db
			->where($where,$id)
	 		->delete($table);
	}

	// FOR DATATABLES REORDERING
	function ordering($data,$table,$idname){

		$id = $data['id'];
		$fromPosition = $data['fromPosition'];
		$toPosition = $data['toPosition'];
		$direction = $data['direction'];
		$aPosition = ($direction === "back") ? $toPosition+1 : $toPosition-1;

		$this->db->where('sorting',$toPosition)->update($table ,array('sorting' => 0));
		$this->db->where($idname,$id)->update($table ,array('sorting' => $toPosition));

		if($direction === "back") {
    		$x = $this->db
				->select('sorting')
				->where('sorting <',$fromPosition)
				->where('sorting >',$toPosition)
				->where($idname.' !=', $id)
				->where('sorting !=', 0)
				->order_by('sorting', 'DESC')
	 			->get($table)
				->result();

			foreach ($x as $value) {
				$this->db
					->where('sorting',$value->sorting)
					->update($table ,array('sorting' => $value->sorting + 1));
			}
    		        
		}else{
			$x = $this->db
				->select('sorting')
				->where('sorting <',$toPosition)
				->where('sorting >',$fromPosition)
				->where($idname.' !=', $id)
				->where('sorting !=', 0)
				->order_by('sorting', 'ASC')
	 			->get($table)
				->result();

			foreach ($x as $value) {
				$this->db
					->where('sorting',$value->sorting)
					->update($table, array('sorting' => $value->sorting - 1));
			}
		}

		return $this->db->where('sorting',0)->update($table ,array('sorting' => $aPosition));
	}

	function get_maxorder($table){
		$max = $this->db->select_max('sorting')->get($table)->row();
		return $max->sorting;			
	}
    
}
?>