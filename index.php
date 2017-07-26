<?php
    session_start();
    require_once 'config.php';
    require_once 'libs/function.php';
    require_once 'helpers/function.php';

    if (isset($_GET['action']))
    {

        switch ($_GET['action'])
        {
            case 'upload':

                if (empty($_FILES['file']['error'])) 
                {
                    try
                    {
                        $_SESSION['message'] = showMessageHTML(uploadFile());
                        redirect();
                    } 
                    catch (Exception $e) 
                    {
                        $e->getMessage();
                    }

                }
                break;

            case 'delete':
                if (isset($_GET['file']))
                {
                    try
                    {
                        $_SESSION['message'] = showMessageHTML(deleteFile($_GET['file']));
                        redirect();
                    } 
                    catch (Exception $e) 
                    {
                        $e->getMessage();
                    }
                    
                }
                break;
        }

    }

    $message = createMessage();

    require_once 'templates/index.php';

?>
