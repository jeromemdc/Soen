<?php
class home_model extends CI_Model {

	function get_categories($category){

		$cat = $this->db->where('parent_id', 0)->where('slug', $category)->get('categories')->row();

		return $this->db
			->select('cat_name,slug,image')
			->where('parent_id', $cat->cat_id)
			->order_by('sorting', 'asc')
			->get('categories')
			->result();
	}

	function get_category($category){
		return $this->db
			->where('slug', $category)
			->get('categories')
			->row();
	}

	function get_parent_categories(){
		return $this->db
			->where('parent_id', 0)
			->get('categories')
			->result();
	}

	function get_subcategory($category, $subcategory){
		return $this->db
			->select('c1.cat_name AS cat_name1, c1.slug AS cat_slug1, c1.logo AS banner, c2.*')
			->join('categories AS c2', 'c1.cat_id = c2.parent_id', 'left')
			->where('c1.slug', $category)
			->where('c2.slug', $subcategory)
	 		->get('categories AS c1')
			->row();
	}

	function get_subcategories($category, $subcategory){

		$cat = $this->db->where('parent_id', 0)->where('slug', $category)->get('categories')->row();
		$sub = $this->db->where('parent_id', $cat->cat_id)->where('slug', $subcategory)->get('categories')->row();
		
		return $this->db
			->where('cat_id', $cat->cat_id)
			->where('sub_id', $sub->cat_id)
			->where('status', 1)
			->get('products')
			->result();

	}

	function get_product($category, $subcategory, $product){

		$cat = $this->db->where('parent_id', 0)->where('slug', $category)->get('categories')->row();
		$sub = $this->db->where('parent_id', $cat->cat_id)->where('slug', $subcategory)->get('categories')->row();
		
		return $this->db
			->where('cat_id', $cat->cat_id)
			->where('sub_id', $sub->cat_id)
			->where('slug', $product)
			->where('status', 1)
			->get('products')
			->row();
	}

	function get_related_products($category, $subcategory, $product){

		$cat = $this->db->where('parent_id', 0)->where('slug', $category)->get('categories')->row();
		$sub = $this->db->where('parent_id', $cat->cat_id)->where('slug', $subcategory)->get('categories')->row();
		
		return $this->db
			->select('name,slug,image')
			->where('cat_id', $cat->cat_id)
			->where('sub_id', $sub->cat_id)
			->where('slug !=', $product)
			->where('status', 1)
			->order_by('rand()')
			->limit(4)
			->get('products')
			->result();
	}

	function get_product_images($id){
		return $this->db
			->select('image')
			->where('pid',$id)
	 		->get('products_image')
			->result_array();	
	}

	function get_product_variation($id,$type){
		return $this->db
			->where('pid',$id)
			->where('type',$type)
	 		->get('products_variation')
			->result();	
	}

	function get_bestseller(){
		return $this->db
			->select('p.name AS prod_name, p.slug AS prod_slug, p.image AS prod_image, c1.cat_name AS cat_name1, c1.slug AS cat_slug1, c2.cat_name AS cat_name2, c2.slug AS cat_slug2')
			->join('categories AS c1', 'p.cat_id = c1.cat_id', 'left')
			->join('categories AS c2', 'p.sub_id = c2.cat_id', 'left')
			->where('bestseller', 1)
			->where('status', 1)
			->order_by('rand()')
			->limit(4)
	 		->get('products AS p')
			->result();
	}

	function get_product_category($category, $subcategory, $product){
		return $this->db
			->select('p.name AS prod_name, p.slug AS prod_slug, p.image AS prod_image, c1.cat_name AS cat_name1, c1.slug AS cat_slug1, c2.cat_name AS cat_name2, c2.slug AS cat_slug2')
			->join('categories AS c1', 'p.cat_id = c1.cat_id', 'left')
			->join('categories AS c2', 'p.sub_id = c2.cat_id', 'left')
			->where('c1.slug', $category)
			->where('c2.slug', $subcategory)
			->where('p.slug', $product)
			->where('p.status', 1)
	 		->get('products AS p')
			->row();
	}

	function get_collections(){
		return $this->db
			->select('id, name, slug')
			->order_by('name', 'asc')
			->get('collections')
			->result();
	}

	function get_collection_slug($slug){
		return $this->db
			->where('slug',$slug)
			->get('collections')
			->row();
	}

	function get_product_collection($id){
		return $this->db
			->select('p.name AS prod_name, p.slug AS prod_slug, p.image AS prod_image, c1.cat_name AS cat_name1, c1.slug AS cat_slug1, c2.cat_name AS cat_name2, c2.slug AS cat_slug2')
			->join('categories AS c1', 'p.cat_id = c1.cat_id', 'left')
			->join('categories AS c2', 'p.sub_id = c2.cat_id', 'left')
			->where('status', 1)
			->where('collection', $id)
			->order_by('name', 'asc')
			->get('products as p')
			->result();
	}

	function get_product_images2($id){
		return $this->db
			->select('image AS small, image AS large')
			->where('pid',$id)
			->order_by('sorting', 'asc')
	 		->get('products_image')
			->result();	
	}

	function get_products_search($slug){		
		return $this->db
			->select('p.name AS prod_name, p.slug AS prod_slug, p.image AS prod_image, c1.cat_name AS cat_name1, c1.slug AS cat_slug1, c2.cat_name AS cat_name2, c2.slug AS cat_slug2')
			->join('categories AS c1', 'p.cat_id = c1.cat_id', 'left')
			->join('categories AS c2', 'p.sub_id = c2.cat_id', 'left')
			->where('status', 1)
			->like('name', $slug)
			->get('products as p')
			->result();
	}
}

