<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class Rest extends REST_Controller
{
	public function parent_categories_get(){
        $data = $this->home_model->get_parent_categories();
        $this->response($data, 200);   
    }

    public function category_get($category){
        $subcategories = $this->home_model->get_categories($category);
        $category = $this->home_model->get_category($category);
        
        $meta = meta('categories','cat_id', $category->cat_id); 

        $result = array('subcategories' => $subcategories, 'category' => $category, 'meta' => $meta);
        $this->response($result, 200);      
    }

    public function subcategory_get($category,$subcategory){

        $products = $this->home_model->get_subcategories($category,$subcategory);
        $subcategory = $this->home_model->get_subcategory($category,$subcategory);
        $subcategories = $this->home_model->get_categories($category);
        $collections = $this->home_model->get_collections();
        $meta = meta('categories','cat_id', $subcategory->cat_id);
        $result = array('products' => $products, 'subcategories' => $subcategories, 'subcategory' => $subcategory, 'meta' => $meta, 'collections' => $collections);
        $this->response($result, 200);
    }

    public function product_get($category,$subcategory,$product){
        $category_result = $this->home_model->get_product_category($category,$subcategory,$product);
        $product_result = $this->home_model->get_product($category,$subcategory,$product);
        $related_products = $this->home_model->get_related_products($category,$subcategory,$product);
        $product_images = $this->home_model->get_product_images($product_result->pid);
        $images = array_column_manual($product_images,'image');
        $colors = $this->home_model->get_product_variation($product_result->pid,'color');
        $sizes = $this->home_model->get_product_variation($product_result->pid,'size');
        $subcategory = $this->home_model->get_category($subcategory);
        $meta = meta('products','pid', $product_result->pid); 
        $image = ($product_result->image == 'demo.png' ? $images[0] : $product_result->image);
        $subcategories = $this->home_model->get_categories($category);
        $collections = $this->home_model->get_collections();

        $jer = $this->home_model->get_product_images2($product_result->pid);

        $y = array();
        foreach ($jer as $key => $value) {
            $z = array('small' => base_url() .'uploads/img/' .$value->small, 'large' => base_url() .'uploads/img/' .$value->large);
            array_push($y, $z);
        }
        
        $result = array(
            'product' => $product_result,
            'related_products' => $related_products,
            'subcategory' => $subcategory, 
            'category' => $category_result, 
            'product_images2' => $y, 
            'meta' => $meta,
            'image' => $image,
            'subcategories' => $subcategories,
            'collections' => $collections,
        );

        $this->response($result, 200);
    }

    public function home_get(){
        $seller = $this->home_model->get_bestseller();
        $meta = meta('pages','id', 1); 
        $result = array('seller' => $seller, 'meta' => $meta);
        $this->response($result, 200); 
    }

    public function about_get(){
        $meta = meta('pages','id', 2); 
        $result = array('meta' => $meta);
        $this->response($result, 200); 
    }

    public function collection_get($slug){
        $collections = $this->home_model->get_collections();
        $collection = $this->home_model->get_collection_slug($slug);
        $products = $this->home_model->get_product_collection($collection->id);

        $result = array('collections' => $collections, 'collection' => $collection, 'products' => $products);
        $this->response($result, 200);   
    }

    public function search_get($slug){
        $collections = $this->home_model->get_collections();
        $products = $this->home_model->get_products_search($slug);

        $result = array('collections' => $collections, 'products' => $products);
        $this->response($result, 200);
    }
}