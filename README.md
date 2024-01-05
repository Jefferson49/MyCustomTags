## MyCustomTags
A [weebtrees](https://webtrees.net) 2.1 custom module to provide custom tags, custom types, custom relationship descriptors, and custom roles in events.

## What are the benefits of this module?
+ Provide additional GEDCOM custom tags to be used in webtrees
+ Provde additional custom types for certain GEDCOM tags:
    + Confirmation (INDI:CONF:TYPE)
    + Education (INDI:EDUC:TYPE)
    + Events (INDI:EVEN:TYPE)
    + Facts (INDI:FACT:TYPE)
    + Graduation (INDI:GRAD:TYPE)
    + Additional custom types for names (INDI:NAME:TYPE)
    + Ordination (INDI:ORDN:TYPE)
+ Provide additional custom descriptors for relationships (FAM:_ASSO:RELA, FAM:\*:_ASSO:RELA, INDI:ASSO:RELA, INDI:\*:_ASSO:RELA)
+ Provide additional custom roles in events (\*:\*:EVEN:ROLE)

## Installation
+ Download the [latest code](https://github.com/Jefferson49/MyCustomTags/zipball/main/) of the module
+ Unzip and copy the folder "my_custom_tags" into the "module_v4" folder of your webtrees installation
+ **Please note that the provided module code only provides a template as a starting point for your own customization/configuration**. The provided template contains an example with a configuration used by the author
+ Since the module code is just a template for your own customization, it it not planned to provide any releases

## Configuration
+ Add/remove GEDCOM custom tags
    + Modifiy the function [customTags() in MyCustomTags.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/MyCustomTags.php#L168) and the function [customSubTags() in MyCustomTags.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/MyCustomTags.php#L211) , //Additonal custom tags
    + As reference how custom tags are defined in webtrees, you can have a look at the code in [webtreesTags() in Gedcom.php](https://github.com/fisharebest/webtrees/blob/main/app/Gedcom.php#L891) and [webtreesSubTags() in Gedcom.php](https://github.com/fisharebest/webtrees/blob/main/app/Gedcom.php#L944)
+ Add/remove types to be used
    + Modifiy the function [customTags() in MyCustomTags.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/MyCustomTags.php#L176), //Additional types
+ Add/remove type definitons
    + Modifiy the function values() in xxxType.php (e.g. [EventType.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/EventType.php#L45)), //Value in GEDCOM  => Value shown in webtrees frontend
+ Add/remove additional custom descriptors for relationships
    + Modifiy the [function values() in ExtendedRelationIsDescriptor.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/ExtendedRelationIsDescriptor.php#L48), //Value in GEDCOM  => Value shown in webtrees frontend
+ Add/remove additional custom descriptors for relationships
    + Modifiy the [function values() in ExtendedRoleInEvent.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/ExtendedRoleInEvent.php#L45), //Value in GEDCOM  => Value shown in webtrees frontend

## Webtrees version
The latest release of the module was developed and tested with [webtrees 2.1.18](https://webtrees.net/download), but should also run with any other webtrees 2.1 version.

## Translation
The translation is based on [gettext](https://en.wikipedia.org/wiki/Gettext) and uses .po files, which can be found in [/resources/lang/](https://github.com/Jefferson49/MyCustomTags/tree/main/my_custom_tags/resources/lang). You can use a local editor like [Poedit](https://poedit.net/) or [notepad++](https://notepad-plus-plus.org/) to add or modify translations.

Currently, the following languages are already available:
+ Dutch
+ English
+ German

If you want to translate custom tags, types, relationship descriptors, or roles in events, you can also add further translations to the code. 

### Example for translation of types etc.
You can add translation to a fact type in [FactType.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/FactType.php#L44) with the following modification in the code:
+ 'Military Service'           => **I18N::translate('Military Service'),**

Afterwards, the translation has to be provided by a .po file, see above.

## Github repository
https://github.com/Jefferson49/MyCustomTags
