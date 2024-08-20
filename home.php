<?php
// Start the session
session_start();

include("admin/inc/config.php");

// Check if the regular user is logged in
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
        $profile_picture = 'default_profile.jpg';
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

// Fetch carousel images from the database
$carouselSql = "SELECT * FROM sliders";
$carouselResult = mysqli_query($conn, $carouselSql);

mysqli_close($conn);
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Manrope" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="caro">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php
    $indicatorIndex = 0;
    while ($carouselRow = mysqli_fetch_assoc($carouselResult)) {
        $activeClass = ($indicatorIndex == 0) ? 'active' : '';
        echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$indicatorIndex' class='$activeClass' aria-label='Slide $indicatorIndex'></button>";
        $indicatorIndex++;
    }
    ?>
  </div>
  <div class="carousel-inner">
    <?php
    $itemIndex = 0;
    mysqli_data_seek($carouselResult, 0); // Reset result pointer to the beginning
    while ($carouselRow = mysqli_fetch_assoc($carouselResult)) {
        $activeClass = ($itemIndex == 0) ? 'active' : '';
        echo "<div class='carousel-item $activeClass'>";
        echo "<img src='assets/uploads/{$carouselRow['slider_image']}' class='d-block w-100' alt=''>";
        echo "</div>";
        $itemIndex++;
    }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  </div>

<div class="container-fluid mt-5">
    <div class="row text-center" style="font-weight:900;">
      <div class="col">
        <!-- Content for the first column goes here -->
        <a href="nscr.php">
        <img src="images/project.png" width="100" height="100">
        <p class="pt-3">NSCR Project</p>
      </a>
      </div>
      <div class="col">
        <!-- Content for the second column goes here -->
        <a href="station.php">
        <img src="images/schedule.png" width="100" height="100">
        <p class="pt-3">Timetable</p>
      </a>
      </div>
      <div class="col">
        <!-- Content for the first column goes here -->
        <a href="fares.php">
        <img src="images/ticket.png" width="100" height="100">
        <p class="pt-3">Fare</p>
        </a>
      </div>
      <div class="col">
        <!-- Content for the second column goes here -->
        <a href="route.php">
        <img src="images/route.png" width="100" height="100">
        <p class="pt-3">Route</p>
         </a>
      </div>
      <div class="col">
        <!-- Content for the first column goes here -->
        <a href="careers.php">
        <img src="images/career.png" width="100" height="100">
        <p class="pt-3">Career</p>
        </a>
      </div>
      <div class="col">
        <!-- Content for the second column goes here -->
        <a href="contacts.php">
        <img src="images/contact.png" width="100" height="100">
        <p class="pt-3">Contact</p>
      </a>
      </div>
    </div>
  </div> 
 <?php require_once('announcement.php'); ?>


 <style> 
.home{
            margin: 0px 50px 20px 50px;
            font-weight: 900;
            background: linear-gradient(to right, orange, yellow);
            border-radius: 20px;
            font-size: 20px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            padding-left: 6px;
            padding-right: 6px;
            padding-bottom: 15px;
            text-align: center;
        }
.container {
            color: black;
            border-radius: 50px;
            margin-left:auto;
            margin-right:auto;
            text-align: justify;
  text-justify: inter-word;
}

@media (max-width: 768px) {
            .sec{
                width:250px;
                height:300px;
            }
            
            .item-title{
                font-size:15px;
            }
        }

</style>
<div class ="home" style="padding-top:28px;" >
 <h3 class="item-title" itemprop="name">
			Mensahe ni Department of Transportation Secretary Jaime J. Bautista sa 131st anniversary ng Philippine National Railways, ngayong araw, November 24, 2023		</p>
</div>
<br>
<center>
<p><img src="images/Sec.Bautista.jpg" width="600" height="600" class="sec"/></p>
</center>
<br>

