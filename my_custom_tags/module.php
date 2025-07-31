<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2025 webtrees development team
 *                    <http://webtrees.net>
 *
 * MyCustomTags (webtrees custom module):
 * Copyright (C) 2025 Markus Hemprich
 *                    <http://www.familienforschung-hemprich.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * A webtrees custom module to provide custom tags, custom types, custom relationship descriptors, and custom roles in events
 */

declare(strict_types=1);

namespace Jefferson49\Webtrees\Module\MyCustomTags;

require __DIR__ . '/ConfirmationType.php';
require __DIR__ . '/EducationType.php';
require __DIR__ . '/EventType.php';
require __DIR__ . '/ExtendedMarriageType.php';
require __DIR__ . '/ExtendedNameType.php';
require __DIR__ . '/ExtendedRelationIsDescriptor.php';
require __DIR__ . '/ExtendedRoleInEvent.php';
require __DIR__ . '/FactType.php';
require __DIR__ . '/GraduationType.php';
require __DIR__ . '/OrdinationType.php';
require __DIR__ . '/MyCustomTags.php';

return new MyCustomTags();
