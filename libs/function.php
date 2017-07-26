<?php

/*
 * upload file
 * 
 * */
function uploadFile ()
{

    if (checkAccess())
    {
        if (move_uploaded_file($_FILES['file']['tmp_name'], PATH_UPLOAD.$_FILES['file']['name']))
        {
            return ['result' => true, 'message' => 'File was uploaded'];
        }
        else
        {
            return ['result' => false, 'message' => 'File was not uploaded'];
        }
    }
    else
    {
        return ['result' => false, 'message' => 'Folder don\'t have access'];
    }


}

/*
 * get all files
 * return array
 *
 * */
function getFiles ()
{
    $allFiles = array_slice(scandir(PATH_UPLOAD), 2);

    $arrayFiles = [];
    foreach ($allFiles as $key=>$file)
    {
        if (checkExistFile($file))
        {
            $arrayFiles[$key]['name'] = $file;
            $arrayFiles[$key]['size'] = formatBytes(filesize(PATH_UPLOAD . $file));
        }

    }

    return $arrayFiles;
}

/*
 * delete file
 *
 * */
function deleteFile ($fileName)
{
    if(checkExistFile($fileName) && checkAccess()) 
    {
        if (unlink(PATH_UPLOAD.$fileName))
        {
            return ['result' => true, 'message' => 'File '.$fileName.' was deleted'];
        } 
        else 
        {
            return ['result' => false, 'message' => 'ERROR'];
        }
    }
}

/*
 * check exist file
 * return boolean
 *
 **/
function checkExistFile ($fileName)
{

    if (file_exists(PATH_UPLOAD.$fileName)) 
    {
        return true;
    }
    else 
    {
        throw new Exception('File '.$fileName.' does not exist');
    }
}

/*
 * check access
 * return boolean
 *
 **/
function checkAccess ()
{
    if (ACCESS == substr(sprintf('%o', fileperms(PATH_UPLOAD)), -3))
    {
        return true;
    } 
    else 
    {
        throw new Exception('Don\'t have permission');
    }
}


/*
 * formatting bytes
 * return float
 * */
function formatBytes ($bytes)
{
    $result = null;
    $arrayBytes = [
        0 => [
            "unit" => "MB",
            "value" => pow(1024, 2)
        ],
        1 => [
            "unit" => "KB",
            "value" => 1024
        ],
        2 => [
            "unit" => "B",
            "value" => 1
        ],
    ];

    foreach ($arrayBytes as $item) 
    {
        if ($bytes >= $item["value"])
        {
            $result = $bytes / $item["value"];
            $result = round($result, 2)." ".$item["unit"];
            break;
        }
    }
    return $result;
}

/*
 * redirect
 * */
function redirect ($url = 'index.php')
{
    header('Location: '.PATH.$url, 301 );
    die();
}

/*
 * create message
 * */
function createMessage ($url = 'index.php')
{

    if (isset($_SESSION['message']))
    {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);

        return $message;

    }
}

?>
