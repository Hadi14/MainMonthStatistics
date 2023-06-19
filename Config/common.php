<?
function dump($var, $return = false)
{
    if (is_array($var)) {
        $out = print_r($var);
        echo "SSSSSSS" . $out;
    } else if (is_object($var)) {
        $out = var_export($var);
        echo "this is obj";
    } else {
        $out = $var;
        echo "this is simple var";
    }
    // if ($return)
    //     return "\n<pre>$out</pre>\n";
    // else
    // echo "<pre>$out</pre>";

    // return
}
