<?php

include('db/dbBroker.php');

$query = "SELECT * FROM film ORDER BY rate DESC";
$result = mysqli_query($conn, $query);
$films = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<button id="btn-delete" class="btn btn-outline-success"
    style="float:left;width: 10%;text-align: center;">delete</button>

<table id="tabela" class="table sortable" style="margin-left:auto; margin-right:auto; text-align:center;width:80%">

    <thead>
        <tr>
            <th scope="col" style="color:white"><b><big>RAITING<b><big></th>
            <th scope="col" style="color:white"><b><big>NAME OF A FILM<b><big></th>
            <th scope="col" style="color:white"><b><big>CHOOSE ONE<b><big></th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($films as $film): ?>
            <tr id="tr-<?php echo $film['id'] ?>">
                <td>

                    <div class="image">
                        <img class="image__img" src="images/starbig.png" alt="Star">
                        <div class="image__overlay image__overlay--primary">
                            <!-- <div class="image__title"> -->
                            <h1 style="font-size: 150px;">
                                <?php echo htmlspecialchars($film['rate']); ?>
                            </h1>
                            <!-- </div> -->
                        </div>

                    </div>
                </td>

                <td style="align:center;">
                    <!-- <div class="text-center"> -->
                    <h1 style="color:white;font-size: 60px;">
                        <?php echo htmlspecialchars($film['name']); ?>
                    </h1>
                    <p style="font-size: 30px;"> <a href="film.php?id=<?php echo $film['id']; ?>">Go to
                            the film </a>
                    </p>
                    <!-- </div> -->

                </td>
                <td>
                    <label class="radio-btn">
                        <input type="radio" name="checked-donut" value=<?php echo $film['id'] ?>>
                        <span class="checkmark"></span>
                    </label>
                </td>


            </tr>
        <?php endforeach; ?>

    </tbody>
</table>



<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<script src="js/main.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<script>
    function pretrazi() {

        var input, filter, table, tr, i, td1, td2, td3, td4, txtValue1, txtValue2, txtValue3, txtValue4;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabela");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByTagName("td")[0];
            td2 = tr[i].getElementsByTagName("td")[1];
            if (td1 || td2) {
                txtValue1 = td1.textContent || td1.innerText;
                txtValue2 = td2.textContent || td2.innerText;
                if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1
                ) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }


    function sortTable() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("tabela");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[1];
                y = rows[i + 1].getElementsByTagName("TD")[1];
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }

    // function sortTable() {
    //     var table, rows, switching, i, x, y, shouldSwitch;
    //     table = document.getElementById("tabela");
    //     switching = true;
    //     while (switching) {
    //         switching = false;
    //         rows = table.rows;
    //         for (i = 1; i < (rows.length - 1); i++) {
    //             shouldSwitch = false;
    //             x = rows[i].getElementsByTagName("TD")[0];
    //             y = rows[i + 1].getElementsByTagName("TD")[0];
    //             if (x > y) {
    //                 shouldSwitch = true;
    //                 break;
    //             }
    //         }
    //         if (shouldSwitch) {
    //             rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
    //             switching = true;
    //         }
    //     }
    // }
</script>


<?php include('templates/footer.php'); ?>

</html>