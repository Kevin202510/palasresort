<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  <div class="container">
    <div class="card">
        <div class="card-header">
            SELECT THE LOCATION
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <p id="mycompletelocation"></p>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Region</label>
                <select class="form-select form-select-lg mb-3" id="myregion">
                    <option selected>Select Your Region</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Province</label>
                <select class="form-select form-select-lg mb-3" id="myprovince">
                    <option selected>Select Your Province</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Municipality</label>
                <select class="form-select form-select-lg mb-3" id="mymunicipality">
                    <option selected>Select Your Municipality</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Barangay</label>
                <select class="form-select form-select-lg mb-3" id="mybarangay">
                    <option selected>Select Your Barangay</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-info" id="showmylocation">Show My Location</button>
            </div>
        </div>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<script>
    $(document).ready(function(){
        $.getJSON("locations.json", function(result){
        $.each(result, function(i, field){
            $('#myregion').append(`<option value="${i}">
                                       ${field.region_name}
                                  </option>`);
        });
        });

        $("#myregion").change(function(){
            // alert($("#myregion").val());
            getProvinces($("#myregion").val());
        });

        function getProvinces(region_name){
            $.getJSON("locations.json", function(result){
                $.each( result[region_name].province_list, function( key, value ) {
                    $('#myprovince').append(`<option value="${key}">
                                       ${key}
                                  </option>`);
                });
            });
            
        }

        $("#myprovince").change(function(){
            getMunicipality($("#myregion").val(),$("#myprovince").val());
        });

        function getMunicipality(region_name,province_name){
            $.getJSON("locations.json", function(result){
                // console.log(result[region_name].province_list[province_name]);
                $.each( result[region_name].province_list[province_name].municipality_list, function( key, value ) {
                    // console.log(key);
                    $('#mymunicipality').append(`<option value="${key}">
                                       ${key}
                                  </option>`);
                });
            });
            
        }

        $("#mymunicipality").change(function(){
            getBarangay($("#myregion").val(),$("#myprovince").val(),$("#mymunicipality").val());
        });

        function getBarangay(region_name,province_name,municipality_name){
            $.getJSON("locations.json", function(result){
                // console.log(result[region_name].province_list[province_name].municipality_list[municipality_name].barangay_list);
                $.each( result[region_name].province_list[province_name].municipality_list[municipality_name].barangay_list, function( key, value ) {
                    // console.log(key);
                    $('#mybarangay').append(`<option value="${value}">
                                       ${value}
                                  </option>`);
                });
            });
            
        }

        $("#showmylocation").click(function(){
            $("#mycompletelocation").text(" Region : "+$("#myregion").val()+" Province of : "+$("#myprovince").val()+" Municipality of : "+$("#mymunicipality").val()+" Barangay : "+$("#mybarangay").val());
        });

    });
</script>