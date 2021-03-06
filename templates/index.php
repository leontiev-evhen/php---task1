<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Course PHP -  Task 1</title>

        <!-- Bootstrap -->
        <link href="<?php echo PATH;?>templates/css/bootstrap.min.css" rel="stylesheet">

        <!-- My style -->
        <link href="<?php echo PATH;?>templates/css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container mt-50">
            <?php if (isset($message))
            { ?>

                <div class="row">
                    <div class="col-md-12">

                        <?php echo $message;?>

                    </div>
                </div>

            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo PATH;?>index.php?action=upload" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label class="custom-file">
                                <input type="file" name="file" id="file" class="custom-file-input">
 
                                <span class="custom-file-control"></span>
                            </label>
                            <input type="submit" name="upload" value="Upload">
                        </div>
                    </form>
                </div>
            </div>

        <?php   if (!empty($files))
                { ?>

            <table class="table table-striped">
                <tr>
                    <th>№</th>
                    <th>Name file</th>
                    <th>Size file</th>
                    <th>Action</th>
                </tr>
            <?php
            $i = 1;

            foreach ($files as $file)
            { ?>

                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $file['name']?></td>
                        <td><?php echo $file['size'];?></td>
                        <td><a href="?action=delete&file=<?php echo $file['name'];?>">Delete</a></td>
                    </tr>

            <?php  $i++; }  ?>
                </table>

        <?php } ?>
        </div>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <!-- Include all compiled plugins (below), or include individual files as needed -->
         <script src="<?php echo PATH;?>templates/js/bootstrap.min.js"></script>

    </body>
</html>

