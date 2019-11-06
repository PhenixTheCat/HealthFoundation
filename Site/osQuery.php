<?php
/*******************************************************

   Fonction : getOs
----------------------------------------------
   @Desc    : Retourne le nom de l'os grâce à l'user agent
   @Param   : $ua (str) : l'user agent dont on veux trouver l'os
   @Return  : (str) le nom de l'os trouvé sinon "Système d'exploitation inconnu"
   @licence : http://opensource.org/licenses/lgpl-license.php GNU LGPL
/

function getOS( $ua = '' )
{
    if( ! $ua  ) $ua = $_SERVER['HTTP_USER_AGENT'];
    $os = 'Système d&#39;exploitation inconnu';
    
    $os_arr = Array(
                     // -- Windows
                     'Windows NT 6.1'       => 'Windows Seven',
                     'Windows NT 6.0'       => 'Windows Vista',
                     'Windows NT 5.2'       => 'Windows Server 2003',
                     'Windows NT 5.1'       => 'Windows XP',
                     'Windows NT 5.0'       => 'Windows 2000',
                     'Windows 2000'         => 'Windows 2000',
                     'Windows CE'           => 'Windows Mobile',
                     'Win 9x 4.90'          => 'Windows Me.',
                     'Windows 98'           => 'Windows 98',
                     'Windows 95'           => 'Windows 95',
                     'Win95'                => 'Windows 95',
                     'Windows NT'           => 'Windows NT',
                     
                     // -- Linux
                     'Ubuntu'               => 'Linux Ubuntu',
                     'Fedora'               => 'Linux Fedora',
                     'Linux'                => 'Linux',
                     
                     // -- Mac
                     'Macintosh'            => 'Mac',
                     'Mac OS X'             => 'Mac OS X',
                     'Mac_PowerPC'          => 'Mac OS X',
                     
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
        if( ereg( strtolower( $k ), $ua ) )
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