<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style/navBarFooter.css" />
    <link rel="stylesheet" href="style/regStyle.css" />
   
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
                $(function(){
                    Swal.fire({
                        "title": "Success",
                        "text": "You have been successfully registered!",
                        "type": "success"
                    }).then(function(){
                        window.location = "signIn.php"
                    })

                });

            </script>
    <style>
        body{
            color:white;
        }
    </style>
</head>
   
</html>



