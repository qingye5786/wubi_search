<?php
header("Content-Type: text/html; charset=utf-8");
$con = mysql_connect("localhost","root","testroot");
if (!$con) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('wubi',$con);
mysql_query("SET names UTF8");

$word = $_POST['word']; // 接收被查询的汉字
$result = mysql_query("SELECT * FROM wb where hanzi='$word'"); // 查询当前相关汉字
$i = 0;
if(is_resource($result)){ // 判断是否是资源结果集
	while($row = mysql_fetch_row($result)) { // 输出数据 
	    $i++;
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td height="37">'.$row['1'].'</td>';
		echo '<td>'.$row['2'].'</td>';
		echo '</tr>';
	}
}else {
	echo '<tr>';
	echo '<td height="37">无结果</td>';
	echo '<td>无结果</td>';
	echo '</tr>';
}

mysql_close($con); // 关闭数据库连接