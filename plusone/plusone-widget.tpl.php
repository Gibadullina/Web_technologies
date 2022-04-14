<?php
/**
 * @file
 * Шаблон для отображения виджета для голосования.
 */
?>

<div class="plusone-widget">
	<div class="score"><?php print $total; ?></div>
	<div class="vote">
		<?php
			if ($is_author) {
				print t('Votes');
			}
			elseif ($voted > 0) {
				print t('You voted');
			}
			else {
				print l(t('Vote'), "plusone/vote/$nid", array('attributes' => array('class' => 'plusone-link')));
			}
		?>
	</div>
</div>