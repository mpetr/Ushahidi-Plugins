<?php
/**
 *  More settings
 *
 */
?>
			<div class="bg">
				<?php
				if ($form_error) {
				?>
					<!-- red-box -->
					<div class="red-box">
						<h3><?php echo Kohana::lang('ui_main.error');?></h3>
						<ul>
						<?php
						foreach ($errors as $error_item => $error_description)
						{
							// print "<li>" . $error_description . "</li>";
							print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
						}
						?>
						</ul>
					</div>
				<?php
				}

				if ($form_saved) {
				?>
					<!-- green-box -->
					<div class="green-box">
						<h3><?php echo Kohana::lang('ui_main.saved') ?></h3>
					</div>
				<?php
				}
				?>





				<h2>Set highlighted location</h2>

				<!-- tab -->
				<div class="tab">
					<?php print form::open(NULL,array('enctype' => 'multipart/form-data',
						'id' => 'layerMain', 'name' => 'layerMain')); ?>

					<div class="tab_form_item">
					Upload KML File:
						<?php print form::upload('file', '', ''); ?>
					</div>

					<div style="clear:both"></div>
					<div class="tab_form_item">
						This layer will be shown on the map on "Submit a report" page<br /><br/>
						<input type="image" src="<?php echo url::base() ?>media/img/admin/btn-save.gif" class="save-rep-btn" />
					</div>
					<?php print form::close(); ?>
				</div>
			</div>




