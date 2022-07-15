<table>
	<thead>
		<tr>
			<th>ID #</th>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Delivery Address</th>
			<th>Container Type</th>
			<th>Quantity</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $count = 1; ?>
		<?php foreach ($data as $values):?>
		<tr>
			<td>D-<?=$count++?></td>
			<td><?=$values['name'];?></td>
			<td><?=$values['phoneNumber'];?></td>
			<td><?=$values['deliveryAddress'];?></td>
			<td><?=$values['containerType'];?></td>
			<td><?=$values['quantity'];?></td>
			<td><?=ucfirst($values['status']);?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>