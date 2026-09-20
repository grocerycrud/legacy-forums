<?php

namespace App\Models;

use CodeIgniter\Model;

class AttachmentModel extends Model
{
    protected $table = 'fm_attachments';
    protected $primaryKey = 'attach_id';
    protected $returnType = 'array';

    /**
     * Fetches several attachments at once, keyed by attach_id.
     *
     * Posts reference attachments with a [attachment=ID:filename] tag, so a
     * single page can contain many of them. We load them all with one query
     * instead of one query per tag.
     *
     * @param int[] $ids
     * @return array<int, array>
     */
    public function getByIds(array $ids)
    {
        $ids = array_values(array_unique(array_filter(array_map('intval', $ids))));

        if (empty($ids)) {
            return [];
        }

        $rows = $this->whereIn('attach_id', $ids)->findAll();

        $output = [];
        foreach ($rows as $row) {
            $output[(int)$row['attach_id']] = $row;
        }

        return $output;
    }

    public function getById($id)
    {
        return $this->where('attach_id', (int)$id)->first();
    }
}
