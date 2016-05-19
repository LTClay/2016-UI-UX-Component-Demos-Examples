</td>
	</tr>
	<tr>
		<td nowrap="nowrap" valign="top"><label for="orderby"><?php _e( 'Order By', 'projectmanager' ) ?></label></td>
		<td>
			<select size="1" name="orderby" id="orderby">
				<option value=""><?php _e( 'Default', 'projectmanager') ?></option>
				<option value="name"><?php _e('Name', 'projectmanager') ?></option>
				<option value="id"><?php _e('ID', 'projectmanager') ?></option>
				<option value="formfields"><?php _e( 'Formfields', 'projectmanager') ?></option>
			</select>
			<input type="text" size="3" name="formfield_id" id="formfield_id" />
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" valign="top"><label for="order"><?php _e( 'Order', 'projectmanager' ) ?></label></td>
		<td>
			<select size="1" name="order" id="order">
				<option value=""><?php _e( 'Default', 'projectmanager') ?></option>
				<option value="asc"><?php _e('Ascending', 'projectmanager') ?></option>
				<option value="desc"><?php _e('Descending', 'projectmanager') ?></option>
			</select>
	</table>
	</div>
	
	<!-- dataset panel -->
	<div id="dataset_panel" class="panel">
	<table style="border: 0;" cellpadding="5">
	<tr>
		<td><label for="datasets"><?php _e("Dataset", 'projectmanager'); ?></label></td>
		<td>
		<select id="datasets" name="datasets" style="width: 200px">
		<option value="0"><?php _e("No Dataset", 'projectmanager'); ?></option>
		<?php
			$datasets = $wpdb->get_results("SELECT * FROM {$wpdb->projectmanager_dataset} ORDER BY id ASC");
			if( ($datasets) ) {
				foreach( $datasets as $dataset )
					echo '<option value="'.$dataset->id.'" >'.$dataset->name.'</option>'."\n";
			}
		?>
        	</select>
		</td>
	</tr>
	</table>
	</div>
	
	<!-- search panel -->
	<div id="search_panel" class="panel">
	<table style="border: 0;">
	<tr>
		<td><label for="search_projects"><?php _e("Project", 'projectmanager'); ?></label></td>
		<td>
		<select id="search_projects" name="search_projects" style="width: 200px">
		<option value="0"><?php _e("No Project", 'projectmanager'); ?></option>
		<?php
			$projects = $wpdb->get_results("SELECT * FROM {$wpdb->projectmanager_projects} ORDER BY id ASC");
			if( ($projects) ) {
				foreach( $projects as $project )
					echo '<option value="'.$project->id.'" >'.$project->title.'</option>'."\n";
			}
		?>
        	</select>
		</td>
	</tr>
	<tr>
		<td nowrap="nowrap" valign="top"><label><?php _e( 'Display', 'projectmanager' ) ?></label></td>
		<td>
			<input type="radio" name="search_display" id="search_display_extend" value="extend" checked="ckecked" /><label for="search_display_extended"><?php _e( 'Extended Version', 'projectmanager' ) ?></label><br />
			<input type="radio" name="search_display" id="search_display_compact" value="compact" /><label for="search-display_compact"><?php _e( 'Compact Version', 'projectmanager' ) ?></label><br />
		</td>
	</tr>
	</table>
	</div>
	
	<!-- datast form panel -->
	<div id="datasetform_panel" class="panel">
	<table style="border: 0;">
	<tr>
		<td><label for="datasetform_projects"><?php _e("Project", 'projectmanager'); ?></label></td>
		<td>
		<select id="datasetform_projects" name="datasetform_projects" style="width: 200px">
		<option value="0"><?php _e("No Project", 'projectmanager'); ?></option>
		<?php
			$projects = $wpdb->get_results("SELECT * FROM {$wpdb->projectmanager_projects} ORDER BY id ASC");
			if( ($projects) ) {
				foreach( $projects as $project )
					echo '<option value="'.$project->id.'" >'.$project->title.'</option>'."\n";
			}
		?>
        	</select>
		</td>
	</tr>
	</table>
	</div>

	</div>
	
	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'projectmanager'); ?>" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'projectmanager'); ?>" onclick="ProjectManagerInsertLink();" />
		</div>
	</div>

</form>
</body>
</html>
