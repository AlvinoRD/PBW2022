(function() {    
    if(typeof window.top._pbjsGlobals !== 'undefined'){
        if(window.top._pbjsGlobals.length > 0){
            window.top._pbjsGlobals.forEach(function(global_variable_pbjs_name){
                
                const pbjs_object = window.top[global_variable_pbjs_name];
                
                var smilewanted_called = false;
                
                if(pbjs_object.adUnits){
                    pbjs_object.adUnits.forEach(function(ad_unit){
                        if(ad_unit['bids']){
                            ad_unit['bids'].forEach(function(bid){
                                if(bid.bidder === 'smilewanted'){
                                    smilewanted_called = true;
                                }
                            });
                        }
                    });
                }
                
                if(smilewanted_called){
                    
                    var module_user_sync = false;
                    var user_sync_delay = 0;
                    var module_consent_management = false;
                    var partner_smilewanted_authorized = false;
                    var position_type_infeed_enabled = false;
                    
                    if(pbjs_object.getConfig()){
                        
                        const pbjs_config = pbjs_object.getConfig();
                        var pbjs_config_json = JSON.stringify(pbjs_object.getConfig());
                        
                        if(pbjs_config.consentManagement){
                            module_consent_management = true;
                        }
                        
                        if(pbjs_config.userSync){
                            
                            module_user_sync = true;
                            user_sync_delay = pbjs_config.userSync.syncDelay;
                            
                            if(pbjs_config.userSync.filterSettings.iframe){
                                if(pbjs_config.userSync.filterSettings.iframe.filter === 'include'){
                                    if(typeof(pbjs_config.userSync.filterSettings.iframe.bidders) === 'object'){
                                        partner_smilewanted_authorized = pbjs_config.userSync.filterSettings.iframe.bidders.includes('smilewanted');
                                    }else{
                                        if(pbjs_config.userSync.filterSettings.iframe.bidders === '*'){
                                            partner_smilewanted_authorized = true;
                                        }
                                    }   
                                }else if(pbjs_config.userSync.filterSettings.iframe.filter === 'exclude'){
                                    if(typeof(pbjs_config.userSync.filterSettings.iframe.bidders) === 'object'){
                                        partner_smilewanted_authorized = !pbjs_config.userSync.filterSettings.iframe.bidders.includes('smilewanted');
                                    }else{
                                        if(pbjs_config.userSync.filterSettings.iframe.bidders === '*'){
                                            partner_smilewanted_authorized = false;
                                        }
                                    }
                                }   
                            }
                            
                            if(pbjs_config.userSync.filterSettings.all){
                                if(pbjs_config.userSync.filterSettings.all.filter === 'include'){
                                    if(typeof(pbjs_config.userSync.filterSettings.all.bidders) === 'object'){
                                        partner_smilewanted_authorized = pbjs_config.userSync.filterSettings.all.bidders.includes('smilewanted');
                                    }else{
                                        if(pbjs_config.userSync.filterSettings.all.bidders === '*'){
                                            partner_smilewanted_authorized = true;
                                        }
                                    }   
                                }else if(pbjs_config.userSync.filterSettings.all.filter === 'exclude'){
                                    if(typeof(pbjs_config.userSync.filterSettings.all.bidders) === 'object'){
                                        partner_smilewanted_authorized = !pbjs_config.userSync.filterSettings.all.bidders.includes('smilewanted');
                                    }else{
                                        if(pbjs_config.userSync.filterSettings.all.bidders === '*'){
                                            partner_smilewanted_authorized = false;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    if(pbjs_object.adUnits){
                        pbjs_object.adUnits.forEach(function(ad_unit){
                            if(ad_unit['bids']){
                                ad_unit['bids'].forEach(function(bid){
                                    if(bid.bidder === 'smilewanted'){
                                        if(bid.params['positionType']){
                                            position_type_infeed_enabled = bid.params['positionType'].includes("infeed");
                                        }
                                    }
                                });
                            }
                        });
                    }
                    
                    var data_push_event = {};
                    
                    data_push_event[0] = 'yzxhC5DyrgnwuTTvya8+Me5n92xaL17uiI5V2oMewu3MTJeW82nLw+aTQbLNAGWqMG64MEs7ZqSk2zbz3yufkhpiNNHovn0UOdAf5ERr/kHBXZLGTbaNCu78gmsfLqENjwBNP6LO4dXA9LwvMqWpvMPzTVnU7Q5igjegJi5rftk9f1jul0oEjjhUM+zNfkGM6CHhJNir5L7If7Q7gvCG095Y1kV+cFzq/KmGzCYEJzm7gi/zk+Ci/VVnliAa3sTg9gbDcGv68JTfnuGqC+aoTp4KQG2mUDX1mO+1pVNS8Y7CYH8K4QabL3C8k0/+xCnVA7q+/JIuy64mmthGcaBYzfcMaWM6Htijs3r79SEoOqDk6HmdWPYb0rewnaCJdWGOctPQfxWZKsnaSUEMFtOn2hldtVC6Cb/X8Ci+VoPoBE3DotbT9C2om2Lv2sIivqHkQxTDy1ae1+xECOqaSXR/zqoHTyJ9tV4F1f11OfHhUjX/o6oTr6Wp1ss1Cuka7aVXcgp8LU8muOKJOaWmpslMuIDugcE7LUSb2nLLoZ0PUVL8su1aHcyDbsVQz5MJyDoAhnwamZusnNGBgiDaZ7cJevby6bBgujAj4nfqGkvPQPe5dUIhLWAtXpZEHPl1SyFmrSsZo4DqUGBpZ8tMQMnNp4yJT4+2iigmwDg4J/nji2VQL/+QabY4LfCi0wCACp7V3S9/N8obmnxd7i2J4ZN6+QPM3/D5j2P+rDEUEYeZjtYo40lHwWLpnGBHwgxx1d+40TNofo5v6PKL5q4ABgbNA+bN4XUT3NdgFfvAuOR8I5meVwrE55LMiMwYtoZ1tu/6JFT8uCVJ344kEHIRhRmjdRuEmYKDv4qzlnV7pWvzjheoMya2iWIBBrRK9d3Bgegjwto2oyBHjDYfxvSrTIjqBAsedeo1jdACjm+c7UMOD9+w3EAQgPYlO+pjlxIbOHPuJyxtFADLuoyRixqhCI8lP4FQ+d5dDZ8xq6Y8vMh+zgn/RG2/chystiV0eWhmYbQQzXV4BwZyPMIlY2e7s/0mgn/R1EF/xDm7MMnfXsOiwZV/QuOHTH6XV4mZx2+Zyxy5PWXRljWWmBRf0CvNKHcjXIhapfYVMp+jukE9dnbQFsnoSdS9Kl8Ci629ZJysJU0iPCMjkqWXWqXM6XwbSBbtsjHcUe59/Uj5f2Mc44X7pzq+LID2YJ+Skpj9oRPRO+1ySWFp2PBQInK2IOwY4/6/GvT4NeipsOUvDuLLwjpLBaaE52s1sbXU4einHNAckbS2';
                    data_push_event[1] = global_variable_pbjs_name;
                    data_push_event[2] = module_user_sync;
                    data_push_event[3] = partner_smilewanted_authorized;
                    data_push_event[4] = module_consent_management;
                    data_push_event[5] = user_sync_delay;
                    data_push_event[6] = position_type_infeed_enabled;

                    // Envoie des données en POST
                    navigator.sendBeacon('https://prebid.smilewanted.com/track/prebid_js_config.php', JSON.stringify(data_push_event));
                }
            });
        }
    }    
}());
