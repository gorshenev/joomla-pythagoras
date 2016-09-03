<?php
/**
 * Part of the Joomla Framework Content Package
 *
 * @copyright  Copyright (C) 2015 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Content\Type;

use Joomla\Content\ContentTypeVisitorInterface;
use Joomla\Media\Entity\Image as ImageEntity;

/**
 * Image ContentType
 *
 * @package  Joomla/Content
 * @since    __DEPLOY_VERSION__
 *
 * @property string $image
 * @property string $alt
 */
class Image extends AbstractContentType
{
	/**
	 * Image constructor.
	 *
	 * @param   ImageEntity $item The location of the image file
	 * @param   string      $alt  The alternative description
	 */
	public function __construct(ImageEntity $item, $alt = '')
	{
		$this->image = $item;
		$this->alt   = $alt;
	}

	/**
	 * Visits the content type.
	 *
	 * @param   ContentTypeVisitorInterface $visitor The Visitor
	 *
	 * @return  mixed
	 */
	public function accept(ContentTypeVisitorInterface $visitor)
	{
		return $visitor->visitImage($this);
	}
}
