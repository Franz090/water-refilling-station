<table>
	<thead>
		<tr>
			<th>ID #</th>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Delivery Address</th>
			<th>Container Type</th>
			<th>Quantity</th>
			<th>Date Purchased</th>
			<th>Date Delivered</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$count = 1; 
			if(count($data) > 0):
		?>
		<?php foreach ($data as $values):?>
		<tr>
			<td>T-<?=$count++?></td>
			<td><?=$values['name'];?></td>
			<td><?=$values['phoneNumber'];?></td>
			<td><?=$values['deliveryAddress'];?></td>
			<td><?=$values['containerType'];?></td>
			<td><?=$values['quantity'];?></td>
			<td><?=$values['dateRequested'];?></td>
			<td><?=$values['dateDelivered'];?></td>
			<td>
			<?php if($values['status'] == 'completed'): ?>
				<span style="color:rgb(2, 117, 2);font-weight: bold"><?=ucfirst($values['status']);?></span>
			<?php else: ?>
				<span style="color:red;font-weight: bold"><?=ucfirst($values['status']);?></span>
			<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
		<tr><td rowspan="9">No data to show</td></tr>
		<?php endif; ?>
	</tbody>
</table>