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

## Configuration
+ Add/remove GEDCOM custom tags
    + Modifiy the function customTags() and the function customSubTags() in MyCustomTags.php, //Additonal custom tags
+ Add/remove types to be used
    + Modifiy the function [customTags() in MyCustomTags.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/MyCustomTags.php#L128), //Additional types
+ Add/remove type definitons
    + Modifiy the function values() in xxxType.php (e.g. [EventType.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/EventType.php#L44)), //Value in GEDCOM  => Value shown in webtrees frontend
+ Add/remove additional custom descriptors for relationships
    + Modifiy the [function values() in ExtendedRelationIsDescriptor.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/ExtendedRelationIsDescriptor.php#L48), //Value in GEDCOM  => Value shown in webtrees frontend
+ Add/remove additional custom descriptors for relationships
    + Modifiy the [function values() in ExtendedRoleInEvent.php](https://github.com/Jefferson49/MyCustomTags/blob/main/my_custom_tags/ExtendedRoleInEvent.php#L45), //Value in GEDCOM  => Value shown in webtrees frontend

## Webtrees version
The latest release of the module was developed and tested with [webtrees 2.1.18](https://webtrees.net/download), but should also run with any other webtrees 2.1 version.

## Github repository
https://github.com/Jefferson49/MyCustomTags
