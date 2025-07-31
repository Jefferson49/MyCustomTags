<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2024 webtrees development team
 *                    <http://webtrees.net>
 *
 * MyCustomTags (webtrees custom module):
 * Copyright (C) 2024 Markus Hemprich
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

declare(strict_types=1);

namespace Jefferson49\Webtrees\Module\MyCustomTags;

use Fisharebest\Webtrees\Elements\RelationIsDescriptor;
use Fisharebest\Webtrees\I18N;

/**
 * Additional custom descriptors for relationships (FAM:_ASSO:RELA, FAM:*:_ASSO:RELA, INDI:ASSO:RELA, INDI:*:_ASSO:RELA)
 */

class ExtendedRelationIsDescriptor extends RelationIsDescriptor
{
    /**
     * A list of controlled values for this element
     *
     * @param string $sex the text depends on the sex of the *linked* individual
     *
     * @return array<int|string,string>
     */
    public function values(string $sex = 'U'): array
    {
        $extended_values = [
            'U' => [
                //Value in GEDCOM               => Value shown in webtrees frontend
                //
                // Examples:
                //''                            => '',
                //'Cousin'                      => 'Cousin',
                //'Presumably identical person' => 'Presumably identical person',
                //'Suspected father'            => 'Suspected father',
                //'Uncle'                       => 'Uncle',
            ],
        ];

        $tmp = $extended_values[$sex] ?? $extended_values['U'];

        $tmp = array_merge(parent::values($sex), $tmp);

        uasort($tmp, I18N::comparator());

        return $tmp;
    }
}
