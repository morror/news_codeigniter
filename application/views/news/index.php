<?php foreach ($news as $news_item): ?>
	<div class='news'>
    <h2><?php echo $news_item['title'] ?></h2>
    <div id="main">
        <?php 
      
        $strCut = explode(".", $news_item['text']);
        echo $strCut[0]; 
		
        ?>
    </div>
    <p><a class="a_demo_four" href="/news/view/<?php echo $news_item['id'] ?>">View article</a></p>
	</div>
<?php endforeach ?>