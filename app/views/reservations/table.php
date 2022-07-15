<table>
	<thead>
		<tr>
			<th>ID #</th>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Delivery Address</th>
			<th>Container Type</th>
			<th>Quantity</th>
			<th>Delivery Date</th>
			<th>Delivery Time</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$count = 1; 
			if(count($data) > 0):
		?>
		<?php foreach ($data as $values):?>
		<tr>
			<td>R-<?=$count++?></td>
			<td><?=$values['name'];?></td>
			<td><?=$values['phoneNumber'];?></td>
			<td><?=$values['deliveryAddress'];?></td>
			<td><?=$values['containerType'];?></td>
			<td><?=$values['quantity'];?></td>
			<td><?=$values['deliveryDate'];?></td>
			<td><?=$values['deliveryTime'];?></td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
		<tr><td rowspan="8">No data to show</td></tr>
		<?php endif; ?>
	</tbody>
</table>
