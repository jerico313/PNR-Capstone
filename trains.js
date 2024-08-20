let map;
let trainMarkers = {};
let trainIcon;
let trainPaths = {};
let lastKnownPositions = {};
let isFetchingTrainLocations = false;

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
        url: 'assets/train.png', // URL to the train icon image
        scaledSize: new google.maps.Size(30, 30), // Size of the icon
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(20, 20) // Center point of the icon
    };

        map = new google.maps.Map(document.getElementById('trainMap'), {
            zoom: 12,
            center: {lat: 14.525186, lng: 121.031835} // Set this to your desired center
        });

        updateTrainLocations();
        initializeTrainPath();
        // Optionally initialize the train locations
                // Call updateTrainLocations at regular intervals
        setInterval(updateTrainLocations, 10000); // Update every 10 seconds, adjust as needed
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

    function updateTrainPosition(trainData, currentPosition) {
        let latLng = new google.maps.LatLng(currentPosition.lat, currentPosition.lng);

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
    function updateTrainLocations() {
        if (isFetchingTrainLocations) {
            return; // Skip if already fetching locations
        }

        isFetchingTrainLocations = true;
        fetch('employee/get-train-locations.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(trains => {
                trains.forEach(train => {
                    const trainData = {
                        trainId: train.train_id.toString(), // Keep using trainId for internal logic
                        train_no: train.train_no  // Add train_no for UI display
                    };
                    const newPosition = {
                        lat: parseFloat(train.latitude),
                        lng: parseFloat(train.longitude)
                    };

                    // Here, use trainData.trainId instead of just trainId
                    if (hasPositionChanged(trainData.trainId, newPosition)) {
                        // And here as well, pass the whole trainData object
                        updateTrainPosition(trainData, newPosition);
                        // Make sure lastKnownPositions stores the position using trainData.trainId as the key
                        lastKnownPositions[trainData.trainId] = newPosition;
                        if (trainMarkers[trainData.train_no]) {
                            const infoWindow = trainMarkers[trainData.train_no].infoWindow;
                                if (infoWindow) {
                                infoWindow.setContent("Train " + trainData.train_no);
                            }
                        }
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

        const significantChangeThreshold = 0.0003; // Adjust threshold as needed
        return Math.abs(lastPosition.lat - newPosition.lat) > significantChangeThreshold ||
            Math.abs(lastPosition.lng - newPosition.lng) > significantChangeThreshold;
    }
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

    function populateTrainList() {
        fetch('get_trains.php') // Ensure this URL is correct and the server is responding with JSON data
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(trains => {
                const selectBox = document.getElementById('trainSelect');
                selectBox.innerHTML = ''; // Clear existing options
    
                trains.forEach(train => {
                    const option = document.createElement('option');
                    option.value = train.train_id;
                    option.textContent = train.train_no; // Ensure 'train_no' is a valid property in your train objects
                    selectBox.appendChild(option);
                });
    
                // Optionally, trigger a change event after populating to auto-select the first train
                if (selectBox.options.length > 0) {
                    selectBox.dispatchEvent(new Event('change'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Optionally, handle user-facing error feedback here
            });
    }
    
    // Call populateTrainList on page load or DOMContentLoaded event
    document.addEventListener('DOMContentLoaded', populateTrainList);
    
    document.getElementById('trainSelect').addEventListener('change', function() {
        const selectedTrainId = this.value;
        focusMapOnTrain(selectedTrainId);
        displayTrainStatus(selectedTrainId);
    });
    
    // Ensure focusMapOnTrain and displayTrainStatus functions are defined and working
    
    
    function focusMapOnTrain(trainId) {
        // Assuming you have the train's location stored in lastKnownPositions
        const trainPosition = lastKnownPositions[trainId];
        if (trainPosition) {
            const position = new google.maps.LatLng(trainPosition.lat, trainPosition.lng);
            map.panTo(position);
            map.setZoom(15); // Adjust zoom level as needed
        }
    }
    
    function displayTrainStatus(trainId) {
        // Debugging: Log the trainId to ensure the function is being called
        console.log('Fetching status for train:', trainId);
    
        fetch(`get_train_status.php?trainId=${trainId}`) // Adjust URL to your PHP script
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Debugging: Log the data received from the server
                console.log('Status data received:', data);
    
                // Assuming 'data' contains a property named 'currentStatus'
                document.getElementById('currentStatus').value = data.currentStatus;
            })
            .catch(error => {
                console.error('Error fetching current status:', error);
                // Handle errors, such as by displaying a default message
                document.getElementById('currentStatus').textContent = 'Status unavailable';
            });
    }
    



// Existing functions to initialize map and update train positions