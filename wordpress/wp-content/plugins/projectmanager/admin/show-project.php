
			<input type='hidden' name='page' value='<?php echo $_GET['page'] ?>' />
			<input type='hidden' name='project_id' value='<?php echo $project_id ?>' />
			<?php endif; ?>
			<select size='1' name='orderby'>
			<?php foreach ( $orderby AS $key => $value ) : ?>
				<?php $orderby_request = isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : ''; ?>
				<option value='<?php echo $key ?>' <?php selected( $orderby_request, $key ) ?>><?php echo $value ?></option>
			<?php endforeach ?>
			</select>
			<select size='1' name='order'>
			<?php foreach ( $order AS $key => $value ) : ?>
				<?php $order_request = isset($_REQUEST['order']) ? $_REQUEST['order'] : ''; ?>
				<option value='<?php echo $key ?>' <?php selected ($order_request, $key) ?>><?php echo $value ?></option>
			<?php endforeach; ?>
			</select>
			<input type='submit' value='<?php _e( 'Apply' ) ?>' class='button' />
		</div>
		
		<?php if ( $projectmanager->getPageLinks() ) : ?>
		<div class="tablenav-pages">
			<?php $page_links_text = sprintf( '<span class="displaying-num">' . __( 'Displaying %s&#8211;%s of %s', 'projectmanager' ) . '</span>%s',
			number_format_i18n( ( $projectmanager->getCurrentPage() - 1 ) * $projectmanager->getPerPage() + 1 ),
			number_format_i18n( min( $projectmanager->getCurrentPage() * $projectmanager->getPerPage(),  $projectmanager->getNumDatasets($project_id) ) ),
			number_format_i18n(  $projectmanager->getNumDatasets($project_id) ),
			$projectmanager->getPageLinks()
			); echo $page_links_text; ?>
		</div>
		<?php endif; ?>
	</div>

	<table class="widefat" id="datasets">
	<thead>
		<tr>
			<th scope="col" class="check-column"><input type="checkbox" onclick="ProjectManager.checkAll(document.getElementById('dataset-filter'));" /></th>
			<th scope="col"><?php _e( 'ID', 'leaguemanager' ) ?></th>
			<th scope="col" class="name"><?php _e( 'Name', 'projectmanager' ) ?></th>
			<?php if ( -1 != $project->category ) : ?>
			<th scope="col" class="categories"><?php _e( 'Categories', 'projectmanager' ) ?></th>
			<?php endif; ?>
			<?php $projectmanager->printTableHeader() ?>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th scope="col" class="check-column"><input type="checkbox" onclick="ProjectManager.checkAll(document.getElementById('dataset-filter'));" /></th>
			<th scope="col"><?php _e( 'ID', 'leaguemanager' ) ?></th>
			<th scope="col" class="name"><?php _e( 'Name', 'projectmanager' ) ?></th>
			<?php if ( -1 != $project->category ) : ?>
			<th scope="col" class="categories"><?php _e( 'Categories', 'projectmanager' ) ?></th>
			<?php endif; ?>
			<?php $projectmanager->printTableHeader() ?>
		</tr>
	</tfoot>
	<tbody id="the-list">
<?php
	foreach ( $datasets AS $dataset ) :
		$class = ( !isset($class) || 'alternate' == $class ) ? '' : 'alternate';
		if ( count($projectmanager->getSelectedCategoryIDs($dataset)) > 0 )
			$categories = $projectmanager->getSelectedCategoryTitles( $projectmanager->getSelectedCategoryIDs($dataset) );
		else
			$categories = __( 'None', 'projectmanager' );
				
		$dataset->name = htmlspecialchars(stripslashes($dataset->name), ENT_QUOTES);
