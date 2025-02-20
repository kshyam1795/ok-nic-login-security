<?php

namespace Growats\OkNicLoginSecurity\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class BackupService
{
    /**
     * Backup database.
     */
    public function backupDatabase()
    {
        $backupFileName = 'backup_' . now()->format('Y_m_d_H_i_s') . '.sql';
        $backupFilePath = storage_path('app/backups/' . $backupFileName);

        // Run mysqldump command for database backup
        Artisan::call('db:backup', ['--path' => $backupFilePath]);

        return $backupFilePath;
    }

    /**
     * Backup source code.
     */
    public function backupSourceCode()
    {
        $sourceCodePath = base_path();
        $backupFileName = 'source_code_backup_' . now()->format('Y_m_d_H_i_s') . '.zip';
        $backupFilePath = storage_path('app/backups/' . $backupFileName);

        // Create a ZIP of the entire source code
        $this->zipDirectory($sourceCodePath, $backupFilePath);

        return $backupFilePath;
    }

    /**
     * Helper function to create a zip from a directory.
     */
    private function zipDirectory($sourcePath, $zipFilePath)
    {
        $zip = new \ZipArchive();
        if ($zip->open($zipFilePath, \ZipArchive::CREATE) !== true) {
            exit("Cannot open <$zipFilePath>\n");
        }

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($sourcePath),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($sourcePath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();
    }
}
