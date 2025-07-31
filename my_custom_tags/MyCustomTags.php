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

use Fisharebest\Localization\Translation;
use Fisharebest\Webtrees\Contracts\ElementInterface;
use Fisharebest\Webtrees\Elements\CustomElement;
use Fisharebest\Webtrees\Elements\XrefSource;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Registry;

/**
 * Class MyCustomTags
 *
 * Definition of custom tags, custom types, custom relationship descriptors, and custom roles in events
 */
class MyCustomTags extends AbstractModule implements ModuleCustomInterface
{
    // For every module interface that is implemented, the corresponding trait *should* also use be used.
    use ModuleCustomTrait;

    //Custom module version
    public const CUSTOM_VERSION = '0.9.99';

    //Author
    public const CUSTOM_AUTHOR = 'Markus Hemprich';

    //Github repository
    public const GITHUB_REPO = 'Jefferson49/MyCustomTags';


    /**
     * How should this module be identified in the control panel, etc.?
     * {@inheritDoc}
     *
     * @return string
     *
     * @see \Fisharebest\Webtrees\Module\AbstractModule::title()
     */    public function title(): string
    {
        return I18N::translate('My Custom Tags');
    }

    /**
     * A sentence describing what this module does.
     * {@inheritDoc}
     *
     * @return string
     *
     * @see \Fisharebest\Webtrees\Module\AbstractModule::description()
     */
    public function description(): string
    {
        return I18N::translate('A module to provide custom tags, types, relationship descriptors, and roles in events');
    }

    /**
     * The person or organisation who created this module.
     * {@inheritDoc}
     *
     * @return string
     *
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customModuleAuthorName()
     */
    public function customModuleAuthorName(): string
    {
        return self::CUSTOM_AUTHOR;
    }

    /**
     * The folder for the module ressources
     * {@inheritDoc}
     *
     * @return string
     *
     * @see \Fisharebest\Webtrees\Module\AbstractModule::resourcesFolder()
     */
    public function resourcesFolder(): string
    {
        return __DIR__ . '/resources/';
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     *
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customModuleVersion()
     */
    public function customModuleVersion(): string
    {
        return self::CUSTOM_VERSION;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     *
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customModuleSupportUrl()
     */
    public function customModuleSupportUrl(): string
    {
        return 'https://github.com/' . self::GITHUB_REPO;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $language
     *
     * @return array
     *
     * @see \Fisharebest\Webtrees\Module\ModuleCustomInterface::customTranslations()
     */
    public function customTranslations(string $language): array
    {
        $lang_dir   = $this->resourcesFolder() . 'lang/';
        $file       = $lang_dir . $language . '.mo';
        if (file_exists($file)) {
            return (new Translation($file))->asArray();
        } else {
            return [];
        }
    }

    /**
     * Called for all *enabled* modules.
     */
    public function boot(): void
    {
        $elementFactory = Registry::elementFactory();
        $elementFactory->registerTags($this->customTags());
        $elementFactory->registerSubTags($this->customSubTags());
    }

    /**
     * Definition of custom tags and the related types, relationship descriptors, and roles in events
     *
     * @return array<string,ElementInterface>
     */
    protected function customTags(): array
    {
        return [
            //Examples for additonal custom tags:
            //'INDI:BIRT:_GODP'             => new CustomElement(I18N::translate('Godparent')),
            //'FAM:_TODO:SOUR'              => new XrefSource(I18N::translate('Source citation')),

            //Additional INDI types
            'INDI:CONF:TYPE'                => new ConfirmationType(I18N::translate('Type of confirmation')),
            'INDI:EDUC:TYPE'                => new EducationType(I18N::translate('Type of education')),
            'INDI:EVEN:TYPE'                => new EventType(I18N::translate('Type of event')),
            'INDI:FACT:TYPE'                => new FactType(I18N::translate('Type of fact')),
            'INDI:GRAD:TYPE'                => new GraduationType(I18N::translate('Type of graduation')),
            'INDI:NAME:TYPE'                => new ExtendedNameType(I18N::translate('Type of name')),
            'INDI:ORDN:TYPE'                => new OrdinationType(I18N::translate('Type of ordination')),

            //Additional FAM types
            'FAM:MARR:TYPE'                 => new ExtendedMarriageType(I18N::translate('Type of marriage')),
            'FAM:EVEN:TYPE'                 => new EventType(I18N::translate('Type of event')),

            //Additional descriptors for relationships
            'FAM:_ASSO:RELA'                => new ExtendedRelationIsDescriptor(I18N::translate('Relationship')),
            'FAM:*:_ASSO:RELA'              => new ExtendedRelationIsDescriptor(I18N::translate('Relationship')),
            'INDI:ASSO:RELA'                => new ExtendedRelationIsDescriptor(I18N::translate('Relationship')),
            'INDI:*:_ASSO:RELA'             => new ExtendedRelationIsDescriptor(I18N::translate('Relationship')),

            //Additional roles in events
            'FAM:*:SOUR:EVEN:ROLE'          => new ExtendedRoleInEvent(I18N::translate('Role')),
            'FAM:SOUR:EVEN:ROLE'            => new ExtendedRoleInEvent(I18N::translate('Role')),
            'INDI:*:SOUR:EVEN:ROLE'         => new ExtendedRoleInEvent(I18N::translate('Role')),
            'INDI:NAME:*:SOUR:EVEN:ROLE'    => new ExtendedRoleInEvent(I18N::translate('Role')),
            'INDI:SOUR:EVEN:ROLE'           => new ExtendedRoleInEvent(I18N::translate('Role')),
            'NOTE:SOUR:EVEN:ROLE'           => new ExtendedRoleInEvent(I18N::translate('Role')),
            'OBJE:SOUR:EVEN:ROLE'           => new ExtendedRoleInEvent(I18N::translate('Role')),
            'FAM:*:_ASSO:SOUR:EVEN:ROLE'    => new ExtendedRoleInEvent(I18N::translate('Role')),
            'INDI:*:_ASSO:SOUR:EVEN:ROLE'   => new ExtendedRoleInEvent(I18N::translate('Role')),
            '_LOC:SOUR:EVEN:ROLE'           => new ExtendedRoleInEvent(I18N::translate('Role')),
            '_LOC:*:SOUR:EVEN:ROLE'         => new ExtendedRoleInEvent(I18N::translate('Role')),
        ];
    }

    /**
     * Defintion of sub tag structures
     *
     * @return array<string,array<int,array<int,string>>>
     */
    protected function customSubTags(): array
    {
        return [
            //Examples for additonal custom tags
            //'INDI:BIRT'  => [['_GODP', '0:1']],
            //'FAM:_TODO'  => [['SOUR',  '0:M']],
        ];
    }
}
