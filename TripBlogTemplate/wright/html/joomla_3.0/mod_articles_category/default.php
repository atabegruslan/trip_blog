<?php
// Wright v.3 Override: Joomla 3.2.2
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2019 Joomlashack. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$wrightTypeList = (isset($wrightTypeList) ? $wrightTypeList : ' list-striped'); // Wright v.3: Optional list-striped class

$wrightEnableIcons = (isset($wrightEnableIcons) ? $wrightEnableIcons : true);  // Wright v.3: Enable icons parameter

$wrightIncludeImages = (isset($wrightIncludeImages) ? $wrightIncludeImages : true);  // Wright v.3: Include images

?>
<ul class="category-module<?php echo $moduleclass_sfx; ?><?php echo $wrightTypeList; // Wright v.3: Optional list-striped class ?>">
<?php if ($grouped) : ?>
	<?php foreach ($list as $group_name => $group) : ?>
	<li>
		<ul class="<?php echo $wrightTypeList; ?>">  <?php // Wright v.3: Added list-striped class ?>
			<?php foreach ($group as $item) : ?>
			    <li class="clearfix">  <?php // Wright v.3: Added clearfix class ?>

					<?php
					// Wright v.3: Include image
					if ($wrightIncludeImages)
					{
						$images = json_decode($item->images);
						$introFiles = explode(".", $images->image_intro);
						$hoverImage = '';

						if ($images->image_intro != '')
						{
							$ext = pathinfo($images->image_intro, PATHINFO_EXTENSION);
							$hoverImage = substr($images->image_intro, 0, strlen($images->image_intro) - strlen($ext) - 1) . '-hover.' . $ext;

							if (!file_exists($hoverImage))
							{
								$hoverImage = '';
							}
					?>

					<div class="item-image">
						<a href="<?php echo $item->link;?>">
							<img src="<?php echo $images->image_intro; ?>" alt="<?php echo $images->image_intro_alt; ?>"<?php if ($hoverImage != '') : ?> class="wrightHoverNewsflash" data-wrighthover="<?php echo $hoverImage ?>" data-wrighthoverorig="<?php echo $images->image_intro; ?>"<?php endif; ?> />
						</a>
					</div>

					<?php
						}
					}
					// End Wright v.3: Include image
					?>

					<?php if ($params->get('link_titles') == 1) : ?>
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
						<i class="icon-file"></i> <?php // Wright v.3: Added icon ?>
						<?php echo $item->title; ?>
						</a>
					<?php else : ?>
						<i class="icon-file"></i>  <?php // Wright v.3: Added icon ?>
						<?php echo $item->title; ?>
					<?php endif; ?>

					<?php if ($item->displayHits) : ?>
						<span class="mod-articles-category-hits">
						<i class="icon-eye-open"></i>  <?php // Wright v.3: Added icon and removed parenthesis ?>
						<?php echo $item->displayHits; ?>
						</span>
					<?php endif; ?>

					<?php if ($params->get('show_author')) :?>
						<span class="mod-articles-category-writtenby">
						<i class="icon-user"></i>  <?php // Wright v.3: Added icon ?>
						<?php echo $item->displayAuthorName; ?>
						</span>
					<?php endif;?>

					<?php if ($item->displayCategoryTitle) :?>
						<span class="mod-articles-category-category">
						<i class="icon-folder-open"></i>  <?php // Wright v.3: Added icon and removed parenthesis ?>
						<?php echo $item->displayCategoryTitle; ?>
						</span>
					<?php endif; ?>

					<?php if ($item->displayDate) : ?>
						<span class="mod-articles-category-date">
						<i class="icon-calendar"></i>  <?php // Wright v.3: Added icon ?>
						<?php echo $item->displayDate; ?></span>
					<?php endif; ?>

					<?php if ($params->get('show_introtext')) :?>
						<p class="mod-articles-category-introtext">
							<?php echo $item->displayIntrotext; ?>
						</p>
					<?php endif; ?>

					<?php if ($params->get('show_readmore')) :?>
						<p class="readmore mod-articles-category-readmore">  <?php // Wright v.3: Added readmore class ?>
						<a class="mod-articles-category-title <?php echo $item->active; ?> btn" href="<?php echo $item->link; ?>">  <?php // Wright v.3: Added btn class ?>
						<?php if ($item->params->get('access-view') == false) :
							echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
						elseif ($readmore = $item->alternative_readmore) :
							echo $readmore;
							echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
								if ($params->get('show_readmore_title', 0) != 0) :
									echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
									endif;
						elseif ($params->get('show_readmore_title', 0) == 0) :
							echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
						else :
							echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
							echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
						endif; ?>
						<i class="icon-chevron-right"></i>  <?php // Wright v.3: Added icon ?>
						</a>
						</p>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
