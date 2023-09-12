<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        #modelViewer {
            width: 500px;
            height: 500px;
            background-color: #000;
        }
    </style>
    
<model-viewer 
id="modelViewer" 
alt="compu" 
src="./assets/model/compu.glb" 
camera-controls 
camera-orbit="65 deg 55 deg 2.5m"
auto-rotate>

</model-viewer>


<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.1.1/model-viewer.min.js"></script>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
<!-- Use it like any other HTML element -->

</body>
</html>