<?php
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header("Location: index.php"); //
} else { ?>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
            </tr>
        </thead>

        <?php
        $filename = "Donor list";
        $sql = "SELECT * from  donor";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {

                echo '  
<tr>  
<td>' . $cnt . '</td> 
<td>' . $complainNumber = $result->fullname . '</td> 
<td>' .    $MobileNumber = $result->email . '</td> 					
</tr>  
';
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=" . $filename . "-report.xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                $cnt++;
            }
        }
        ?>
    </table>
<?php } ?>