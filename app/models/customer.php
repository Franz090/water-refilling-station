<?php 
ob_start();
error_reporting(E_ALL);

class Customer_Model extends Model
{
	public function productList()
	{
		$querystr = "SELECT * FROM products";
		$querydata = $this->db->select($querystr);
		return $querydata;
	}
	public function createOrder($params,$validate)
	{
		$address = "{$params['detailed_address']}, {$params['barangay']}, 
					{$params['city']}, {$params['province']}, {$params['region']}";

		$values = [
			'name' => $validate->input($params['name']),
			'phoneNumber' => $validate->input($params['phone_number']),
			'deliveryAddress' => $address,
			'productID' => $validate->input($params['productID']),
			'accountId' => $_SESSION['account_info']['accountId'],
			'quantity' => $validate->input($params['quantity']),
			'orderType' => $validate->input($params['order_type']),
			'status' => 'pending',
			'dateRequested' => CURDATE
		];

		$orderID = $this->db->insert('customer_orders', $values);

		if($params['order_type'] == 'for_delivery'){
			$this->db->insert('deliveries', [
				'deliveryTime' => $validate->input($params['deliveryTime']),
				'orderID' => $orderID
			]);
		}else{
			$this->db->insert('reservations', [
				'deliveryDate' => $validate->input($params['deliveryDate']),
				'deliveryTime' => $validate->input($params['deliveryTime']),
				'orderID' => $orderID
			]);
		}
	}
	public function transactionHistory()
	{
		$value = ['accountId' => $_SESSION['account_info']['accountId']];

		$querystr = "SELECT c.name,c.phoneNumber,c.deliveryAddress,c.status,
		c.dateRequested,c.dateDelivered,p.containerType,p.price FROM
    	customer_orders AS c
        LEFT JOIN products AS p ON c.productID = p.productID
        LEFT JOIN accounts a ON a.accountId = c.accountId
		WHERE a.accountId = :accountId";

		$querydata = $this->db->select($querystr,$value);
		return $querydata;
	}
}

ob_end_flush();