<div class ="container" style="padding:50px;">
<p>Magandang umaga po.</p>
<p>Today, we celebrate PNR’s 131st anniversary.</p>
<p>Ipinagdiriwang natin ang anibersaryo ng pagkakatatag ng Pambansang Daangbakal, ang Philippine National Railways (PNR).</p>
<p><b>ANG NAKALIPAS</b></p>
<p>We celebrate a national institution whose operations precedes our lifetime. At ang Pambansang Daangbakal ay patuloy na pakikinabangan ng mga susunod pang henerasyon, hanggang sa kaapu-apuhan natin.</p>
<p>Sa araw na ito, magbalik-tanaw tayo sa malaki at mahalagang naitulong ng PNR sa napakaraming Pilipino sa kanilang paglalakbay, malayo man or malapit.</p>
<p>Subok na ng panahon ang institusyong ito. Nasaksihan nito ang mga mahahalagang sandali sa kasaysayan ng Pilipinas.</p>
<p>Dumaan ang PNR sa mga digmaan, kalamidad, pati ng mga rebolusyon. Ito ay naging instrumento sa pag-usbong ng komersyo at pag-unlad ng ekonomiya ng bansa noong unang panahon.</p>
<p>The PNR was the country’s first mass transport system, connecting cities, communities and regions. It transported people and goods, stimulating progress in the countryside during its early years.</p>
<p>Ang mga pamayanang dati’y tahimik ay biglang naging matao, sumigla, at umunlad. Ang sabi nga ng ating mga lolo at lola - kung saan may istasyon ang PNR, siguradong kasunod ang pag-unlad.</p>
<p>Mayaman ang kasaysayan ng PNR. Ito ang tinaguriang unang railroad system sa Timog-Hilagang Asya. Ang ating mga karatig-bansa ay nakatingin sa Pilipinas ng may inggit dahil habang sila ay naka karwahe, ang Pilipinas ay may tren.</p>
<p>Ang mga karwahe naman dito sa Pilipinas ay gawa sa bakal - pinapatakbo ng uling. Kaya nitong tumakbo ng malalayong distansya. Komportable, mabilis at maasahan.</p>
<p>Tinawag ito na “Colonial Iron Horse” na nagkonekta sa buong Luzon – mula La Union hanggang Legaspi, nang biglang dumating ang linya ng tren ng PNR.</p>
<p>Ang mga tao sa nayon ay nabago ang kanilang buhay sa pamamagitan ng PNR.</p>
<p>The PNR has a rich history. In 1892, the Manila-Dagupan Ferrocarril Line was opened. The original station of this line is not far away from here. It served as the primary exit and entry point to Manila.</p>
<p>Malaking ginhawa ang dulot nito dahil noong panahon na iyon ay wala pang maraming pagpipiliang masasakyan – wala pang maraming bus, o sasakyang de makina, o kaya man lang maayos na highway.</p>
<p>Pinalitan ng mga Amerkano ang pangalan nito sa Manila Railroad Company. Noong 1938, nagkaroon ng byahe hanggang Bicol. Dahil dito, ito na ang naging pinakamahabang railroad network, mula San Fernando, La Union hanggang Legazpi, Albay.</p>
<p>Opisyal tayong pinangalanang Philippine National Railways noong Hunyo 20, 1964, sa pamamagitan ng Republic Act No. 4156.</p>
<p><b>ANG KASALUKUYAN</b></p>
<p>Today, our journey to transform the country’s transport system includes the modernization of the PNR, elevating it to global standards.</p>
<p>Makulay ang kasaysayan ng PNR, pero umaasa tayo ng mas maganda pang kinabukasan para sa PNR.</p>
<p>I am confident everyone here envisions a more progressive and modern PNR that has adapted to today’s travel landscape.</p>
<p>Nais kong pasalamatan ang mga naglilingkod sa institusyon ito dahil sa inyong dedikasyon at paglilingkod sa loob ng mahabang panahon.</p>
<p>Sanay na sanay na kayo sa busina ng tren. Lagi ninyo itong naririnig. Para sa mga pasahero, iba ang ibig sabihin nito.</p>
<p>Pag narinig nila ang busina ng tren, pakiramdam nila ligtas silang makakauwi sa kanilang mga mahal sa buhay.</p>
<p>Pag narinig nila ang busina ng tren, ibig sabihin madadala nila ang kanilang mga paninda o kalakal sa kanilang bayan.</p>
<p>Pag narinig nila ang busina ng tren, alam nilang sigurado silang makakauwi sa kanilang mga probinsya nang mabilis at komportable. Makakapiling nila ang kanilang mahal sa buhay.</p>
<p>Hindi lamang tayo nagpapaandar ng tren. Naipaglalapit nating ang mga pamayanan, mga lalawigan at mga komunidad. Nakapagbibigay tayo ng komportable at ligtas na paglalakbay.</p>
<p>Ang PNR ay nangangahulugan ng buhay at kalakal para sa marami nating <br>kababayan. Hindi lamang transportasyon ang PNR.</p>
<p><b>ANG KINABUKASAN</b></p>
<p>Kahanga-hanga ang plano ng Department of Transportation para sa PNR. Sa tulong ninyong lahat, unti-unti na nating masasagawa ang plano para sa North-South Commuter Rail, gayundin ang South-Long Haul Project.</p>
<p>Ang mga dekada ng 1960s at 1970s ay tinaguriang “Golden Years” ng PNR. Kaya natin itong ibalik, at mahigitan pa. Kaya nating ibalik ang suporta at paghanga ng mga Pilipino sa ating railroad system.</p>
<p>Tayo ay gagawa ng isang railroad network na world-class - maipagmamalaki hindi lamang sa Asya, kundi pati na sa buong mundo. Mga bago, moderno, at mabilis na tren na tatakbo mula Clark hanggang Calamba patuloy hanggang Bicol.</p>
<p>Hindi na mauubos ang oras ng ating mga kababayan sa pagbiyahe araw-araw. Magkakaroon na sila ng mas marami oras para sa kanilang pamilya.</p>
<p>Mas pipiliin na ng ating mga kababayan mag-tren kaysa magmaneho ng sasakyan. Mas mabilis nang makakauwi ang ating mga kababayan sa kani-kanilang probinsya.</p>
<p>Ang mga estudyante sa ating mga karatig-lalawigan ay makakapag-aral na sa Maynila nang hindi mawawalay sa kanilang mga pamilya.</p>
<p>Mabibigyan na natin ng lunas ang traffic sa Metro Manila.</p>
<p>Trabaho. Maunlad na ekonomiya. At maaasahang transportasyong pampubliko. Ito ang pangako ng NSCR at South Long-Haul (SLH) Project para sa Pilipino.</p>
<p>Kagaya ng pag-unlad na dala ng PNR sa ating bansa noong una itong pinatakbo, ganoon din ang pag-unlad na maidudulot ng NSCR at SLH Project.</p>
<p>Aside from reducing travel time, the NSCR and SLH Project will catalyze and spur economic boom and urban growth and development along their paths.</p>
<p>Both projects will provide much needed critical connectivity to our people via world-class passenger rail services.</p>
<p>There is no doubt the NSCR and SLH Project will usher in the renaissance of the rail industry in the country. These rail systems will be the primary rail backbones, linking Metro Manila to the regions in northern and southern Luzon.</p>
<p>They will create thousands of jobs during construction and operation. They will create significant growth multiplier effects in the economy through supplier contracts. There will be opportunities through improved and reliable connectivity.</p>
<p>Kung ngayon ay proud na tayo na nagtratrabaho sa PNR, tiyak na mas magiging proud pa tayo na maging bahagi ng NSCR at SLH Project.</p>
<p>Naniniwala ako na sa sama-sama nating pagtutulungan, matutupad ang inaasam natin para sa PNR.</p>
<p>The NSCR and South-Long Haul are at the forefront of the transformation towards compliance to global standards.</p>
<p>I appeal to PNR employees to help improve the travel experience of train passengers.</p>
<p>Our job goes beyond transporting people and goods from point A to point B. An efficient and effective rail system ultimately contributes to the country’s economic rebound.</p>
<p>Improving the lives of Filipinos through an improved PNR should be your daily mantra.</p>
<p>Maraming salamat sa lahat ng ating kapwa lingkod-bayan sa PNR.</p>
<p>Maging makabuluhan nawa ang inyong pagdiriwang ng inyong anibersaryo sa araw na ito.</p>
<p>Magandang umaga at maraming salamat.<br><br></p>
</div>
<br><br>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php require_once('footer.php'); ?>
