<?php 
ob_start();
error_reporting(E_ALL);

class Products_Model extends Model
{
	public function create($params,$validate)
	{
		$values = [
			'containerType' => $params['container_type'],
			'price' => $params['price'],
			'image' => $params['image'],
			'dateAdded' => CURDATE
		];

		$id = $this->db->insert('products', $values);

		return $id;
	}
	public function fetch()
	{
		$querystr = "SELECT * FROM products ORDER BY dateAdded DESC";
		$querydata = $this->db->select($querystr);
		return $querydata;
	}
	public function remove($params)
	{
		$this->db->delete('products',"`productID` = '{$params['productID']}'");
	}
	public function addNewProduct($params)
	{
		$curdate = date("Ymd");
		$base = $_SERVER["DOCUMENT_ROOT"]."/water-refilling-station/app/uploads/";

        $files = $_FILES['image'];

        if (!file_exists($base)) {
            mkdir($base);
        }

        if($files['error'] == UPLOAD_ERR_OK)
        {
            $name = $curdate.'-'.$files['name'];
            $temp = $files['tmp_name'];
            $size= ($files['size'] / 1000)."Kb";
            move_uploaded_file($temp, $base . $name);

            $values = [
            	'containerType' => $params['container_type'],
                'image'=> $name,
                'price' => $params['price'],
                'dateAdded' => CURDATE
            ];

            $this->db->insert('products',$values);
        }
        else{Response::output(7);}
	}
}

ob_end_flush();