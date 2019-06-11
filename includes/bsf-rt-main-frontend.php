<?php

echo '<h1 class="bsf_rt_main_title">';
 esc_attr_e( 'Read Meter', 'read-meter' );
 echo '</h1>';

if ( get_option( 'bsf_rt_saved_msg' ) == 'ok' ) {
	echo '<div id="message" class="notice is-dismissible notice-success">
      <p class="description">
      Settings Saved.
      </p>
    </div>';
	update_option( 'bsf_rt_saved_msg', 'notok' );
}

// Navigation

// To get the tab value from URL and store in $active_tab variable
 $active_tab = 'bsf_rt_general_settings';
if ( isset( $_GET['tab'] ) ) {

	if ( $_GET['tab'] == 'bsf_rt_general_settings' ) {

		$active_tab = 'bsf_rt_general_settings';

	} elseif ( $_GET['tab'] == 'bsf_rt_read_time_settings' ) {

		$active_tab = 'bsf_rt_read_time_settings';

	} elseif ( $_GET['tab'] == 'bsf_rt_progress_bar_settings' ) {

		$active_tab = 'bsf_rt_progress_bar_settings';

	} elseif ( $_GET['tab'] == 'bsf_rt_user_manual' ) {

		$active_tab = 'bsf_rt_user_manual';
	}
}
?>
<!-- WordPress provides the styling for tabs. -->

<!-- when tab buttons are clicked we jump back to the same page but with a new parameter that represents the clicked tab. accordingly we make it active -->
<h2 class="nav-tab-wrapper">
 <a href="?page=bsf_rt&tab=bsf_rt_general_settings" class="nav-tab tb 
	<?php
	if ( $active_tab == 'bsf_rt_general_settings' ) {
					echo 'nav-tab-active';
	}
	?>
	"><?php esc_attr_e( 'General Settings', 'read-meter' ); ?></a>

			<a href="?page=bsf_rt&tab=bsf_rt_read_time_settings" class="nav-tab tb 
			<?php
			if ( $active_tab == 'bsf_rt_read_time_settings' ) {
					echo 'nav-tab-active';
			}
			?>
			"><?php esc_attr_e( 'Read Time', 'read-meter' ); ?></a>

			<a href="?page=bsf_rt&tab=bsf_rt_progress_bar_settings" class="nav-tab tb 
			<?php
			if ( $active_tab == 'bsf_rt_progress_bar_settings' ) {
						echo 'nav-tab-active';
			}
			?>
			"><?php esc_attr_e( 'Progress Bar', 'read-meter' ); ?></a>

		<a href="?page=bsf_rt&tab=bsf_rt_user_manual" class="nav-tab tb 
		<?php
		if ( $active_tab == 'bsf_rt_user_manual' ) {
						echo 'nav-tab-active';
		}
		?>
		"><?php esc_attr_e( 'Getting Started', 'read-meter' ); ?></a>
</h2>

<?php
// here we display the sections and options in the settings page based on the active tab
if ( isset( $_GET['tab'] ) ) {

	if ( $_GET['tab'] == 'bsf_rt_general_settings' ) {

		   require_once 'bsf-rt-general-settings.php';

	} elseif ( $_GET['tab'] == 'bsf_rt_read_time_settings' ) {

		   require_once 'bsf-rt-read-time-settings.php';

	} elseif ( $_GET['tab'] == 'bsf_rt_progress_bar_settings' ) {

		   require_once 'bsf-rt-progress-bar-settings.php';

	} elseif ( $_GET['tab'] == 'bsf_rt_user_manual' ) {

		   require_once 'bsf-rt-user-manual.php';
	}
} else {

	require_once 'bsf-rt-general-settings.php';
}

