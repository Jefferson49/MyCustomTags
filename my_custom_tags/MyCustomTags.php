<?php

/**
 * Module to establish custom tags
 */

declare(strict_types=1);

namespace MyCustomTags;

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
        return I18N::translate('This module provides custom tags');
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
           'INDI:BIRT:_GODP' => new CustomElement(I18N::translate('Godparent')),
		   'INDI:_TODO:SOUR' => new XrefSource(I18N::translate('Source citation')),	   
           'FAM:_TODO:SOUR' => new XrefSource(I18N::translate('Source citation')),
        ];
    }

    /**
     * @return array<string,array<int,array<int,string>>>
     */
    protected function customSubTags(): array
    {
        return [
            'INDI:BIRT' => [['_GODP', '0:1']],
			'INDI:_TODO' => [['SOUR', '0:M']],
            'FAM:_TODO' => [['SOUR', '0:M']],
        ];
    }
}
