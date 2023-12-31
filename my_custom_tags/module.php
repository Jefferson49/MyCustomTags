<?php

/**
 * Module to establish custom tags
 */

declare(strict_types=1);

namespace Jefferson49\Webtrees\Module\MyCustomTags;

require __DIR__ . '/MyCustomTags.php';
require __DIR__ . '/ConfirmationType.php';
require __DIR__ . '/EducationType.php';
require __DIR__ . '/EventType.php';
require __DIR__ . '/ExtendedNameType.php';
require __DIR__ . '/ExtendedRelationIsDescriptor.php';
require __DIR__ . '/ExtendedRoleInEvent.php';
require __DIR__ . '/FactType.php';
require __DIR__ . '/GraduationType.php';
require __DIR__ . '/OrdinationType.php';

return new MyCustomTags();
