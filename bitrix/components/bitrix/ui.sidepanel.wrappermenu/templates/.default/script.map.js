{"version":3,"file":"script.map.js","names":["BX","namespace","UI","DropdownMenu","options","this","container","items","prototype","init","querySelectorAll","i","length","item","id","link","button","submenu","querySelector","operativeItem","getAttribute","disableExpandByLink","push","classList","contains","activeItem","noticeItem","loadData","addItem","DropdownMenuItem","menu","resetItems","reset","resetSubItems","itemsMap","WeakMap","subItems","submenuOpen","newBadge","counter","set","getItemByNode","node","Dom","hasClass","get","parentNode","isSubmenuExist","getToggleButton","appendChild","submenuVisibilityStateVisible","subItem","activeSubItem","showSubmenu","setNewToggleButtonName","addEvents","addSubItem","activate","add","remove","addNoticeIcon","children","getNoticeIcon","removeNoticeIcon","noticeIcon","document","createElement","className","style","height","getSubmenuHeight","hideSubmenu","subItemsHeight","getHeight","addEventListener","setActiveHandler","bind","showSubmenuHandler","e","setDefaultToggleButtonName","preventDefault","stopPropagation","buttonContainer","innerHTML","message","getNewItemBadge","itemBadgeNewContainer","getCounter","counterContainer","getAddItem","addItemContainer","setAddItemName","DropdownMenuSubItem","subMenu","offsetHeight"],"sources":["script.js"],"mappings":"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"}