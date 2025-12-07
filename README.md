# Wesanox Menu Builder

A lightweight and flexible Menu Builder module for ProcessWire, designed to generate multi-level menu structures using RepeaterMatrix fields.
The module automatically installs required dependencies, creates necessary fields and templates, and provides a rendering method to output menu data as JSON for your frontend.

## IMPORTANT NOTICE

Before installing Wesanox Menu Builder, you must manually install the following required modules:

- WesanoxHelperClasses
https://github.com/wesanox/WesanoxHelperClasses

 - WesanoxHelperFields
https://github.com/wesanox/WesanoxHelperFields

These modules provide the helper methods and field-generation features used by this module.

--------------------------

## Module Information

The module registers as WesanoxMenuBuilder and provides:

- Automatic installation of required modules
- Automatic creation of fields and settings template
- Automatic installation of CroppableImage3 (via direct ZIP download)
- Hooking into the save process to assign internal IDs to menu elements
- JSON rendering method for frontend menu output
- Compatibility with:
    - ProcessWire 3.0.210 or higher
    - PHP 8.0 or higher

--------------------------

## Installation

### 1. Install Required Helper Modules

Install the two required modules before installing this module:

```
WesanoxHelperClasses
WesanoxHelperFields
```

### 2. Install Wesanox Menu Builder

1. Copy the module folder into /site/modules/WesanoxMenuBuilder/

2. Install it via the ProcessWire backend

During installation the module will:

- Install external modules such as CroppableImage3
- Create required fields through WesanoxHelperFields
- Create the template options_generals if missing
- Create a settings page (/settings/) under the home page

--------------------------

## How It Works

### Menu Structure

The menu system uses:

- A Matrix field: matrix_menu
- A Repeater field inside each matrix item: repeater_menu

Each repeater entry has a depth field indicating its level:

Depth	Meaning
0	    Main menu item
1	    Submenu item
2	    Sub-submenu item

The module assigns numeric internal IDs (int_menu, int_menu_sub) so parent/child relationships can be mapped reliably.

### Rendering the Menu

To generate structured JSON data for a specific menu position:

```
$MenuBuilder = $modules->get('WesanoxMenuBuilder');
$json = $MenuBuilder->renderMenu($page->matrix_menu, 0);
$menuArray = json_decode($json, true);
```

The returned structure includes:

- URL, title, and description
- ARIA labels
- Images
- Parent/child references
- Target settings (new tab, etc.)

--------------------------

## Hooks

The module adds the hook:

```
Pages::saved → saveMenuInt()
```

Whenever the options page is saved, the module:

- Recalculates menu IDs
- Updates all menu elements
- Ensures correct subgroup mappings

--------------------------

## Uninstallation

When the module is uninstalled:

- Fields added to the settings template are removed
- All automatically created fields are deleted
- Internal cleanup is performed

--------------------------

## External Modules

The following required module is auto-installed if missing:

CroppableImage3
https://github.com/horst-n/CroppableImage3

--------------------------

## License

MIT License
(Replace with your preferred license if necessary)