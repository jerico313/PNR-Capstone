<?php

include("header.php");
include("sidenav.php");

require_once('inc/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Tracking</title>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-39kL7C0qgq6EcW6sYLsaov9gCOvC3lI&libraries=geometry&callback=initMap"></script>
<style>
body {
   
}

.content {
    padding: 20px;
}

.custom-box {
    display: flex;
    justify-content: space-between; /* This aligns the title to the left and button container to the right */
    align-items: center; /* This centers them vertically */
    padding: 10px; /* Adjust padding as needed */
    background-color: #174793; /* Example background color */
    color: white; /* Adjust text color as needed */

}

.button-container{
    display: flex;
    gap: 10px; /* This adds space between the buttons */
    /* Add any additional styling for the button container here */
}

.box-title {
    margin-left: auto;
}

.btn-submit {
    background-color: #28a745;
    color: #fff;
    margin-right: 10px;
}

.train-map {
    height: 500px;
    width: 100%;
}

.status-update-form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    padding: 3px; 
    font-size: 14px; 
    border-radius: 10px;
    width: 140px;
}

.btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
    padding: 5px 10px;
    border-radius: 10px;
    height:30px;
    font-size: 14px;
    width: 140px;
    padding: 3px; 
    display: block;
}

#shareLocationButton{
    display: block;
    background-color: #FFC30B;
    border-color: #FFC30B;
    padding: 3px; 
    font-size: 14px; 
    border-radius: 10px;
    height:30px;
    width: 140px;
    color: black;
}

