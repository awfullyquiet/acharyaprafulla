<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Request</title>
    <!-- Add jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    include("../include/header.php");
    include("sidebar.php");
    include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-10">
                    <h5 class="text-center">Job Request</h5>
                    <div id="show"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            show();
            function show() {
                $.ajax({
                    url: "ajax_job_request.php",
                    method: "POST",
                    success: function(data) {
                        $("#show").html(data);
                    }
                });
            }
            
        
        $(document).on("click", ".approve", function() {
           var id = $(this).attr("id");
              
                $.ajax({
                     url: "ajax_approve.php",
                     method: "POST",
                     data: { id: id },
                     success: function(data) {
                        
                          show();
                        
                            
                     }
                });

        });
        $(document).on("click", ".reject", function() {
           var id = $(this).attr("id");
              
                $.ajax({
                     url: "ajax_reject.php",
                     method: "POST",
                     data: { id: id },
                     success: function(data) {
                        
                          show();
                        
                            
                     }
                });

        });
    });
        </script>
</body>
</html>