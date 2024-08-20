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
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">TRANSPARENCY</h1>
    </div>
</div>
    </div>
    <div class="container-fluid mt-auto pt-4">
    <div class="row">
        <div class="col-md-3">
        <center>
        <img src="images/transparency-seal.png" width=200 height=200 alt="transparency-seal">
        </center>
        </div>
        <div class="col-md-9" style="font-size:13px;text-align: justify;padding-right:75px;">
            <p>A pearl buried inside a tightly-shut shell is practically worthless. Government information is a pearl, meant to be shared with the public in order to maximize its inherent value.</p>
            <p><br>The Transparency Seal, depicted by a pearl shining out of an open shell, is a symbol of a policy shift towards openness in access to government information. On one hand, it hopes to inspire Filipinos in the civil service to be more open to citizen engagement; on the other, to invite the Filipino citizenry to exercise their right to participate in governance.</p>
            <p><br>This initiative is envisioned as a step in the right direction towards solidifying the position of the Philippines as the Pearl of the Orient – a shining example for democratic virtue in the region.</p>
        </div>
    </div>
    </div>

    <center>
    </p><strong>PNR Compliance with Sec. 93 (Transparency Seal) R.A. No. 10155 (General Appropriations Act FY 2012)<strong></p>
    </center>

    <div class="accordion" id="accordionPanelsStayOpenExample" style="padding:0 75px 30px 75px;">
    <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
      <strong>I. The Corporation’s mandates and functions; names of its officials with their position and designation, and contact information</strong>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
       <p><strong>A. PNR Charter</strong></p>
       <ul>
        <li><a href="">RA 10638</a></li>
        <li><a href="">RA 6366</a></li>
        <li><a href="">RA 4156</a></li>
        </ul>
        <p><strong>B. <a href="">PNR Corporate Mandate</a></strong></p>
        <p><strong>C. <a href="">Corporate Mission and Vision</a></strong></p>
        <p><strong>D. <a href="">PNR Key Officials</a></strong></p>
      </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
          <strong>II. Anual Audited Financial Statements</strong>
        </button>
      </h2>
      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
      <p><strong>A. Financial Statements</strong></p>
       <ul style="text-decoration:none;">
        <li><a href="">2022</a></li>
        <li><a href="">2021</a></li>
        <li><a href="">2020</a></li>
        <li><a href="">2019</a></li>
        <li><a href="">2018</a></li>
        <li><a href="">2017</a></li>
        <li><a href="">2016</a></li>
        <li><a href="">2015</a></li>
        <li><a href="">2014</a></li>
        <li><a href="">2013</a></li>
        <li><a href="">2012</a></li>
        <li><a href="">2011</a></li>
        <li><a href="">2010</a></li>
        <li><a href="">2009</a></li>
        <li><a href="">2008</a></li>
        </ul>
        <p><strong>B. Annual Reports</strong></p>
        <ul>
        <li><a href="">2018</a></li>
        <li><a href="">2017</a></li>
        <li><a href="">2015</a></li>
        <li><a href="">2014</a></li>
        </ul>
      </div>
      </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        <strong>III. Approved Corporate Operating Budget</strong>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
      <ul style="list-style-type: decimal;">
        <li><a href="">2022[PDF]</a></li>
        <li><a href="">2021[PDF]</a></li>
        <li><a href="">2020[PDF]</a></li>
        <li><a href="">2019[PDF]</a></li>
        <li><a href="">2018[PDF]</a></li>
        <li><a href="">2017[PDF]</a></li>
        <li><a href="">2016[PDF]</a></li>
        <li><a href="">2015[PDF]</a></li>
        <li><a href="">2014[PDF]</a></li>
        <li><a href="">2013[PDF]</a></li>
        <li><a href="">2012[PDF]</a></li>
        <li><a href="">2011[PDF]</a></li>
      </ul>
      </div>
      </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
        <strong>IV. Procurement</strong>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
      <div class="accordion-body">
      <p><strong>A. Annual Procurement Plan</strong></p>
       <ul>
        <li><a href="">2023</a></li>
        <li><a href="">2022</a></li>
        <li><a href="">2021</a></li>
        <li><a href="">2020</a></li>
        <li><a href="">2019</a></li>
        <li><a href="">2018</a></li>
        <li><a href="">2017</a></li>
        <li><a href="">2016</a></li>
        <li><a href="">2015</a></li>
      </ul>
      <p><strong>B. <a href="">Procurement Monitoring Report</a></strong></p>
      <p><strong>C. Agency Procurement Compliance and Performance Indicators</strong></p>
      <p><strong>D. <a href="">Contracts Awarded</a></strong></p>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
        <strong>V. Quality Management System</strong>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
      <div class="accordion-body">
      <ul>
        <li><a href="">PNR Quality Manualn</a></li>
        <li><a href="">Procedure and Work Instruction Manual</a></li>
        <li><a href="">PNR ISO Certificatio</a></li>
      </ul>
      </div>
      </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
        <strong>VI. Agency Review and Compliance Procedure CSC October 1, 2019 of Statement and Financial Disclosures</strong>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
      <div class="accordion-body">
      <ul>
      <li><a href="">FY 2022</a></li>
      </ul>
      </div>
      </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
        <strong>VII. Freedom of Information (FOI)</strong>
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
      <div class="accordion-body">
        <ul>
        <li><a href="">FOI Manual</a></li>
        <li><a href="">Request for Access to Documents/ Information</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php require_once('footer.php'); ?>