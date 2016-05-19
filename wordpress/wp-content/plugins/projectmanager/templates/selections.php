
	<?php endif; ?>
	<?php if ( $orderby ) : ?>
	<select size='1' name='orderby'>
		<?php foreach ( $orderby AS $key => $value ) : ?>
		<?php $orderby_request = isset($_GET['orderby']) ? $_GET['orderby'] : '' ?>
		<option value='<?php echo $key ?>' <?php if ($orderby_request == $key) echo ' selected="selected"' ?>><?php echo $value ?></option>
		<?php endforeach; ?>
	</select>
	<?php endif; ?>
	<?php if ( $order ) : ?>
	<select size='1' name='order'>
		<?php foreach ( $order AS $key => $value ) : ?>
		<?php $order_request = isset($_GET['order']) ? $_GET['order'] : '' ?>
		<option value='<?php echo $key ?>' <?php if ($order_request == $key) echo ' selected="selected"' ?>><?php echo $value ?></option>
		<?php endforeach; ?>
	</select>
	<?php endif; ?>
	<input type='submit' value='<?php _e( 'Apply' ) ?>' class='button' />
</div>
</form>
</div>

<?php endif; ?>
