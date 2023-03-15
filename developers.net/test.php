<?php

//2.
// Write your own function to reverse a string

// Test with this.  Note the signature of the expected function.
/*
public static void TestReverse()
{
Console.WriteLine(Reverse("aabbb")); //bbbaa
	Console.WriteLine(Reverse("a")); //a
	Console.WriteLine(Reverse("abcdef")); // fedcba
}

*/
function Reverse($input){
    //return strrev("\n" .$input);
    $stringLen = strlen($input);
    //print($stringLen);

    $output[]="";

    for($i=0; $i<$stringLen; $i++) {
        //print("\n");
        $j = 1;
        $new = substr($input, $i, $j);
        //print($new);

        $output[$i] = $new;
    }

    $arr_length = count($output);
    //print($arr_length);
    for($i=$arr_length-1;$i>=0;$i--)
    {
        print($output[$i]);
        //print($i);
    }

    print("\n");
    
}

function TestReverse(){
    print(Reverse("aabbb"));
    print(Reverse("abc"));
    print(Reverse("abcdef"));
}

TestReverse();
