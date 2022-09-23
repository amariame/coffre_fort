<?php
namespace Util;
/**
 * Lister le contenu d'un dossier
 * auteur James 16/06/2011
 * publié sur www.fobec.com
 */
class ScanFolder {
    //boolean: ajouter les fichier système
    private $add_systemfiles=false;
    //Array: liste des fichiers systeme
    private $systemfiles = array(".", "..", ".htaccess", ".htpasswd");
    //array: déclaration variable extension
    private $extensions=array();
    //boolean: liste étendue des fichier
    private $add_extra=false;
 
    public function listfiles($folder) {
        $out=array();
        //répertoire incorrecte
        if(is_dir($folder) === false) {
            throw new Exception("Invalid path ".$folder);
        }
        //lister les fichiers
        $files = scandir($folder);
        foreach($files as $file) {
            if ($this->isValidFile($file)) {
                if ($this->add_extra==true) {
                    $f=array('file'=>$file,
                            'type'=>$this->fileType($file, $folder),
                            'folder'=>$folder);
                    $out[]=$f;
                } else {
                    $out[]=$file;
                }
            }
        }
 
        return $out;
    }
    /**
     * setter: fixer la propriété fichier systeme
     * @param boolean $add afficher les fichiers
     */
    public function displaySystemFiles($add) {
        $this->add_systemfiles=$add;
    }
 
    /**
     * setter: fixer une filtre d'extension
     * @param array $exts
     */
    public function setExtensionFilter(array $exts) {
        $this->extensions=$exts;
    }
    /**
     * setter: fixer la propriété liste etendue des fichiers
     * @param boolean $add
     */
    public function setExtra($add) {
        $this->add_extra=$add;
    }
 
    /**
     * Déterminer le type d'un fichier
     * @param string $file
     * @return string  'system','file','dir' ou 'undefined'
     */
    private function fileType($file, $path) {
        if (in_array($file, $this->systemfiles)) {
            return 'system';
        } else if (is_file($path.'/'.$file) && is_readable($path.'/'.$file)) {
            return 'file';
        } else if (is_dir($path.'/'.$file) && is_readable($path.'/'.$file)) {
            return 'dir';
        } else {
            return 'undefined';
        }
    }
    /**
     * Déterminer si le fichier peut etre ajouté à la liste
     * @param string $file
     * @return boolean
     */
    private function isValidFile($file) {
        /**
         * Filtre fichier systeme
         */
        if ($this->add_systemfiles==false && in_array($file, $this->systemfiles)) {
            return false;
        }
 
        /**
         * Filtre extension de fichier
         */
        if (count($this->extensions)>0) {
            $ext=strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (!in_array($ext, $this->extensions)) {
                return false;
            }
        }
 
        return true;
    }
}
?>