<?php else : ?>
	<?php foreach ($list as $item) : ?>
	    <li class="clearfix">  <?php // Wright v.3: Added clearfix class ?>

			<?php
			// Wright v.3: Include image
			if ($wrightIncludeImages)
			{
				$images = json_decode($item->images);
				$introFiles = explode(".", $images->image_intro);
				$hoverImage = '';

				if ($images->image_intro != '')
				{
					$ext = pathinfo($images->image_intro, PATHINFO_EXTENSION);
					$hoverImage = substr($images->image_intro, 0, strlen($images->image_intro) - strlen($ext) - 1) . '-hover.' . $ext;

					if (!file_exists($hoverImage))
					{
						$hoverImage = '';
					}
			?>

			<div class="item-image">
				<a href="<?php echo $item->link;?>">
					<img src="<?php echo $images->image_intro; ?>" alt="<?php echo $images->image_intro_alt; ?>"<?php if ($hoverImage != '') : ?> class="wrightHoverNewsflash" data-wrighthover="<?php echo $hoverImage ?>" data-wrighthoverorig="<?php echo $images->image_intro; ?>"<?php endif; ?> />
				</a>
			</div>

			<?php
				}
			}
			// End Wright v.3: Include image
			?>

			<?php if ($params->get('link_titles') == 1) : ?>
				<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
				<?php if($wrightEnableIcons): ?><i class="icon-file"></i> <?php endif; ?> <?php // Wright v.3: Added icon ?>
				<?php echo $item->title; ?>
				</a>
			<?php else : ?>
				<?php if($wrightEnableIcons): ?><i class="icon-file"></i> <?php endif; ?> <?php // Wright v.3: Added icon ?>
				<?php echo $item->title; ?>
			<?php endif; ?>

			<?php if ($item->displayHits) :?>
				<span class="mod-articles-category-hits">
				<i class="icon-eye-open"></i>  <?php // Wright v.3: Added icon and removed parenthesis ?>
				<?php echo $item->displayHits; ?>  </span>
			<?php endif; ?>

			<?php if ($params->get('show_author')) :?>
				<span class="mod-articles-category-writtenby">
					<i class="icon-user"></i>  <?php // Wright v.3: Added icon ?>
					<?php echo $item->displayAuthorName; ?>
				</span>
			<?php endif;?>

			<?php if ($item->displayCategoryTitle) :?>
				<span class="mod-articles-category-category">
				<i class="icon-folder-open"></i>  <?php // Wright v.3: Added icon and removed parenthesis ?>
				<?php echo $item->displayCategoryTitle; ?>
				</span>
			<?php endif; ?>

			<?php if ($item->displayDate) : ?>
				<span class="mod-articles-category-date">
				<i class="icon-calendar"></i>  <?php // Wright v.3: Added icon ?>
				<?php echo $item->displayDate; ?></span>
			<?php endif; ?>

			<?php if ($params->get('show_introtext')) :?>
				<p class="mod-articles-category-introtext">
				<?php echo $item->displayIntrotext; ?>
				</p>
			<?php endif; ?>

			<?php if ($params->get('show_readmore')) :?>
				<p class="readmore mod-articles-category-readmore">  <?php // Wright v.3: Added readmore class ?>
				<a class="btn mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">  <?php // Wright v.3: Added btn class ?>
					<?php if ($item->params->get('access-view') == false) :
						echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
					elseif ($readmore = $item->alternative_readmore) :
						echo $readmore;
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
					else :
						echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					endif; ?>
					<i class="icon-chevron-right"></i>  <?php // Wright v.3: Added icon ?>
				</a>
				</p>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
<?php endif; ?>
</ul>
