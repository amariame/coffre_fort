<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder;

/**
 * Extends \SplFileInfo to support relative paths.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class SplFileInfo extends \SplFileInfo
{
    private string $relativePath;
    private string $relativePathname;

    /**
     * @param string $file             The file name
     * @param string $relativePath     The relative path
     * @param string $relativePathname The relative path name
     */
    public function __construct(string $file, string $relativePath, string $relativePathname)
    {
        parent::__construct($file);
        $this->relativePath = $relativePath;
        $this->relativePathname = $relativePathname;
    }

    /**
     * Returns the relative path.
     *
     * This path does not contain the file name.
     */
    public function getRelativePath(): string
    {
        return $this->relativePath;
    }

    /**
     * Returns the relative path name.
     *
     * This path contains the file name.
     */
    public function getRelativePathname(): string
    {
        return $this->relativePathname;
    }

    public function getFilenameWithoutExtension(): string
    {
        $filename = $this->getFilename();

        return pathinfo($filename, \PATHINFO_FILENAME);
    }

    /**
     * Returns the contents of the file.
     *
     * @throws \RuntimeException
     */
    public function getContents(): string
    {
        set_error_handler(function ($type, $msg) use (&$error) { $error = $msg; });
        try {
            $content = file_get_contents($this->getPathname());
        } finally {
            restore_error_handler();
        }
        if (false === $content) {
            throw new \RuntimeException($error);
        }

        return $content;
    }

    public function getFileTypeLogo():string{
    
        switch($this->getExtension()){
            case "pdf":
                $type="pdf";
                break;
            case "docx":
            case "doc":
                $type="word";
                break;
            case "xls":
            case "xlsx":
                $type="excel";
                break;
            case "mp3":
            case "ogg":
            case "wav":
                $type="music";
                break;
            case "mp4":
            case "mov":
                $type="video";
                break;
            case "zip":
            case "7z":
            case "rar":
                $type="zipper";
                break;
            case "jpg":
            case "jpeg":
            case "png":
                $type="image";
                break;
            case "html":
            case "php":
            case "py":
            case "java":
            case "c":
            case "cpp":
                $type="code";
                break;
            case "txt":
                $type="lines";
                break;
            case "exe":
                $type="binary";
                break;
            case "ppt":
                $type="power-point";
                break;
            case "csv":
                $type="csv";
                break;
            default:
                $type="";
        }
    
        return "file-".$type;
    }
}
