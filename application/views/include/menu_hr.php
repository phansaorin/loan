<ul class="nav">
	<?php
	$segment1 = $this->uri->segment(1);
	$segment2 = $this->uri->segment(2);
	if ($this->session->userdata('hr')) {
//		$adminmenu = array('home', 'leaving', 'report', 'info');
		$adminmenu = array('records', 'leaving', 'report');
		for ($j = 0; $j < count($adminmenu); $j++) {
			if (!$segment2) {
				$segment1 = 'hr';
				$currentmenu = 'records';
				if ($segment1 === 'hr' && $segment2 === 'records') {
					echo '<li class="active">' . anchor($segment1 . '/' . $adminmenu[$j], ucfirst($adminmenu[$j])) . '</li>';
				} else {
					echo '<li>' . anchor($segment1 .'/' . $adminmenu[$j], ucfirst($adminmenu[$j])) . '</li>';
				}//end of if
			} else {
				if ($segment1 == 'hr' && $segment2 == $adminmenu[$j]) {
					echo '<li class="active">' . anchor($segment1 .'/' . $adminmenu[$j], ucfirst($adminmenu[$j])) . '</li>';
				} else {
					echo '<li>' . anchor($segment1 .'/' . $adminmenu[$j], ucfirst($adminmenu[$j])) . '</li>';
				}
			}//end if
		}//end for
	} 
	?>
</ul>