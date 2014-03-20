<?php
/**
 * This view represents the layout of a wall entry.
 *
 * @property User $user the user which created this post
 * @property Post $post the current post
 *
 * @package humhub.modules_core.wall
 * @since 0.5
 */
?>
<div class="media">

    <!-- start: show wall entry options -->
    <ul class="nav nav-pills preferences">
        <li class="dropdown ">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cogs"></i></a>
            <ul class="dropdown-menu pull-right">
                <?php $this->widget('application.modules_core.wall.widgets.WallEntryControlsWidget', array('object' => $object)); ?>
            </ul>
        </li>
    </ul>
    <!-- end: show wall entry options -->

    <a href="<?php echo $object->content->user->getProfileUrl(); ?>" class="pull-left">
        <img class="media-object img-rounded" alt="64x64" data-src="holder.js/64x64" style="width: 64px; height: 64px;"
             src="<?php echo $object->content->user->getProfileImage()->getUrl(); ?>"
             width="64" height="64"/>
    </a>

    <!-- Show space image, if you are outside from a space -->
    <?php if (Wall::$currentType != Wall::TYPE_SPACE && $object->content->container instanceof Space): ?>
        <a href="<?php echo Yii::app()->createUrl('//space/space', array('guid' => $object->content->container->guid)); ?>"
           class="pull-left">
            <img class="media-object img-rounded img-space pull-left" data-src="holder.js/20x20" alt="20x20"
                 style="width: 24px; height: 24px;"
                 src="<?php echo $object->content->container->getProfileImage()->getUrl(); ?>">
        </a>
    <?php endif; ?>

    <div class="media-body">
        <!-- show username with link and creation time-->
        <h4 class="media-heading"><a
                href="<?php echo $object->content->user->getProfileUrl(); ?>"><?php echo $object->content->user->displayName; ?></a>
            <small><?php echo HHtml::timeago($object->content->created_at); ?>

                <!-- show labels -->
                <?php $this->widget('application.modules_core.wall.widgets.WallEntryLabelWidget', array('object' => $object)); ?>

            </small>
        </h4>

        <!-- show content -->
        <div class="content">
            <?php echo $content; ?>
        </div>

        <!-- show controls -->
        <?php $this->widget('application.modules_core.wall.widgets.WallEntryAddonWidget', array('object' => $object)); ?>
    </div>
</div>
