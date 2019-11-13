<?php
/*******************************************************

   Fonction : getOs
----------------------------------------------
   @Desc    : Retourne le nom de l'os grâce à l'user agent
   @Param   : $ua (str) : l'user agent dont on veut trouver l'os
   @Return  : (str) le nom de l'os trouvé, sinon "Système d'exploitation inconnu"
/

function getOS( $ua = '' )

echo php_uname();
echo PHP_OS;

{
    if( ! $ua  ) $ua = $_PHP_OS;

    $os = 'Système d&#39;exploitation inconnu';
    
    $os_arr = Array(
                     // -- Windows
                     'Windows NT 10.0'     => 'Windows',
                     'Windows NT 6.1'       => 'Windows',
                     'Windows NT 6.0'       => 'Windows',
                     'Windows NT 5.2'       => 'Windows',
                     'Windows NT 5.1'       => 'Windows',
                     'Windows NT 5.0'       => 'Windows',
                     'Windows 2000'         => 'Windows',
                     'Windows CE'           => 'Windows',
                     'Win 9x 4.90'          => 'Windows',
                     'Windows 98'           => 'Windows',
                     'Windows 95'           => 'Windows',
                     'Win95'                => 'Windows',
                     'Windows NT'           => 'Windows',
                     
                     // -- Linux
                     'Ubuntu'               => 'Linux',
                     'Fedora'               => 'Linux',
                     'Linux'                => 'Linux',
                     
                     // -- Mac
                     'Macintosh'            => 'Mac',
                     'Mac OS X'             => 'Mac',
                     'Mac_PowerPC'          => 'Mac',
                     
                     // -- Autres ...
                     'FreeBSD'              => 'FreeBSD',
                     'Unix'                 => 'Unix',
                     'Playstation portable' => 'PSP',
                     'OpenSolaris'          => 'SunOS',
                     'SunOS'                => 'SunOS',
                     'Nintendo Wii'         => 'Nintendo Wii',
                     'Mac'                  => 'Mac',
                   );
    
    $ua = strtolower( $ua ); 
    foreach( $os_arr as $k => $v )
    {
        if( preg_match( strtolower( $k ), $ua ) )
        {
            $os = $v;
            break;
        }
    }
    return $os;
}

//-- Exemple d'utilisation :
echo getOS( $_SERVER['HTTP_USER_AGENT'] );
?>
