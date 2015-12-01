<?php 

//.html.php => a clue for other developers that this is a tmeplate file - naming convention
?>

<div class="pagination">
	<?php $i = 0; ?>
	<?php while($i < $total_pages): ?>
		<?php	$i++; ?>
		<?php 	if($i == $current_page): ?>
			<span><?php echo $i; ?></span>
		<?php 	else: ?>
			<a href="./?pg=<?php echo $i; ?>"><?php	echo $i; ?></a>
		<?php 	endif; ?>
	<?php endwhile; ?>
</div>