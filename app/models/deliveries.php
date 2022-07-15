<?php 
ob_start();
error_reporting(E_ALL);

class Deliveries_Model extends Model
{
	public function fetch($params)
	{
		$status = (isset($params['sort_status']) && $params['sort_status'] != 'all') ? 
		"AND c.status = '{$params['sort_status']}'" : 
		"AND c.status NOT IN('completed','cancelled')";

		$order_by = isset($params['sort_order']) ? $params['sort_order'] : 'DESC';
		$limit = isset($params['limit_per_page']) ? $params['limit_per_page'] : '10';
		$keyword = isset($params['keyword']) ? $params['keyword'] : '';
		$wildcard = ($keyword != '') ? "AND name LIKE '%{$keyword}%'" : '';

		$querystr = "SELECT c.orderID, c.name, c.phoneNumber, c.deliveryAddress, p.containerType, c.quantity,c.status,d.deliveryTime FROM customer_orders AS c 
			LEFT JOIN deliveries AS d ON c.orderID = d.orderID 
			LEFT JOIN products AS p ON c.productID = p.productID 
			WHERE c.orderType = 'for_delivery' {$status} {$wildcard} ORDER BY dateRequested {$order_by} LIMIT {$limit}";
			
		$querydata = $this->db->select($querystr);
		return $querydata;
	}
	public function changeStatus($params,$validate)
	{
		if( $params['status'] != 'completed' && 
			$params['status'] != 'cancelled'){
			$value1 = [
				'status' => $validate->input($params['status'])
			];

			$this->db->update('customer_orders', $value1, "`orderID` = '{$params['orderID']}'");
		}
		else{
			$value2 = [
				'status' => $params['status'],
				'dateDelivered' => CURDATE
			];

			$this->db->update('customer_orders', $value2, "`orderID` = '{$params['orderID']}'");
		}
	}
	public function updateOrderInfo($params)
	{
		$values = [
			'status' => $validate->input($params['status'])
		];

		$this->db->update('customer_orders', $values, "`orderID` = '{$params['orderID']}'");
	}
}

ob_end_flush();