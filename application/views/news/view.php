<?php
echo '<div class="news">';
echo '<h2>'.$news_item['title'].'</h2>';
echo '  <div id="main">';
echo '<p>'.nl2br($news_item['text']).'</p>';
echo '</div>';
echo '</div>';
