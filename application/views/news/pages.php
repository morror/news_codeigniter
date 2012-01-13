<?php
	echo '<div id="pages">';
	for ($i=1; $i<=$pages; $i++){
		echo '<a href="/news/get_news_all/'.$i.'">'.$i.'</a>';
	}
	echo '</div>';