?>
		<tr class="<?php echo $class ?>" id="dataset_<?php echo $dataset->id ?>">
			<th scope="row" class="check-column"><input type="checkbox" value="<?php echo $dataset->id ?>" name="dataset[<?php echo $dataset->id ?>]" /></th>
			<td><?php echo $dataset->id ?></td>
			<td>
				<?php if ( ( current_user_can('edit_datasets') && $current_user->ID == $dataset->user_id ) || ( current_user_can('edit_other_datasets') ) ) : ?>
				<!-- Popup Window for Ajax name editing -->
				<div id="datasetnamewrap<?php echo $dataset->id; ?>" style="overflow:auto;display:none;">
				<div class='thickbox_content'>
					<input type='text' name='dataset_name<?php echo $dataset_id ?>' id='dataset_name<?php echo $dataset->id ?>' value="<?php echo $dataset->name ?>" size='30' />
					<div class="buttonbar"><input type="button" value="<?php _e('Save') ?>" class="button-secondary" onclick="ProjectManager.ajaxSaveDatasetName(<?php echo $dataset->id; ?>);return false;" />&#160;<input type="button" value="<?php _e('Cancel') ?>" class="button" onclick="tb_remove();" /></div>
				</div>
				</div>
				<span><a href="admin.php?page=<?php if($_GET['page'] == 'projectmanager') echo 'projectmanager&subpage=dataset'; else echo 'project-dataset_'.$project_id ?>&amp;edit=<?php echo $dataset->id ?>&amp;project_id=<?php echo $project_id ?>"><span id="dataset_name_text<?php echo $dataset->id ?>"><?php echo $dataset->name ?></span></a></span><span id="loading_name_<?php echo $dataset->id ?>"></span>
				<?php else : ?>
					<?php echo $dataset->name ?>
				<?php endif; ?>
				
				<?php if ( ( current_user_can('edit_datasets') && $current_user->ID == $dataset->user_id ) || ( current_user_can('edit_other_datasets') ) ) : ?>
				<span>&#160;<a class="thickbox" id="thickboxlink_name<?php echo $dataset->id ?>" href="#TB_inline&amp;height=100&amp;width=300&amp;inlineId=datasetnamewrap<?php echo $dataset->id ?>" title="<?php _e('Name','projectmanager') ?>"><img src="<?php echo PROJECTMANAGER_URL ?>/admin/icons/edit.gif" border="0" alt="<?php _e('Edit') ?>" /></a></span>
				<?php endif; ?>
			</td>
			<?php if ( -1 != $project->category ) : ?>
			<td>
				<?php if ( ( current_user_can('edit_datasets') && $current_user->ID == $dataset->user_id ) || ( current_user_can('edit_other_datasets') ) ) : ?>
				<!-- Popup Window for Ajax group editing -->
				<div id="groupchoosewrap<?php echo $dataset->id; ?>" style="overflow:auto;display:none;">
				<div class='thickbox_content'>
					<ul class="categorychecklist" id="categorychecklist<?php echo $dataset->id ?>">
					<?php $this->categoryChecklist( $project->category, $projectmanager->getSelectedCategoryIDs($dataset) ) ?>
					</ul>
					<div class="buttonbar"><input type="button" value="<?php _e('Save') ?>" class="button-secondary" onclick="ProjectManager.ajaxSaveCategories(<?php echo $dataset->id; ?>);return false;" />&#160;<input type="button" value="<?php _e('Cancel') ?>" class="button" onclick="tb_remove();" /></div>
				</div>
				</div>
				<?php endif; ?>
				<span id="dataset_category_text<?php echo $dataset->id ?>"><?php echo $categories ?></span><span id="loading_category_<?php echo $dataset->id ?>"></span>
					
				<?php if ( ( current_user_can('edit_datasets') && $current_user->ID == $dataset->user_id ) || ( current_user_can('edit_other_datasets') ) ) : ?>
				<span>&#160;<a class="thickbox" id="thickboxlink_category<?php echo $dataset->id ?>" href="#TB_inline&amp;height=300&amp;width=300&amp;inlineId=groupchoosewrap<?php echo $dataset->id ?>" title="<?php printf(__('Categories of %s','projectmanager'),$dataset->name) ?>"><img src="<?php echo PROJECTMANAGER_URL ?>/admin/icons/edit.gif" border="0" alt="<?php _e('Edit') ?>" /></a></span>
				<?php endif; ?>
			</td>
			<?php endif; ?>
			<?php $projectmanager->printDatasetMetaData( $dataset ) ?>
		</tr>
	<?php endforeach ?>
	</tbody>
	</table>
	</form>
	
	<script type='text/javascript'>
	// <![CDATA[
	    Sortable.create("the-list",
	    {dropOnEmpty:true, tag: 'tr', ghosting:true, constraint:false, onUpdate: function() {ProjectManager.saveOrder(Sortable.serialize('the-list'))} });
	    //")
	// ]]>
	</script>
		
	<?php else  : ?>
		<div class="error aligncenter" style="clear: both; margin-top: 3em; text-align: center;"><p><?php _e( 'Nothing found', 'projectmanager') ?></p></div>
	<?php endif ?>
	<div class="tablenav">
		<?php if ( $projectmanager->getPageLinks() ) echo "<div class='tablenav-pages'>$page_links_text</div>"; ?>
	</div>
</div>
<?php endif; ?>
