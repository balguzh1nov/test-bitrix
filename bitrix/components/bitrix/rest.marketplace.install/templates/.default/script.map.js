{"version":3,"file":"script.map.js","names":["BX","namespace","Rest","Marketplace","Install","init","params","this","code","CODE","version","VERSION","checkHash","CHECK_HASH","installHash","INSTALL_HASH","from","FROM","iframe","IFRAME","redirectPriority","REDIRECT_PRIORITY","formNode","buttonInstallNode","findChildByClassName","buttonCloseNode","bind","onSubmitForm","onClickClose","event","preventDefault","SidePanel","Instance","close","checked","innerHTML","message","show","hasClass","classList","add","queryParam","check_hash","install_hash","ajax","runAction","data","then","response","result","error","helperCode","top","UI","InfoHelper","error_description","redirect","location","href","util","remove_url_param","installed","eventResult","onCustomEvent","open","reload","rest","AppLayout","openApplication","id","initHelper","window","isInited","frameUrlTemplate","frameNode","iframeId","proxy","origin","indexOf","action","slider","getTopSlider"],"sources":["script.js"],"mappings":"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"}