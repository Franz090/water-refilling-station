<?php require_once 'nav.php'; ?>

<div class="d-flex flex-column" id="transaction-history">
	<div class="d-flex table-panel">
		<table>
			<thead>
				<tr>
					<th>ID #</th>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Delivery Address</th>
					<th>Status</th>
					<th>Date Requested</th>
					<th>Date Delivered</th>
					<th>Container Type</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count = 1; 
					if(count($data) > 0):
				?>
				<?php foreach ($data['txns_history'] as $values):?>
				<tr>
					<td><?=$count++;?></td>
					<td><?=$values['name'];?></td>
					<td><?=$values['phoneNumber'];?></td>
					<td><?=$values['deliveryAddress'];?></td>
					<td><?=$values['status'];?></td>
					<td><?=$values['dateRequested'];?></td>
					<td><?=$values['dateDelivered'];?></td>
					<td><?=$values['containerType'];?></td>
					<td>PHP <?=$values['price'];?></td>
				</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr><td rowspan="10">No data to show</td></tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>