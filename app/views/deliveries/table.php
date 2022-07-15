<table>
	<thead>
		<tr>
			<th>ID #</th>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Delivery Address</th>
			<th>Container Type</th>
			<th>Quantity</th>
			<th>Delivery Time</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$count = 1; 
			if(count($data) > 0):
		?>
		<?php foreach ($data as $values):?>
		<tr>
			<td>D-<?=$count++?></td>
			<td><?=$values['name'];?></td>
			<td><?=$values['phoneNumber'];?></td>
			<td><?=$values['deliveryAddress'];?></td>
			<td><?=$values['containerType'];?></td>
			<td><?=$values['quantity'];?></td>
			<td><?=$values['deliveryTime'];?></td>
			<td><?=ucfirst($values['status']);?></td>
			<td>
			<?php if($values['status'] == 'pending'): ?>
				<button class="btn btn-pending mb-2 change-status-btn" value="<?=$values['orderID'];?>" data-status='approved'>Process</button><br/>
				<button class="btn btn-cancel change-status-btn" value="<?=$values['orderID'];?>" data-status='cancelled'>Cancel</button>
			<?php elseif($values['status'] == 'approved'): ?>
				<button class="btn btn-completed mb-2 change-status-btn" value="<?=$values['orderID'];?>" data-status='completed'>Completed</button><br/>
				<button class="btn btn-cancel change-status-btn" value="<?=$values['orderID'];?>" data-status='cancelled'>Cancel</button>
			<?php else: ?>
				<span style="color:red;font-weight: bold">Cancelled</span>
			<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
		<tr><td rowspan="8">No data to show</td></tr>
		<?php endif; ?>
	</tbody>
</table>