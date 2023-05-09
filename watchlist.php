<?php

include('db/dbBroker.php');

if (isset($_GET['id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM user WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    $profile = mysqli_fetch_assoc($result);
}

$query = "SELECT * FROM film WHERE user_id='$user_id'";
$result = mysqli_query($conn, $query);
$films = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php if ($user_id != $loggedId): ?>

    <h1 style="color: white; text-align: center;">This profil is exclusively visible by its creator.</h1>
    <div class="container">
        <a href="index.php" class="btn btn-primary" style="width: 10%;margin-left: 580px ">Return</a>
    </div>

<?php elseif ($films != null): ?>

    <div class="container">

        <h2 style="color: white; text-align: center;"><b>Hi,
                <?php echo $profile['username']; ?>! <br> YOUR WATCHLIST:
            </b></h2>

        <img src="images/popcorn.png" alt="Popcorn" style=" display: block;margin-left: auto;
  margin-right: auto;width: 40%;">


        <table id="tabela" class="table sortable" style="margin-left:auto; margin-right:auto; text-align:center;width:65%">

            <thead>
                <tr>
                    <th scope="col" style="color:white"><b><big>RAITING<b><big></th>
                    <th scope="col" style="color:white"><b><big>NAME OF A FILM<b><big></th>
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

                    </tr>
                <?php endforeach; ?>
    </div>
    </div>
<?php else: ?>

    <h1 style="color: white; text-align: center;">Be creator of your own watchlist...add film!</h1>
    <div class="container">
        <a href="add.php" class="btn btn-primary" style="width: 10%;margin-left: 580px ">Add film</a>
    </div>
    <?php include('templates/footer.php'); ?>
<?php endif; ?>

</html>