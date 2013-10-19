<?
$xmlStr = file_get_contents("http://api.feedzilla.com/v1/categories/1314/articles.json?count=10");
$data = json_decode($xmlStr, true);

foreach($data['articles'] as $r){
	echo '<h2>'.$r['title'].'</h2><br>';
	echo '<p>'.$r['summary'].'</p><br>';
	echo '<a href="'.$r['url'].'">Read More</a>';
}

?>