<?php
    session_start();
    require_once 'config.php';
    require_once 'libs/function.php';
    require_once 'helpers/function.php';

    try
    {

        $files = getFiles();

        if (isset($_GET['action']))
        {
            switch ($_GET['action'])
            {
                case 'upload':
                    if (empty($_FILES['file']['error']))
                    {
                        $_SESSION['message'] = showMessageHTML(uploadFile());
                        redirect();
                    }
                    break;

                case 'delete':
                    if (isset($_GET['file']))
                    {
                        $_SESSION['message'] = showMessageHTML(deleteFile($_GET['file']));
                        redirect();
                    }
                    break;
            }
        }
    }
    catch (Exception $e)
    {
        $_SESSION['message'] = showExceptionMessageHTML($e->getMessage());
    }

    $message = createMessage();

    require_once 'templates/index.php';

?>
