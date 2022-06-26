<?php

//create method for image path for profile image
//check if function exists
if(!function_exists('getProfileImagePath')){
    function getProfileImagePath($image, $name)
    {
        return !empty($image)
            ? asset($image)
            : "https://ui-avatars.com/api/?name=".str_replace(' ', '+',trim($name))."&size=128&color=fff&background=B23CFD&rounded=true";
    }
}

