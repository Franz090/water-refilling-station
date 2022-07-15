<?php 
ob_start();
error_reporting(E_ALL);

class Dashboard_Model extends Model
{
	public function countDeliveries($param)
	{
		$value = ['status' => $param['status']];
		$querystr = "SELECT COUNT(*) AS count FROM customer_orders WHERE orderType = 'for_delivery' AND status = :status";
		$querydata = $this->db->select($querystr,$value);
		return $querydata[0]['count'];
	}
	public function countReservations($param)
	{
		$value = ['status' => $param['status']];
		$querystr = "SELECT COUNT(*) AS count FROM customer_orders WHERE orderType = 'for_reservation' AND status = :status";
		$querydata = $this->db->select($querystr,$value);
		return $querydata[0]['count'];
	}
	public function currMonthComparisons()
	{
		$querystr = "SELECT * FROM products WHERE MONTH(order_date)=MONTH(now()) AND YEAR(order_date)=YEAR(now()) GROUP BY container_type";
		$querydata = $this->db->select($querystr);
		return $querydata;
	}
	public function lastFiveMonthComparisons()
	{
		$today = date('Y-m-d');
		$six_mos_from_now = date('Y-m-d', strtotime("-5 month"));

		$querystr = "SELECT 
				    YEAR(dateDelivered) AS years,
				    MONTHNAME(dateDelivered) AS months,
				    SUM(CASE
				        WHEN txn_status = 'FULFILL' THEN amount
				        ELSE 0
				    END) AS sales,
				    COUNT(CASE
				        WHEN txn_status = 'FULFILL' THEN 1
				    END) AS count_of_sales,
				    COUNT(CASE
				        WHEN card_type = 'visa' THEN 1
				    END) AS visa,
				    COUNT(CASE
				        WHEN card_type = 'mastercard' THEN 1
				    END) AS mastercard,
				    COUNT(*) AS total_txn
				FROM
				    transactions txn
					{$join}
				WHERE
				    {$where}
				        AND SUBSTR(dateDelivered, 1, 10) BETWEEN '{$six_mos_from_now}' AND '{$today}'
				GROUP BY YEAR(dateDelivered) , MONTH(dateDelivered)
				ORDER BY YEAR(dateDelivered) , MONTH(dateDelivered)";
		$querydata = $this->db->select($querystr);
		return $querydata;
	}
	// public function fetch()
	// {
	// 	$querystr = "SELECT c.orderID, c.name, c.phoneNumber, c.deliveryAddress, p.containerType, c.quantity,c.status,d.deliveryTime FROM customer_orders AS c 
	// 		LEFT JOIN deliveries AS d ON c.orderID = d.orderID 
	// 		LEFT JOIN products AS p ON c.productID = p.productID 
	// 		WHERE c.orderType = 'for_delivery' AND c.status != 'completed'";
			
	// 	$querydata = $this->db->select($querystr);
	// 	return $querydata;
	// }
}

ob_end_flush();