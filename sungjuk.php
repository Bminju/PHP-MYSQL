<?php 
$con=mysql_connect('localhost','kimit','1234');
mysql_select_db('kimit_db',$con);
$tot=$kor+$eng+$math;
$avg=$tot/3;
if ($avg >= 90) {
	$grade = "A";
}
elseif ($avg >= 80) {
    $grade="B";
}
elseif ($avg >= 70) {
    $grade="C";
}
elseif ($avg >= 60) {
    $grade="D";
}
else{
    $grade="F";
}
echo "'$name',$kor,$eng,$math,$tot,$avg,'$grade'";
$sql="insert into sungjuk (name,kor,eng,math,tot,avg,grade) values ('$name',$kor,$eng,$math,$tot,$avg,'$grade')"; #int 변수는 '' 필요 없음. string 변수만 ''안에 넣어주기 
mysql_query($sql);

### rank 넣어주기 


?>