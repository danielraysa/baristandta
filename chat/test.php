<?php
    include "../connection.php";
    $query = mysqli_query($koneksi, "SELECT * FROM mock_data LIMIT 15");
    $a = array();
    $b = array();
    $expired = array();
    $priority = array();
    $expired_temp = array();
    $priority_temp = array();
    while($row = mysqli_fetch_array($query)){
        array_push($a, $row['id']);
        array_push($b, $row['first_name']);
        array_push($expired, $row['expired']);
        array_push($priority, $row['priority']);
    }
    //sort($expired);
    $arr = array($a, $b, $expired, $priority);
    //print_r($arr);
    ?>
    
    <?php
    //$avg = 0;
    for($y = 0; $y < count($a); $y++){
        echo ($y+1).".<br>";
        for($z = 0; $z < count($expired); $z++) {
            echo ($y+1).".".($z+1)."<br>";
            if($expired[$y] > $expired[$z]) {
                if($priority[$y] < $priority[$z]) {
                echo $expired[$y]." (".$priority[$y].") > ".$expired[$z]." (".$priority[$z].") <br>";
                $temp = $priority[$y];
                $priority[$y] = $priority[$z];
                $priority[$z] = $temp;
                echo "<b>".$expired[$y]." (".$priority[$y].") > ".$expired[$z]." (".$priority[$z].")</b> <br>";
                }
            }
        }
        ?>
        
        <table border="1">
            <?php 
        for($x = 0; $x < count($a); $x++){
            ?>
            
            <tr>
                <td><?php echo $a[$x]; ?></td>
                <td><?php echo $b[$x]; ?></td>
                <td><?php echo $expired[$x]; ?></td>
                <td><?php echo $priority[$x]; ?></td>
            </tr>
            
            <?php
            //$avg += $expired[$x];
        }
        ?>
        </table>
        <?php
    }
    ?>
    <br>
    <table border="1">
    <?php
    for($x = 0; $x < count($a); $x++){
        ?>
        <tr>
            <td><?php echo $a[$x]; ?></td>
            <td><?php echo $b[$x]; ?></td>
            <td><?php echo $expired[$x]; ?></td>
            <td><?php echo $priority[$x]; ?></td>
        </tr>
        <?php
        //$avg += $expired[$x];
    }
    echo "AVG : ".array_sum($expired)/count($expired);
    array_push($a, 1);
    array_push($b, 1);
    array_push($expired, 40);
    array_push($priority, 11);
    //sort($expired);
    ?>
    </table>