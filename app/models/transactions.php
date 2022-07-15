<?php 
ob_start();
error_reporting(E_ALL);

class Transactions_Model extends Model
{
	public function fetch($params)
	{
		$status = (isset($params['sort_status']) && $params['sort_status'] != 'all') ? 
		"c.status = '{$params['sort_status']}'" : 
		"c.status IN('completed', 'cancelled')";

		$order_by = isset($params['sort_order']) ? $params['sort_order'] : 'DESC';
		$limit = isset($params['limit_per_page']) ? $params['limit_per_page'] : '10';
		$keyword = isset($params['keyword']) ? $params['keyword'] : '';
		$wildcard = ($keyword != '') ? "AND name LIKE '%{$keyword}%'" : '';

		$querystr = "SELECT c.orderID, c.name, c.phoneNumber, c.deliveryAddress, p.containerType, c.quantity,c.dateRequested,c.dateDelivered,c.status FROM customer_orders AS c 
			LEFT JOIN deliveries AS d ON c.orderID = d.orderID 
			LEFT JOIN products AS p ON c.productID = p.productID 
			WHERE {$status} {$wildcard} ORDER BY c.dateDelivered {$order_by} LIMIT {$limit}";
			
		$querydata = $this->db->select($querystr);
		return $querydata;
	}
}

ob_end_flush();