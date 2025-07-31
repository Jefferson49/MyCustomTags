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

use Fisharebest\Webtrees\Elements\NameType;
use Fisharebest\Webtrees\I18N;

/**
 * Additional custom types for names (INDI:NAME:TYPE)
 */

class ExtendedNameType extends NameType
{
    /**
     * A list of controlled values for this element
     *
     * @return array<int|string,string>
     */
    public function values(): array
    {
        $extended_values = [
            //Value in GEDCOM                      => Value shown in webtrees frontend
            //
            // Examples:
            //''                                   => '',
            //'Name after marriage of the parents' => 'Name after marriage of the parents',
            //'Order name'                         => 'Order name',
        ];

        $values = array_merge(parent::values(), $extended_values);

        uasort($values, I18N::comparator());

        return $values;
    }

    /**
     * Convert a value to a canonical form.
     *
     * @param string $value
     *
     * @return string
     */
    public function canonical(string $value): string
    {
        if (array_key_exists(strtoupper($value), parent::values())) {

            return parent::canonical($value);
        }

        //Do not convert to upperstring!
        return $value;
    }
}
