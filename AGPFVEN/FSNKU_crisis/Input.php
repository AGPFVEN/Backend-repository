<?php

    //Includes
    include("includes/header.php");

?>

<form action="Syncro_FSNKU.php" method="POST" class="btn btn btn-lg btn-block">

    <div class="input-group mb-3">
        
        <select class="custom-select" name="from_location" id="inputGroupSelect01" wtx-context="71D597DE-4C86-4B2A-B7C5-7A5F808BCC7D">
            
            <option selected="">From...</option>
            <option value="FSNKU_USA">USA</option>
            <option value="FSNKU_SPAIN">SPAIN</option>
            <option value="FNSKU_UK">UK</option>
                        
        </select>

        <select class="custom-select" name="for_location" id="inputGroupSelect01" wtx-context="71D597DE-4C86-4B2A-B7C5-7A5F808BCC7D">
            
            <option selected="">For...</option>
            <option value="FSNKU_USA">USA</option>
            <option value="FSNKU_SPAIN">SPAIN</option>
            <option value="FSNKU_UK">UK</option>
                        
        </select>
        

        <div class="input-group-prepend">
            <span name="this_FSNKU" class="btn btn-outline-secondary" type="submit" id="span-addon1"></span>
        </div>

        <input id="myInput" name="Location" type="text" class="form-control" placeholder="FSNKU" aria-describedby="basic-addon1">

    </div>

    <button name="Button_1" class="btn btn-info btn-lg btn-block" type="submit" id="button-addon1">Process</button>

</form>