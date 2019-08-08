<!DOCTYPE html>
<!--
www.ebubekirbastama.com
Bu Sistem By&Ebubekir Bastama Tarafın'dan Sistem Bilgileri almak için Open Source Olarak 
Yazılmıştır satılması kesinlikle Yasaktır.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Siyah Muhafız(C.)</title>
    <style> 
        body, html {
            height: 100%;
            margin: 0;
            font-family: Verdana, monospace, sans-serif;
            font-size: 12px;
            font-weight: bold;
            text-align: justify;
            min-height: 800px;

            height: 10%;
            padding: 20px;
            position: relative;
            margin: auto;
        }
        .bg {
            background-color:#f52d0a;
            height: 500px;
            width: 700px;

            position: relative;
            margin: auto;
        }
    </style>
</head>

<body background="https://image.freepik.com/free-vector/hand-drawn-decorative-damask-background_23-2148237766.jpg" >
<div class="bg">

    <?php
    $page = $_SERVER['PHP_SELF'];
    $sec = "10";
    header("Refresh: $sec; url=$page");

    exec('wmic cpu get LoadPercentage', $cpu);
    exec("getmac", $mac);
    exec("wmic  logicaldisk get size,freespace,caption", $hddbilgi);
    exec("ipconfig", $ip);

    $serial = shell_exec('wmic DISKDRIVE GET SerialNumber 2>&1');
    $Bytes = disk_total_space("/");
    $Type = array("", "kilo", "mega", "giga", "tera");
    $counter = 0;
    while ($Bytes >= 1024) {
        $Bytes /= 1024;
        $counter++;
    }
    $macadress = substr($mac[3], 0, strpos($mac[3], "\Device"));
    print_r("Maç Adresi :" . " $macadress " . "<br>");
    echo "<br>";
//print_r("" . $Bytes . " " . $Type[$counter] . "bytes<br>");
    print_r("Cpu :" . " %" . $cpu[1] . "<br> <br>" . $serial);
    echo "<br>";
    foreach ($ip as $i => $ipler) {

        if (trim($ipler) == "Connection-specific DNS Suffix  . : home") {
            echo "<br>";
            echo $ipler . " " . "<br>";
            echo "<br>";
            echo $ip[$i + 1] . " " . "<br>";
            echo "<br>";
            echo $ip[$i + 2] . " " . "<br>";
            echo "<br>";
            echo $ip[$i + 3] . " " . "<br>";
            echo "<br>";
            echo $ip[$i + 4] . " " . "<br>";
            echo "<br>";
            break;
        }
    }
    foreach ($hddbilgi as $i => $hdd) {
        if ($i == 0) {
            echo "Sürücü Bilgisi    | Boş Alan   | Boyut" . " " . "<br>";
        } else {
            echo $hdd . " " . "<br>";
        }
    }
    ?>

</div>


</body>
</html>
