<?php

function showMessageHTML($array)
{
    if ($array['result'])
    {
        return '<div class="alert alert-success"><strong>Success!</strong> '.$array['message'].'</div>';
    }
    else
    {
        return '<div class="alert alert-danger"><strong>Danger!</strong> '.$array['message'].'</div>';
    }
}

function showExceptionMessageHTML($message)
{
    return '<div class="alert alert-danger"><strong>Danger!</strong> '.$message.'</div>';
}

?>