<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<h1>autenticacion Md5</h1><br>";

echo md5("123456")."<br>";

echo "<h1>autenticacion sha</h1><br>";

echo sha1("123456")."<br>";

echo "<h1>autenticacion hash</h1><br>";

echo hash("123456")."<br>";
echo "<h1>autenticacion password_hash</h1><br>";

echo password_hash("123456",PASSWORD_BCRYPT,['cost'=>4])."<br>";