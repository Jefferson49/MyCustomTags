<?php

/**
 * Module to establish custom tags
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
 * Module to establish custom tags
 * 
 * Modules *must* implement ModuleCustomInterface.  They *may* also implement other interfaces.
 */
class MyCustomTags extends AbstractModule implements ModuleCustomInterface
{
    // For every module interface that is implemented, the corresponding trait *should* also use be used.
    use ModuleCustomTrait;

    /**
     * How should this module be identified in the control panel, etc.?
     *
     * @return string
     */
    public function title(): string
    {
        return I18N::translate('My Custom Tags');
    }

    /**
     * A sentence describing what this module does.
     *
     * @return string
     */
    public function description(): string
    {
        return I18N::translate('This module provides custom tags and also custom types for certain tags');
    }

    /**
     * The person or organisation who created this module.
     *
     * @return string
     */
    public function customModuleAuthorName(): string
    {
        return 'Markus Hemprich';
    }

    /**
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
     * @return array<string,ElementInterface>
     */
    protected function customTags(): array
    {
        return [
            //Additonal custom tags
           'INDI:BIRT:_GODP'             => new CustomElement(I18N::translate('Godparent')),
		   'INDI:_TODO:SOUR'             => new XrefSource(I18N::translate('Source citation')),	   
           'FAM:_TODO:SOUR'              => new XrefSource(I18N::translate('Source citation')),

           //Additional types
           'INDI:CONF:TYPE'              => new ConfirmationType(I18N::translate('Type of confirmation')),
           'INDI:EDUC:TYPE'              => new EducationType(I18N::translate('Type of education')),
           'INDI:EVEN:TYPE'              => new EventType(I18N::translate('Type of event')),
           'INDI:FACT:TYPE'              => new FactType(I18N::translate('Type of fact')),
           'INDI:GRAD:TYPE'              => new GraduationType(I18N::translate('Type of graduation')),
           'INDI:NAME:TYPE'              => new ExtendedNameType(I18N::translate('Type of name')),
           'INDI:ORDN:TYPE'              => new OrdinationType(I18N::translate('Type of ordination')),

           //Additional descriptors for relationships
           'FAM:_ASSO:RELA'              => new ExtendedRelationIsDescriptor(I18N::translate('Relationship')),
           'FAM:*:_ASSO:RELA'            => new ExtendedRelationIsDescriptor(I18N::translate('Relationship')),
           'INDI:ASSO:RELA'              => new ExtendedRelationIsDescriptor(I18N::translate('Relationship')),
           'INDI:*:_ASSO:RELA'           => new ExtendedRelationIsDescriptor(I18N::translate('Relationship')),

           //Additional roles in events
           'FAM:*:SOUR:EVEN:ROLE'        => new ExtendedRoleInEvent(I18N::translate('Role')),
           'FAM:SOUR:EVEN:ROLE'          => new ExtendedRoleInEvent(I18N::translate('Role')),
           'INDI:*:SOUR:EVEN:ROLE'       => new ExtendedRoleInEvent(I18N::translate('Role')),
           'INDI:NAME:*:SOUR:EVEN:ROLE'  => new ExtendedRoleInEvent(I18N::translate('Role')),
           'INDI:SOUR:EVEN:ROLE'         => new ExtendedRoleInEvent(I18N::translate('Role')),
           'NOTE:SOUR:EVEN:ROLE'         => new ExtendedRoleInEvent(I18N::translate('Role')),
           'OBJE:SOUR:EVEN:ROLE'         => new ExtendedRoleInEvent(I18N::translate('Role')),
           'FAM:*:_ASSO:SOUR:EVEN:ROLE'  => new ExtendedRoleInEvent(I18N::translate('Role')),
           'INDI:*:_ASSO:SOUR:EVEN:ROLE' => new ExtendedRoleInEvent(I18N::translate('Role')),        
           '_LOC:SOUR:EVEN:ROLE'         => new ExtendedRoleInEvent(I18N::translate('Role')),
           '_LOC:*:SOUR:EVEN:ROLE'       => new ExtendedRoleInEvent(I18N::translate('Role')),
        ];
    }

    /**
     * @return array<string,array<int,array<int,string>>>
     */
    protected function customSubTags(): array
    {
        return [
            'INDI:BIRT'  => [['_GODP', '0:1']],
			'INDI:_TODO' => [['SOUR',  '0:M']],
            'FAM:_TODO'  => [['SOUR',  '0:M']],
        ];
    }
}
