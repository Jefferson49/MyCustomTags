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

use Fisharebest\Webtrees\Elements\RoleInEvent;
use Fisharebest\Webtrees\I18N;

/**
 * Additional custom roles in events (*:*:EVEN:ROLE)
 */

class ExtendedRoleInEvent extends RoleInEvent
{
    /**
     * A list of controlled values for this element
     *
     * @return array<int|string,string>
     */
    public function values(): array
    {
        $extended_values = [
            //Value in GEDCOM           => Value shown in webtrees frontend
            '(Clergy)'                  => I18N::translate('Clergy'),
            '(Friend)'                  => I18N::translate('Friend'),
            '(Godparent)'               => I18N::translate('Godparent'),
            '(Multiple)'                => I18N::translate('Multiple'),
            '(Neighbor)'                => I18N::translate('Neighbor'),
            '(Officiator)'              => I18N::translate('Officiator'),
            '(Parent)'                  => I18N::translate('Parent'),
            '(Witness)'                 => I18N::translate('Witness'),
        ];

        $values = array_merge(parent::values(), $extended_values);

        uasort($values, I18N::comparator());

        return $values;
    }
}
