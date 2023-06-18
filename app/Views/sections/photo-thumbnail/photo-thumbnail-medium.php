<?php
/* @var $topic array */ ?>

<span class="ipsUserPhotoLink">
<?php if ($topic['pp_thumb_photo']) {
    if (strstr($topic['pp_thumb_photo'], 'http')) { ?>
        <img src="<?php echo $topic['pp_thumb_photo']; ?>" alt="profile picture" class="ipsUserPhoto ipsUserPhoto_medium left">
        <?php
    } else { ?>
        <img src="/uploads/<?php echo $topic['pp_thumb_photo']; ?>" alt="profile picture" class="ipsUserPhoto ipsUserPhoto_medium left">
        <?php
    }
} else { ?>
    <img src="/public/style_images/master/profile/default_large.png" alt="profile picture" class="ipsUserPhoto ipsUserPhoto_medium left">
<?php } ?>
    </span>
