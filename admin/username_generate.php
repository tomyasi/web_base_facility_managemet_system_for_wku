<?php
//generate a username from Full name
function generate_username($string_name, $pass)
{
    $username_parts = array_filter(explode(" ", strtolower($string_name))); //explode and lowercase name
    $username_parts = array_slice($username_parts, 0, 2); //return only first two arry part

    $part1 = (!empty($username_parts[0])) ? substr($username_parts[0], 0,) : ""; //cut first name to 8 letters
    $part2 = (!empty($username_parts[1])) ? substr($username_parts[1], 0,) : ""; //cut second name to 5 letters
    //$part3 = ($rand_no) ? rand(0, $rand_no) : "";

    $username = $part1 . $part2; //. $part3; //str_shuffle to randomly shuffle all characters
    $password = $pass;
    echo $username, "  ";
    echo $password;
}

//usage
generate_username("Temesgen Asichenek", "121212");
function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);
}
echo rand_string(8);