<?php 
$mybot=curl_init();
curl_setopt_array($mybot, [
	CURLOPT_URL=>'https://www.cbar.az/currency/rates?language=en',
	CURLOPT_RETURNTRANSFER=>true
]);

$output=curl_exec($mybot);
curl_close($mybot);

preg_match_all('@<div class="valuta">(.*?)</div><div class="kod">(.*?)</div><div class="kurs">(.*?)</div>@',$output, $exchange);
$name=$exchange[1];
$cost=$exchange[3];
?>

<ul>
	<?php foreach ($name as $key => $value): ?>
		<li>
			<?php echo $key ?> ) 
			<?php echo $value?> - 
			<?php echo $cost[$key]?>	
		</li>
	<?php endforeach ?>
</ul>