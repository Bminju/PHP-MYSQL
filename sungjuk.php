<!--php echo문 출력시 한글 깨지는 것 해결을 위한 html 코드-->
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

<?php 

$con=mysql_connect('localhost','kimit','1234');  #sql 접속
mysql_select_db('kimit_db',$con);  #db선택
$tot=$kor+$eng+$math;
$avg=$tot/3;

# 성적 등급 매기기
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

$sql="insert into sungjuk (name,kor,eng,math,tot,avg,grade) values ('$name',$kor,$eng,$math,$tot,$avg,'$grade')"; #int 변수는 '' 필요 없음. string 변수만 ''안에 넣어주기 
mysql_query($sql); #$con 생략해도 무관

# rank 값 넣어주기 
$sql1="select * from sungjuk order by tot desc";  #총점 높은 순으로 정렬해주기 
$result=mysql_query($sql1);
for($c=1;$c<=mysql_num_rows($result);$c++){
    $row=mysql_fetch_array($result);

    echo"$row[num],$row[name], $row[kor], $row[eng], $row[math], $row[tot], $row[avg], $row[grade], $c <br>";

    $sql2="update sungjuk set rank=$c where num=$row[num]";
    mysql_query($sql2);
}

mysql_close($con)
?>

</body>
</html>