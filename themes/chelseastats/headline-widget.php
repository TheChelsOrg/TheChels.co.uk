<?php /* Template Name: Stats Widget */ ?>
<?php
		$db = new pdodb();
		// define a multidimensional array for the image, background and font
		$pair= array (
			// first value is the image id, then background and font color.
			// ideally add to the component admin page (parameters)
			// 0 is the default.
			'0' => array( 'font' => '#7C2B86;'),
			'1' => array( 'font' => '#2b864f;'),
			'2' => array( 'font' => '#6A99BB;'),
			'3' => array( 'font' => '#E95F0F;'),
			'4' => array( 'font' => '#74B44B;'),
			'5' => array( 'font' => '#487427;'),
			'6' => array( 'font' => '#B94B92;'),
			'7' => array( 'font' => '#E5362E;'),
			'8' => array( 'font' => '#905196;'),
			'9' => array( 'font' => '#026A89;'),
			'10'=> array( 'font' => '#D92B86;'),
			'11'=> array( 'font' => '#CBA325;'),
			'12'=> array( 'font' => '#7AC22E;'),
			'13'=> array( 'font' => '#F7004A;'),
			'14'=> array( 'font' => '#00A1D6;'),
			'15'=> array( 'font' => '#008AB8;'),
			'16'=> array( 'font' => '#E1B000;'),
			'17'=> array( 'font' => '#2E2478;'),
			'18'=> array( 'font' => '#8C42B0;'),
			'19'=> array( 'font' => '#444444;'),
			'20'=> array( 'font' => '#80AA28;'),
			'21'=> array( 'font' => '#BD985E;'),
			'22'=> array( 'font' => '#B31A24;'),
			'23'=> array( 'font' => '#6E7FA4;'),
			'24'=> array( 'font' => '#000000;')
		);
	?>

			<?php
				$ft = '#000000;'; // default

				$db->query('SELECT F_IMAGEID, F_TEXT, F_DATE, F_AUTHOR FROM o_appstats
				    WHERE F_DATE > (Select F_DATE from 000_config where F_LEAGUE="APP")
				    ORDER BY F_ID desc limit 1');
				$row = $db->row();
				$f2 = stripslashes($row['F_TEXT']);
				$f3 = $row['F_IMAGEID'];
				$f4 = $row['F_DATE'];
				$f5 = str_replace('@','',$row['F_AUTHOR']);

				if (array_key_exists($f3, $pair)) { $ft = $pair[$f3]['font'];}
					?>
					<ul style="list-style-type: none;">
					<li class="element" style="color:<?php echo $ft; ?>">
						<h4><?php echo $f2 ?></h4>
						<small><i>Source: @<?php echo $f5;?> : Data correct as at <?php echo date('Y-m-d',strtotime($f4)) ?></i></small>
					</li>
					</ul>


