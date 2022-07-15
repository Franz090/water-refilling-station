<?php 
ob_start();
error_reporting(E_ALL);

class Reservations_Model extends Model
{
	public function fetch($params)
	{
		$sort_by = isset($params['sort_by']) ? $params['sort_by'] : "r.deliveryDate";
		$order_by = isset($params['sort_order']) ? $params['sort_order'] : 'DESC';
		$limit = isset($params['limit_per_page']) ? $params['limit_per_page'] : '10';
		$keyword = isset($params['keyword']) ? $params['keyword'] : '';
		$wildcard = ($keyword != '') ? "AND name LIKE '%{$keyword}%'" : '';

		$querystr = "SELECT c.orderID, c.name, c.phoneNumber, c.deliveryAddress, p.containerType, c.quantity,r.deliveryDate,r.deliveryTime FROM customer_orders AS c 
			LEFT JOIN reservations AS r ON c.orderID = r.orderID 
			LEFT JOIN products AS p ON c.productID = p.productID 
			WHERE c.orderType = 'for_reservation' AND c.status != 'completed' {$wildcard} ORDER BY {$sort_by} {$order_by} LIMIT {$limit}";
			
		$querydata = $this->db->select($querystr);
		return $querydata;
	}
	public function updateStatus()
	{
		$curdate = date("Y-m-d");

		$querystr = "SELECT c.orderID,DATE_FORMAT(r.deliveryDate, '%Y-%m-%d') AS deliveryDate FROM customer_orders AS c 
			LEFT JOIN reservations AS r ON c.orderID = r.orderID 
			WHERE c.orderType = 'for_reservation' AND c.status != 'completed'";
			
		$querydata = $this->db->select($querystr);

		if(count($querydata) > 0){
			foreach ($querydata as $row) {
				if($row['deliveryDate'] == $curdate){

					$value = [
						'orderType' => 'for_delivery'
					];

					$this->db->update('customer_orders', $value, "`orderID` = '{$row['orderID']}'");
				}
			}
		}
	}
}

ob_end_flush();