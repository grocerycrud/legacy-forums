<?php

namespace App\Controllers;

use App\Models\AttachmentModel;

class Attachment extends BaseController
{
    /**
     * Serves a non-image attachment.
     *
     * IPB renamed every uploaded file that was not an image to a .ipb file, so
     * that the server could never execute it. The original name only lives in
     * the database, which is why the download goes through here instead of
     * linking straight into /uploads.
     */
    public function download($attachmentId)
    {
        $attachmentModel = new AttachmentModel();
        $attachment = $attachmentModel->getById($attachmentId);

        if ($attachment === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $location = $attachment['attach_location'];

        // The location comes from a 15 year old database, so keep it inside
        // the uploads folder no matter what it contains.
        if ($location === '' || strpos($location, '..') !== false || $location[0] === '/') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $filePath = FCPATH . 'uploads/' . $location;

        if (!is_file($filePath)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $fileName = $attachment['attach_file'] !== ''
            ? basename($attachment['attach_file'])
            : basename($location);

        return $this->response->download($filePath, null)->setFileName($fileName);
    }
}