.status-update-form{
    background-color: #fff;
    border-radius: 10px;
    padding:20px;
    background: radial-gradient(circle at 100% 100%, #ffffff 0, #ffffff 3px, transparent 3px) 0% 0%/8px 8px no-repeat,
            radial-gradient(circle at 0 100%, #ffffff 0, #ffffff 3px, transparent 3px) 100% 0%/8px 8px no-repeat,
            radial-gradient(circle at 100% 0, #ffffff 0, #ffffff 3px, transparent 3px) 0% 100%/8px 8px no-repeat,
            radial-gradient(circle at 0 0, #ffffff 0, #ffffff 3px, transparent 3px) 100% 100%/8px 8px no-repeat,
            linear-gradient(#ffffff, #ffffff) 50% 50%/calc(100% - 10px) calc(100% - 16px) no-repeat,
            linear-gradient(#ffffff, #ffffff) 50% 50%/calc(100% - 16px) calc(100% - 10px) no-repeat,
            linear-gradient(345deg, transparent 0%, #00B4D8 100%),
            linear-gradient(90deg, transparent 0%, #174793 100%);
}
</style>
</head>
<body>
          <!--$%adsense%$-->
      <!-- Start DEMO HTML (Use the following code into your project)-->
      <div class="content">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12 pt-5">
                    <h3></h3>
                    <div class="custom-box yellow-box">
                        <p style="margin-top:15px;"><strong>Train Tracking</strong></p>
                        <div class="button-container">
                        <button type="button" id="shareLocationButton" class="btn btn-submit" style="display:block;margin-left:auto;margin-right:10px;margin-top:0">Share Location</button>
                        <button id="stopTrackingButton" class="btn btn-danger" onclick="stopTracking()">Stop Tracking</button>
                        </div>
                    </div>
                    <div id="trainMap" class="train-map" style="border-radius: 0px 0px 15px 15px;"></div>
                    <!-- Status Update Form -->
                    <div class="status-update-form" style="border-radius:10px;">
                        <h4>Update Train Status</h4>
                        <form id="trainStatusForm">
                            <div class="form-group">
                                <label for="trainSelect">Select Train:</label>
                                <select id="trainSelect" name="trainSelect" class="form-control">
                                    <!-- Options will be populated based on the trains available -->
                                </select>
                                <!-- Current Status Field -->
                            </div>
                            <div class="form-group">
                                <label for="currentStatus">Current Status:</label>
                                <input type="text" id="currentStatus" name="currentStatus" class="form-control" placeholder="Current train status" readonly>
                            </div>

                            <div class="form-group">
                                <label for="trainStatus">Status:</label>
                                <input type="text" id="trainStatus" name="trainStatus" class="form-control" placeholder="Enter train status" required>
                            </div>

                            <button type="submit" class="btn btn-primary button-20">Submit Status</button>
                        </form>
                    </div>
                </div>
      
        </div>
    </div>

    <script>
    let map;
    let trainMarkers = {};
    let trainIcon;
    let trainPaths = {};
    let lastKnownPositions = {};
    let isFetchingTrainLocations = false;
    const debounceDelay = 20000; // 20 seconds
    let statusUpdateDebounceTimers = {};
    
    const stations = [
    { name: "Tutuban", lat: 14.611409972487984, lng: 120.97309704486716 },
    { name: "Blumentritt", lat: 14.622610246132652, lng: 120.98349999539792},
    { name: "Laon-Laan", lat: 14.616796481221904, lng:  120.99244948739404},
    { name: "Espana", lat: 14.61233596081873, lng: 120.99692285429391},
    { name: "Santa Mesa", lat: 14.600788778113015, lng: 121.01037060583192},
    { name: "Pandacan", lat: 14.590259453694232, lng: 121.00880535981706},
    { name: "Paco", lat: 14.579494556384564, lng:  120.9994073266805},
    { name: "San Andres", lat: 14.573253324626734, lng: 120.99944582484589},
    { name: "Vito Cruz", lat: 14.56721127582891, lng: 121.00284093650225},
    { name: "Buendia", lat: 14.55709781886503, lng: 121.0082457906122},
    { name: "Pasay Road", lat: 14.549661216352531, lng: 121.0121782665612},
    { name: "EDSA", lat: 14.541550565872898, lng: 121.01673802188614},
    { name: "Nichols", lat: 14.523736547691772, lng: 121.02626853772468 },
    { name: "FTI", lat: 14.50640819152843, lng: 121.03568642706891},
    { name: "Bicutan", lat: 14.488022511895421, lng: 121.04545492423244},
    { name: "Sucat", lat: 14.4523129726297, lng: 121.05093731318676},
    { name: "Alabang", lat: 14.417162331827962, lng: 121.04756883097708}
    
];

    const railwayPathCoordinates = [
    { lat: 14.417249256, lng: 121.047584474 }, // Alabang
    { lat: 14.418836602306497, lng: 121.04770129751545 }, // Waypoint
    { lat: 14.426799163, lng: 121.04794751186547 }, // Waypoint
    { lat: 14.428885809563896, lng: 121.04820676578679 }, // Waypoint
    { lat: 14.433353646790188, lng: 121.04871102108139 }, // Waypoint
    { lat: 14.44084486572342, lng: 121.04958005680257 }, // Waypoint
    { lat: 14.448179989689528, lng: 121.05047055019446 }, // Waypoint
    { lat: 14.452648091339315, lng: 121.05098651597602 }, // Sucat
    { lat: 14.465398680913934, lng: 121.05234232321139 }, // Waypoint
    { lat: 14.47054077422197, lng: 121.05085538239321 }, // Waypoint
    { lat: 14.477155655351169, lng: 121.05075032977157 }, // Waypoint
    { lat: 14.48315749587395, lng: 121.04797497599122 }, // Waypoint
    { lat: 14.488202805435376, lng: 121.04544295044188 }, // Bicutan
    { lat: 14.495979724414882, lng: 121.0411489133825 }, // Waypoint
    { lat: 14.500856697717163, lng: 121.03850883478663 }, // Waypoint
    { lat: 14.503790805356214, lng: 121.03692284310264 }, // Waypoint
    { lat: 14.50627291930828, lng: 121.03561084978101 }, // FTI
    { lat: 14.513051567559593, lng: 121.03197257290326 }, // Waypoint
    { lat: 14.519299517806962, lng: 121.02856849132893 }, // Waypoint
    { lat: 14.5237289614852, lng: 121.02603488830385 }, // Nichols
    { lat: 14.52876395976438, lng: 121.02352983720888 }, // Waypoint
    { lat: 14.534211490423909, lng: 121.0205783213942 }, // Waypoint
    { lat: 14.537792311558494, lng: 121.01859096741147 }, // Waypoint
    { lat: 14.541797472098235, lng: 121.01653418922285 }, // Edsa
    { lat: 14.543790963438177, lng: 121.01542017151533 }, // Waypoint
    { lat: 14.546849983466114, lng: 121.01373246654549 }, // Waypoint
    { lat: 14.54990543440089, lng: 121.012183355774 }, // Pasay Road
    { lat: 14.552352019016064, lng: 121.01076272816687 }, // Waypoint
    { lat: 14.555052008486673, lng: 121.00932506413328 }, // Waypoint
    { lat: 14.556495428215094, lng: 121.00853116152449}, // Waypoint
    { lat: 14.557080207621919, lng: 121.00825644012767 }, // Buendia
    { lat: 14.560265014643035, lng: 121.00647894991673 }, // Waypoint
    { lat: 14.563772212068178, lng: 121.0045926914227 }, // Waypoint
    { lat: 14.567273201917098, lng: 121.00277281322822 }, // Vito Cruz
    { lat: 14.56940923449731, lng: 121.00158129629095 }, // Waypoint
    { lat: 14.571742761628144, lng: 121.00034409278797 }, // Waypoint
    { lat: 14.573341536703936, lng: 120.99949969673874 }, // San Andres
    { lat: 14.574742145524493, lng: 120.9987109207048 }, // Waypoint
    { lat: 14.575785531159106, lng: 120.9981700477537 }, // Waypoint
    { lat: 14.577633792611861, lng: 120.99818077658978 }, // Waypoint
    { lat: 14.579295138032748, lng: 120.9994682369191 }, // Paco
    { lat: 14.581664722133208, lng: 121.00139701618565 }, // Waypoint
    { lat: 14.58498331371333, lng: 121.00425710132762 }, // Waypoint
    { lat: 14.588316538991343, lng: 121.00716270506447 }, // Waypoint
    { lat: 14.59026340712805, lng: 121.00879982755414 }, // Pandacan
    { lat: 14.592561926033452, lng: 121.01076867544714 }, // Waypoint
    { lat: 14.596301925327221, lng: 121.01347676252794 }, // Waypoint
    { lat: 14.597267501997583, lng: 121.01350894903518 }, // Waypoint
    { lat: 14.59853416601143, lng: 121.01291886305047 }, // Waypoin
    { lat: 14.599396950690082, lng: 121.01200526397984 }, // Waypoin
    { lat: 14.600887215021734, lng: 121.01041091970413 }, // Sta. Mesa
    { lat: 14.60195911251999, lng: 121.0089024129949 }, // Waypoint
    { lat: 14.602916532776, lng: 121.00750913659648 }, // Waypoint
    { lat: 14.604313392544709, lng: 121.00448682026473 }, // Waypoint
    { lat: 14.607022056983594, lng: 121.00191409555543 }, // Waypoint
    { lat: 14.609283143004147, lng: 120.99972920292949 }, // Waypoint
    { lat: 14.612331469635233, lng: 120.99694322301097 }, // Espana
    { lat: 14.614066368535429, lng: 120.99514090835129 }, // Waypoint
    { lat: 14.615571266504745, lng: 120.99372224543022 }, // Waypoint
    { lat: 14.616850828429733, lng: 120.99266471176965 }, // Laon-Laan
    { lat: 14.61997578666497,  lng: 120.98953453455977 }, // Waypoint
    { lat: 14.622144530969047, lng: 120.98720986665901 }, // Waypoint
    { lat: 14.62236475248077, lng: 120.98636018619098 }, // Wayppoint
    { lat: 14.62267306222617, lng: 120.98352286034232 }, // Blumentritt
    { lat: 14.623198777885364, lng: 120.97787535833291 }, // Wayppoint
    { lat: 14.622934513048437, lng: 120.97638841751382 }, // Wayppoint
    { lat: 14.622141716629603, lng: 120.97533390336152 }, // Wayppoint
    { lat: 14.621385621068807, lng: 120.97490147669615 }, // Wayppoint
    { lat: 14.620702930589369, lng: 120.97475733447563 }, // Wayppoint
    { lat: 14.615523163130613, lng: 120.9740228543208 }, // Wayppoint
    { lat: 14.611385304162207, lng: 120.9730440862794 }, // Tutuban
];
        // Initialize and add the map
        function initMap() {
            trainIcon = {
            url: '../assets/train.png', // URL to the train icon image
            scaledSize: new google.maps.Size(30, 30), // Size of the icon
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(20, 20) // Center point of the icon
        };

            map = new google.maps.Map(document.getElementById('trainMap'), {
                zoom: 12,
                center: {lat: 14.525186, lng: 121.031835} // Set this to your desired center
            });

            initializeTrainPath();
            updateTrainLocations();

            // Optionally initialize the train locations
                    // Call updateTrainLocations at regular intervals
            setInterval(updateTrainLocations, 30000); // Update every 10 seconds, adjust as needed
        }

        function initializeTrainPath(trainId) {
            trainPaths[trainId] = new google.maps.Polyline({
                path: railwayPathCoordinates,
                geodesic: true,
                strokeColor: '#d96c0d',
                strokeOpacity: 4.0,
                strokeWeight: 5
            });
            trainPaths[trainId].setMap(map);
        }
        
        // Function to update train locations
        function updateTrainLocations() {
            if (isFetchingTrainLocations) {
                return; // Skip if already fetching locations
            }

            isFetchingTrainLocations = true;
            fetch('get-train-locations.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(trains => {
                    trains.forEach(train => {
                        const trainData = {
                            trainId: train.train_id.toString(),
                            train_no: train.train_no
                        };
                        const newPosition = {
                            lat: parseFloat(train.latitude),
                            lng: parseFloat(train.longitude)
                        };

                        if (hasPositionChanged(trainData.trainId, newPosition)) {
                            updateTrainPosition(trainData, newPosition, () => {

                            
                                            // Only update the last known position after the status has been determined and sent
                            lastKnownPositions[trainData.trainId] = newPosition;
                            });
                        }

                    });
                })
                .catch(error => {
                    console.error('Error fetching train locations:', error);
                })
                .finally(() => {
                    isFetchingTrainLocations = false;
                });
        }

        function hasPositionChanged(trainId, newPosition) {
            const lastPosition = lastKnownPositions[trainId];
            if (!lastPosition) return true; // No last known position, so it's a change

            const significantChangeThreshold = 0.0001; // Adjust threshold as needed
            const latChange = Math.abs(lastPosition.lat - newPosition.lat);
            const lngChange = Math.abs(lastPosition.lng - newPosition.lng);
            
            return latChange > significantChangeThreshold || lngChange > significantChangeThreshold;
        }
        // Function to update the position of a train's marker
        function updateTrainPosition(trainData, newPosition, updateLastKnownPositionCallback) {
            let latLng = new google.maps.LatLng(newPosition.lat, newPosition.lng);

            // Find the closest segment on the railway path
            let closestSegment = findClosestSegment(latLng, railwayPathCoordinates);

            // Update the marker's position to the closest point on the closest segment
            if (!trainMarkers[trainData.train_no]) {
                trainMarkers[trainData.train_no] = new google.maps.Marker({
                    position: closestSegment.closestPoint,
                    map: map,
                    icon: trainIcon,
                    title: "Train " + trainData.train_no
                });
            // Create an info window for the marker
            const infoWindow = new google.maps.InfoWindow({
                content: "Train " + trainData.train_no
            });

            // Attach the info window to the marker
            trainMarkers[trainData.train_no].addListener('click', function() {
                infoWindow.open(map, trainMarkers[trainData.train_no]);
            });
            } else {
                animateMarkerToPosition(trainMarkers[trainData.train_no], closestSegment.closestPoint, 1000);
            }
                // Debounce the status update
            debounceStatusUpdate(trainData, newPosition, updateLastKnownPositionCallback);
            if (typeof updateLastKnownPositionCallback === 'function') {
        updateLastKnownPositionCallback();
    }
         }

         function debounceStatusUpdate(trainData, newPosition, updateLastKnownPositionCallback) {
            // Clear any existing timeout for this train to prevent multiple triggers
            clearTimeout(statusUpdateDebounceTimers[trainData.trainId]);

            // Set a new timeout for updating the status
            statusUpdateDebounceTimers[trainData.trainId] = setTimeout(() => {
                const status = determineTrainStatus(trainData.trainId, newPosition);
                if (status && status !== trainData.currentStatus) {
                    trainData.currentStatus = status;
                    sendStatusUpdateToServer(trainData.trainId, status, newPosition, updateLastKnownPositionCallback);          }
            }, debounceDelay);
    }
        function sendStatusUpdateToServer(trainId, status, newPosition, updateLastKnownPositionCallback) {
            // Send status update to your server
            console.log(`Sending status update for trainId: ${trainId} with status: ${status}`);
            fetch('update-train-status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ trainId, status })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Status update sent:', data);
                if (data.success) {
                updateLastKnownPositionCallback(); // Update the last known position after successful status update
        }else {
            console.error('Status update failed:', data.message);
        }
            })
            .catch(error => {
                console.error('Error sending status update:', error);
            });
        }


        
        // Utility function to find the closest point on the path
        function findClosestSegment(position, pathCoordinates) {
            let closestSegment = null;
            let closestPoint = null;
            let minDist = Infinity;

            for (let i = 0; i < pathCoordinates.length - 1; i++) {
                let segmentStart = new google.maps.LatLng(pathCoordinates[i].lat, pathCoordinates[i].lng);
                let segmentEnd = new google.maps.LatLng(pathCoordinates[i + 1].lat, pathCoordinates[i + 1].lng);

                // Check distance to both ends of the segment
                let distToStart = google.maps.geometry.spherical.computeDistanceBetween(position, segmentStart);
                let distToEnd = google.maps.geometry.spherical.computeDistanceBetween(position, segmentEnd);

                // Determine the closest point on the segment
                let tempClosestPoint = distToStart < distToEnd ? segmentStart : segmentEnd;
                let dist = Math.min(distToStart, distToEnd);

                if (dist < minDist) {
                    closestSegment = { start: segmentStart, end: segmentEnd };
                    closestPoint = tempClosestPoint;
                    minDist = dist;
                }
            }

            return { closestSegment: closestSegment, closestPoint: closestPoint };
        }



        // Function to update train locations


        function animateMarkerToPosition(marker, newPosition, duration = 1000) {
            const start = new Date().getTime();
            const startPos = marker.getPosition();
            const endPos = newPosition instanceof google.maps.LatLng ? newPosition : new google.maps.LatLng(newPosition.lat, newPosition.lng);

            const animateStep = () => {
                const now = new Date().getTime();
                const progress = Math.min(1, (now - start) / duration);

                const lat = startPos.lat() + (endPos.lat() - startPos.lat()) * progress;
                const lng = startPos.lng() + (endPos.lng() - startPos.lng()) * progress;

                marker.setPosition(new google.maps.LatLng(lat, lng));

                if (progress < 1) {
                    requestAnimationFrame(animateStep);
                }
            };

            requestAnimationFrame(animateStep);
        }
    function getNearestStation(trainPosition) {
        let nearestStation = null;
        let minDist = Infinity;

        stations.forEach(station => {
            let dist = google.maps.geometry.spherical.computeDistanceBetween(
                new google.maps.LatLng(station.lat, station.lng),
                new google.maps.LatLng(trainPosition.lat, trainPosition.lng)
            );
            console.log(station.name + " distance: " + dist); // Debugging line

            if (dist < minDist) {
                nearestStation = station;
                minDist = dist;
            }
        });
        console.log("Nearest Station: " + nearestStation.name); // Debugging line
        return { station: nearestStation, distance: minDist };
    }

    function determineTrainStatus(trainId, trainPosition) {
    const proximity = getNearestStation(trainPosition);
    const arrivingThreshold = 1500; // Adjust as needed
    const arrivedThreshold = 100; // Adjust as needed
    const departingThreshold = 400; // Adjust as needed

    const lastPosition = lastKnownPositions[trainId];
    if (lastPosition) {
        const movingTowardsStation = isMovingTowardsStation(lastPosition, trainPosition, proximity.station);
        console.log(`Train ${trainId}: Moving towards station: ${movingTowardsStation}, Distance: ${proximity.distance}`);

        if (proximity.distance <= arrivingThreshold && movingTowardsStation) {
            console.log(`Train ${trainId} is arriving at ${proximity.station.name}`);
            return "Arriving at " + proximity.station.name;
        } else if (proximity.distance <= arrivedThreshold) {
            console.log(`Train ${trainId} has arrived at ${proximity.station.name}`);
            return "Arrived at " + proximity.station.name;
        } else if (proximity.distance > arrivedThreshold && proximity.distance <= departingThreshold && !movingTowardsStation) {
            console.log(`Train ${trainId} is departing from ${proximity.station.name}`);
            return "Departed from " + proximity.station.name;
        }else {
            // If the train is not within any threshold
            return `In transit to ${proximity.station.name}`;
        }
    }
    return "In transit";
}



function isMovingTowardsStation(lastPosition, newPosition, station) {
    const lastDistance = google.maps.geometry.spherical.computeDistanceBetween(
        new google.maps.LatLng(lastPosition.lat, lastPosition.lng),
        new google.maps.LatLng(station.lat, station.lng)
    );

    const currentDistance = google.maps.geometry.spherical.computeDistanceBetween(
        new google.maps.LatLng(newPosition.lat, newPosition.lng),
        new google.maps.LatLng(station.lat, station.lng)
    );

    console.log(`Train moving towards station - Last Distance: ${lastDistance}, Current Distance: ${currentDistance}`);

    return currentDistance < lastDistance; // True if the train is moving towards the station
}








        // Function to update or create a marker for a train

    let watchID;
    let lastSentTime = Date.now();
      document.getElementById('shareLocationButton').addEventListener('click', function() {
    if (navigator.geolocation) {
        watchID = navigator.geolocation.watchPosition(function(position) {
            let currentTime = Date.now();
            if (currentTime - lastSentTime >= 5000) { // Check if 5 seconds have passed
                sendLocation(position); // Send location data
                lastSentTime = currentTime; // Update the last sent time
            }
        }, showError);
    } else { 
        alert("Geolocation is not supported by this browser.");
    }
});

function sendLocation(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const employeeId = <?php echo json_encode($_SESSION['employee_id']); ?>;

    // Send this data to your server
    fetch('track_endpoint.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ latitude, longitude, employee_id: employeeId }),
    })
    .then(response => response.json())
    .then(data => {    
        console.log('Location update sent:', data);
        alert('Location updated');
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("User denied the request for Geolocation.");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            alert("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.");
            break;
    }
}

function stopTracking() {
    alert("Tracking stopped. Reset location permissions of your browser and Refresh the browser to start again.")
    console.log("Stop Tracking")
    if (navigator.geolocation && watchID !== undefined) {
        navigator.geolocation.clearWatch(watchID);
        watchID = undefined; // Reset watchID
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const selectBox = document.getElementById('trainSelect');
    const currentStatusInput = document.getElementById('currentStatus');

    // Function to update the current status
    function updateCurrentStatus() {
        const trainId = selectBox.value;
        if (trainId) {
            // Call get_trains.php with the trainId parameter to get the current status
            fetch(`get_trains.php?trainId=${trainId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        currentStatusInput.value = data.currentStatus;
                    } else {
                        currentStatusInput.value = 'No current status';
                    }
                })
                .catch(error => {
                    console.error('Error fetching current status:', error);
                    currentStatusInput.value = 'Error fetching status';
                });
        }
    }

    // Populate the train select box
    fetch('get_trains.php')
        .then(response => response.json())
        .then(trains => {
            trains.forEach(train => {
                const option = document.createElement('option');
                option.value = train.train_id;
                option.textContent = train.train_no;
                selectBox.appendChild(option);
            });
            // Trigger change event after populating to display the status of the first train
            selectBox.dispatchEvent(new Event('change'));
        })
        .catch(error => {
            console.error('Error fetching trains:', error);
        });

    // Listen for changes to the select box
    selectBox.addEventListener('change', function() {
        // Update the current status when a new train is selected
        updateCurrentStatus();
    });

    // Update the current status periodically
    setInterval(updateCurrentStatus, 30000); // every 10 seconds
});

document.getElementById('trainSelect').addEventListener('change', function() {
        const selectedTrainId = this.value;
        focusMapOnTrain(selectedTrainId);

    });

function focusMapOnTrain(trainId) {
        // Assuming you have the train's location stored in lastKnownPositions
        const trainPosition = lastKnownPositions[trainId];
        if (trainPosition) {
            const position = new google.maps.LatLng(trainPosition.lat, trainPosition.lng);
            map.panTo(position);
            map.setZoom(15); // Adjust zoom level as needed
        }else{
            console.log("Train position not found for train ID:", trainId);
        }
    }

document.getElementById('trainStatusForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const trainSelect = document.getElementById('trainSelect');
    const trainId = trainSelect.value; // This should be the train_id, not train_no
    const status = document.getElementById('trainStatus').value;

    console.log(`Updating status for trainId: ${trainId} with status: ${status}`);

    // Use the trainId to send in your request
    fetch('update-train-status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            // Include any other headers like authentication tokens if necessary
        },
        body: JSON.stringify({ trainId: trainId, status: status })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Handle success
        // alert('Status updated successfully.');
        // Clear the status field after successful update
        trainStatus.value = '';
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle errors
        alert('Failed to update status.');
    });
});
</script>


</body>
</html>
