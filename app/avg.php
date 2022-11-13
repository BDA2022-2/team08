<?php
    echo "<br> 3과목의 총점과 평균 구하기<br>";
    echo "<hr>";

    $os=87;
    $gp=96;
    $sc=73;

    $sum=$os+$gp+$sc;
    $avg=$sum/3;

    echo ">운영체제: $os<br>";
    echo ">그래픽스: $gp<br>";
    echo ">정보보안: $sc<br>";

    echo "<hr>";

    echo ">과목총점: $sum<br>";
    echo ">과목평균: $avg<br>";

    echo "<hr>";
    echo ">\$avg의 데이터 타입: ";
    echo gettype($avg);
?>