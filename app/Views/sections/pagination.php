<?php
/** @var array $paginationData */
?><div class='topic_controls clearfix'>
    <div class='pagination clearfix left '>
        <ul class='ipsList_inline back left'>
            <li class='pagejump'>
                <?php if ($paginationData['totalPages'] == 1) { ?>
                    Single Page
                <?php } else { ?>
                    Page <?php echo $paginationData['currentPage']; ?> of <?php echo $paginationData['totalPages']; ?>
                <?php } ?>
            </li>
            <?php foreach ($paginationData['links'] as $link) {
                if ($link['label'] !== 'previous' && $link['label'] !== 'first') {
                    continue;
                }
                ?>
                <li class='<?php echo $link['label']; ?>'>
                    <a href="<?php echo $link['link']; ?>" title="<?php echo $link['label']; ?>">
                        <?php echo $link['label']; ?>
                    </a>
                </li>
            <?php } ?>

        </ul>
        <ul class='ipsList_inline left pages'>

            <?php foreach ($paginationData['links'] as $link) {
                if (!is_numeric($link['label'])) {
                    continue;
                }
                ?>
                <li class='page <?php if ($paginationData['currentPage'] == $link['label']) { echo "active"; } ?>'>
                    <?php if ($paginationData['currentPage'] == $link['label']) { ?>
                        <?php echo $link['label']; ?>
                    <?php } else { ?>
                        <a href="<?php echo $link['link']; ?>" title="<?php echo $link['label']; ?>">
                            <?php echo $link['label']; ?>
                        </a>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
        <ul class='ipsList_inline forward left'>

            <?php foreach ($paginationData['links'] as $link) {
                if ($link['label'] !== 'next' && $link['label'] !== 'last') {
                    continue;
                }
                ?>
                <li class='<?php echo $link['label']; ?>'>
                    <a href="<?php echo $link['link']; ?>" title="<?php echo $link['label']; ?>">
                        <?php echo $link['label']; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>