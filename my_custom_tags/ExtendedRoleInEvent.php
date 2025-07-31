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

declare(strict_types=1);

namespace Jefferson49\Webtrees\Module\MyCustomTags;

use Fisharebest\Webtrees\Elements\RoleInEvent;
use Fisharebest\Webtrees\I18N;
use Jefferson49\Webtrees\Internationalization\MoreI18N;


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
            '(Friend)'                  => MoreI18N::xlate('Friend'),
            '(Godparent)'               => MoreI18N::xlate('Godparent'),
            '(Multiple)'                => I18N::translate('Multiple'),
            '(Neighbor)'                => I18N::translate('Neighbor'),
            '(Officiator)'              => I18N::translate('Officiator'),
            '(Parent)'                  => MoreI18N::xlate('Parent'),
            '(Witness)'                 => MoreI18N::xlate('Witness'),
            //
            // Further examples:
            //''                        => '',
            //'Priest'                  => 'Priest',
            //'Servant'                 => 'Servant',

        ];

        $values = array_merge(parent::values(), $extended_values);

        uasort($values, I18N::comparator());

        return $values;
    }
}
