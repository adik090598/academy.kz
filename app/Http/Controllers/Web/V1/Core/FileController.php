<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 14.07.2020
 * Time: 20:01
 */

namespace App\Http\Controllers\Web\V1\Core;


use App\Http\Controllers\Web\WebBaseController;
use App\Services\Common\V1\Support\FileService;

class FileController extends WebBaseController
{

    protected $fileService;

    /**
     * FileController constructor.
     * @param $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function files($relative_path)
    {
        return $this->fileService->getFileByRelativePath($relative_path);
    }
}