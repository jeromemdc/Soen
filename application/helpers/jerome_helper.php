<?php
if(!function_exists('object_to_array')){
	function object_to_array($data)
	{
	    if (is_array($data) || is_object($data))
	    {
	        $result = array();
	        foreach ($data as $key => $value)
	        {
	            $result[$key] = object_to_array($value);
	        }
	        return $result;
	    }
	    return $data;
	}
}
if(!function_exists('array_column_manual')){
	function array_column_manual($array, $column)
	{
	    $newarr = array();
	    foreach ($array as $row) $newarr[] = $row[$column];
	    return $newarr;
	}
}


if(!function_exists('dropdown_categories')){
	function dropdown_categories($id=''){
		$CI =& get_instance();

		if($id){
			$cats = $CI->admin_model->get_all('categories',array('parent_id' => $id));
			$assoc = array();
		}else{
			$cats = $CI->admin_model->get_all('categories',array('parent_id' => 0));
			$assoc = array('0' => 'Select parent');
		}
		
		if($cats){
			foreach($cats as $cat){
				$assoc[$cat->cat_id] = $cat->cat_name;
			}
		}

		return $assoc;
	}
}

if(!function_exists('dropdown_collection')){
	function dropdown_collection(){
		$CI =& get_instance();

		$collections = $CI->admin_model->get_all('collections');
		$assoc = array('0' => 'Select Collection');
		
		if($collections){
			foreach($collections as $collection){
				$assoc[$collection->id] = $collection->name;
			}
		}

		return $assoc;
	}
}

if(!function_exists('all_categories')){
	function all_categories($id){
		$CI =& get_instance();
		$cats = $CI->admin_model->get_first('categories',array('cat_id' => $id));
		
		if($cats->parent_id == 0){
			$result = $cats->cat_name;
		}else{
			$x = $CI->admin_model->get_first('categories',array('cat_id' => $cats->parent_id));
			$result = $x->cat_name.' > '.$cats->cat_name;
		}

		return $result;
	}
}

if (!function_exists('alias_checker')){    
    function alias_checker($alias_text, $table, $field = '', $id = 0){
        $CI =& get_instance();

		$alias_text = strtolower(url_title(convert_accented_characters($alias_text)));

		if($id){
			$q_result = $CI->db->where($field.' !=', $id)->where('slug', $alias_text)->get($table)->result();
		}else{
			$q_result = $CI->db->like('slug', $alias_text, 'after')->get($table)->result();
		}
		
		if($q_result){
			$slug_counter = intval(count($q_result)) + 1;
			$return_alias = $alias_text.'-'.$slug_counter;
			return $return_alias;
		}else{
			return $alias_text;
		}

    }
}

if(!function_exists('img_thumb')){
	function img_thumb($data,$num){
		$size = array('big','med','small');
		$path_info = pathinfo($data);
		return $path_info['filename'].'_'.$size[$num].'.'.$path_info['extension'];
	}
}	

if(!function_exists('meta')){
	function meta($table, $field = '', $id = 0){

		$CI =& get_instance();

		if($id){
			$q_result = $CI->db->where($field, $id)->get($table)->row();
		}else{
			$q_result = $CI->db->get($table)->row();
		}

		if($table == 'categories'){
			$name = $q_result->cat_name;
		}else{
			$name = $q_result->name;
		}

		$meta = array(
			'title' => ($q_result->meta_title != '' ? $q_result->meta_title : $name),
			'description' => ($q_result->meta_description != '' ? $q_result->meta_description : $q_result->description),
			'keywords' => $q_result->meta_keywords,
		);

		return $meta;
	}
}


if(!function_exists('get_variation')){
	function get_variation($id){
		$CI =& get_instance();
		$variation = $CI->home_model->getVariation($id);

		if($variation->min_price != ''){
			$price = 'Php '.number_format($variation->min_price,2). ' - '.'Php '.number_format($variation->max_price,2);
		}else{
			$price = 'Php '.number_format($variation->price,2);
		}

		return $price;
	}
}
