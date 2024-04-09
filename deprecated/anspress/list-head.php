<?php
/**
 * Display question list header
 * Shows sorting, search, tags, category filter form. Also shows a ask button.
 *
 * @package AnsPress
 * @author  Rahul Aryan <support@anspress.io>
 */
?>

<div class="ap-list-head clearfix">
	<div class="row">
		<div class="ap-search-head">
	<?php ap_get_template_part( 'search-form'); ?>
		</div>

<div class="ap-filter-ask">
		<div class="ap-ask-button-mobile">
			<div class="ap-ask-button-head">
			<?php ap_ask_btn(); ?>
				</div>
			</div>
		</div>
	</div>

<div class="row">
<div class="ap-filter-container">
		<div class="ap-filter-head-box">
<?php ap_list_filters(); ?>
		</div>
</div>
</div>
</div>
