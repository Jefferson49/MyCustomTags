<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2023 webtrees development team
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
 * Event custom types
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
                'Cousin'                                       => 'Cousin',
                'Cousine'                                      => 'Cousine',
                'Enkel'                                        => 'Enkel',
                'Gläubiger'                                    => 'Gläubiger',
                'Großmutter'                                   => 'Großmutter',
                'Großvater'                                    => 'Großvater',
                'Nichte'                                       => 'Nichte',
                'Onkel'                                        => 'Onkel',
                'Möglicherweise identische Person'             => 'Möglicherweise identische Person',
                'Möglicherweise Schwester'                     => 'Möglicherweise Schwester',
                'Möglicherweise Sohn'                          => 'Möglicherweise Sohn',
                'Möglicherweise Taufpate'                      => 'Möglicherweise Taufpate',
                'Möglicherweise Tochter'                       => 'Möglicherweise Tochter',
                'Möglicherweise Vater'                         => 'Möglicherweise Vater',
                'Möglicherweise verwandt mit'                  => 'Möglicherweise verwandt mit',
                'Spekulativ: Möglicherweise identische Person' => 'Spekulativ: Möglicherweise identische Person',
                'Spekulativ: Möglicherweise Sohn'              => 'Spekulativ: Möglicherweise Sohn',
                'Spekulativ: Möglicherweise Vater'             => 'Spekulativ: Möglicherweise Vater',
                'Vermutlich Bruder'                            => 'Vermutlich Bruder',
                'Vermutlich Nachfahre von'                     => 'Vermutlich Nachfahre von',
                'Vermutlich Schwester'                         => 'Vermutlich Schwester',
                'Vermutlich Sohn'                              => 'Vermutlich Sohn',
                'Vermutlich Tochter'                           => 'Vermutlich Tochter',
                'Vermutlich Vater'                             => 'Vermutlich Vater',
                'Vermutlich identische Person'                 => 'Vermutlich identische Person',
                'Vermutlich verwandt mit'                      => 'Vermutlich verwandt mit',
            ],
        ];

        $tmp = $extended_values[$sex] ?? $extended_values['U'];

        $tmp = array_merge(parent::values($sex), $tmp);

        uasort($tmp, I18N::comparator());

        return $tmp;
    }
}
