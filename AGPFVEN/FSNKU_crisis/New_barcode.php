<?php
    //Includes
    include("includes/header.php");
?>

<form action="Syncro_FSNKU.php" method="POST" class="btn btn btn-lg btn-block">

    <div class="input-group mb-2">
        
        <select class="custom-select" name="from_location" id="inputGroupSelect01" wtx-context="71D597DE-4C86-4B2A-B7C5-7A5F808BCC7D">
            
            <option selected="">From...</option>
            <option value="FSNKU_USA">USA</option>
            <option value="FSNKU_SPAIN">SPAIN</option>
            <option value="FSNKU_UK">UK</option>
                        
        </select>

        <div class="input-group-prepend">
            <span name="this_FSNKU" class="btn btn-outline-secondary" type="submit" id="span-addon1"></span>
        </div>

        <input id="myInput" name="Location" type="text" class="form-control" placeholder="FSNKU" aria-describedby="basic-addon1">

    </div>

    <div class="form-group">
    
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Poner documento aquí.</p>

    </div>

    <button name="Button_1" class="btn btn-info btn-lg btn-block" type="submit" id="button-addon1">Process</button>

</form>

<!-- <form action="Upload_Barcode.php" method="POST" class="btn btn btn-lg btn-block">

    <div class="row">
        <div class="col-md-9 col-md-push-3">
        
            <span name="this_FSNKU" class="btn btn-outline-secondary" type="submit" id="span-addon1"></span>

        </div>
        
        <div class="col-md-3 col-md-pull-9">
        
            <span name="this_FSNKU" class="btn btn-outline-secondary" type="submit" id="span-addon1"></span>
        
        </div>
    </div>

    <div class="input-group mb">
        <span name="this_FSNKU" class="btn btn-outline-secondary" type="submit" id="span-addon1"></span>
    </div>

    <input id="myInput" name="Location" type="text" class="form-control" placeholder="FSNKU" aria-describedby="basic-addon1">

    <label for="myfile">Introduce PDF:</label>
    <input type="file" id="myfile" name="Barcode_PDF"><br><br>
    <input type="submit">
</form> -->