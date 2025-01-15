{"version":3,"file":"field-selector.map.js","names":["BX","Type","isUndefined","UI","EntityEditorFieldSelector","this","_id","_settings","_scheme","_excludedNames","_currentSchemeElementName","checkboxList","defaultSectionKey","categories","options","prototype","initialize","id","settings","prop","get","getObject","getMessage","name","getString","messages","isSchemeElementEnabled","sectionElement","schemeElement","sectionName","getName","elementName","elementList","isArrayFilled","includes","addClosingListener","listener","Event","EventEmitter","subscribe","removeClosingListener","unsubscribe","isOpened","isShown","setExcludedNames","excludedNames","setCurrentSchemeElementName","currentSchemeElementName","open","Runtime","loadExtension","then","createFieldsSelector","show","initCheckboxListParams","prepareElements","prepareHiddenElements","sections","getDefaultSections","CheckboxList","columnCount","lang","title","acceptBtn","Loc","placeholder","emptyStateTitle","emptyStateDescription","allSectionsDisabledTitle","params","destroyPopupAfterClose","useSearch","getBoolean","showBackToDefaultSettings","useSectioning","isStringFilled","events","onApply","event","onApplyCheckboxList","data","fields","onCancel","onCancelCheckboxList","columns","getElements","forEach","column","section","effectiveElements","childElements","childElement","isTransferable","push","getTitle","sectionKey","key","element","addOption","hiddenElements","getArray","hiddenCategory","category","value","categoryKey","getSectionName","defaultValue","getElementId","emit","sender","isCanceled","items","getSelectedItems","results","field","parts","split","length","fieldName","create","self","EntityEditorUserSelector","_isInitialized","_onlyUsers","getId","anchor","_mainWindow","SocNetLogDestination","containerWindow","init","extranetUser","userSearchArea","bindMainPopup","node","offsetTop","offsetLeft","callback","select","delegate","onSelect","unSelect","showSearchInput","departmentSelectDisable","users","groups","sonetgroups","socnetGroups","department","departmentRelation","buildDepartmentRelation","itemsLast","last","itemsSelected","isCrmFeed","useClientDatabase","destSort","allowAddUser","allowSearchCrmEmailUsers","allowUserSearch","openDialog","bindNode","close","closeDialog","item","type","search","bUndeleted","getFunction","EntityEditorEntitySelector","isObject","_entitySelector","validateSettings","isFunction","TypeError","_createDialog","destroy","getData","entityId","result","text","EntitySelector","Dialog","targetNode","Text","getRandom","context","entities","intranetUsersOnly","emailUsers","inviteEmployeeLink","inviteGuestLink","selectMode","popupOptions","bindOptions","forceBindPosition","enableSearch","bind","onHide","hideOnSelect","clearUnavailableItems","multiple"],"sources":["field-selector.js"],"mappings":"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"}