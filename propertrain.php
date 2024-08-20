<?php
// Start the session
session_start();

include("admin/inc/config.php"); // Replace 'db_connect.php' with your database connection file


// Check if the user is logged in and retrieve user data, including the profile picture
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM accounts WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $profile_picture = $user_data['profile_picture'];
        // Other user data retrieval
    } else {
        // Handle the case where user data is not found
        $profile_picture = 'default_profile.jpg'; // Set a default profile picture
    }
}

$firstname = $_SESSION['firstname'] ?? '';
$lastname = $_SESSION['lastname'] ?? '';

if (isset($_SESSION['user_id'])) {
    // User is logged in, include the logged-in navigation
    include('header2.php');
} else {
    // User is not logged in, include the main navigation
    include('header.php');
}

mysqli_close($conn);
?>
<div class="text-center trans">
<div style="display: flex; align-items: center; background-image: url('images/banner_blue.png'); background-size: 100% 100%; height: 130px; ">
    <div style="text-align: center; flex-grow: 1; padding: 20px;">
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">PROPER TRAIN RIDING HABITS</h1>
    </div>
</div><br>
    </div>
    <div style="padding:10px 30px 10px 30px;">
    <table class="table table-striped table-hover text-center">
    <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">MGA BAWAL SA LOOB NG ISTASYON AT TREN</th>
      <th scope="col">PROHIBITED INSIDE TRAINS AND STATIONS</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Kumain, uminom, at manigarilyo.</td>
      <td>Eating, drinking, smoking.</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Lasing, nakainom, o nasa impluwensiya ng droga.</td>
      <td>Being drunk or under the influence of drugs.</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Baril, anumang uri ng armas, at iba pang matutulis na bagay.</td>
      <td>Guns, or any kind of weapons or pointed objects.</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Lobo, bola, at anumang uri ng paputok.</td>
      <td>Balloons, balls, or any kind of firecrackers.</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Pintura, thinner, varnish, at mga kahalintulad na kemikal.</td>
      <td>Paint, thinner, varnish, & similar chemicals.</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>De bote, alak, patis, at mga kahalintulad na bagay, maliban kung nakabalot nang maayos.</td>
      <td>Bottled wine, fish sauce or patis, & similar articles unless properly packed or wrapped.</td>
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Pagkaing malalansa at nangangamoy tulad ng sariwang karne, isda, bagoong, at daing, maliban kung nakabalot nang maayos.</td>
      <td>Smelly food like fresh meat, fish, bagoon, & daing unless properly packed or wrapped.</td>
    </tr>
    <tr>
      <th scope="row">8</th>
      <td>Bisikleta, skateboard, at iba pang kahalintulad na bagay na maaaring makasagabal sa mga pasahero.</td>
      <td>Bicycles, skateboards, and other similar objects that may harm or hamper passengers.</td>
    </tr>
    <tr>
      <th scope="row">9</th>
      <td>Magpatugtog ng radio at iba pang musical instruments na maaaring magdulot ng ingay.</td>
      <td>Playing the radio or musical instruments that might otherwise produce noise.</td>
    </tr>
    <tr>
      <th scope="row">10</th>
      <td>Buhay na hayop.</td>
      <td>Live animals.</td>
    </tr>
    <tr>
      <th scope="row">11</th>
      <td>Malalaking bagahe na lagpas ang haba, lapad, at lalim (volume) sa 12" x 18" x 18".</td>
      <td>Big luggage exceeding 12"x18"x18" in volume.</td>
    </tr>
    <tr>
      <th scope="row">12</th>
      <td>Mga bagahe na lagpas sa sinabing sukat ay maaaring isakay sa tren na galing Biñan lamang.</td>
      <td>Exception to the above luggage restriction are those uploaded in Biñan.</td>
    </tr>
    </tbody>
    </table>
    </div><br>
<?php require_once('footer.php'); ?>   