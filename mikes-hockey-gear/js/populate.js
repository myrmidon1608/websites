
PopulateData = {
    
    pageData: {
        store: undefined,
        gear: undefined,
        coupons: undefined
    },
    
    dayRef: {
        mon: 'Monday',
        tues: 'Tuesday',
        wed: 'Wednesday',
        thurs: 'Thursday',
        fri: 'Friday',
        sat: 'Saturday',
        sun: 'Sunday'
    },
    
    getStoreInfo: function() {
        $.getJSON("data/store-info.json", function(data) {
            PopulateData.pageData.store = data;
            
            PopulateData.setHeaderInfo('bcs');
            PopulateData.setHeaderInfo('ws');
            
            if($('#home')) {
                PopulateData.setAlertBox();
                PopulateData.setPhoneInfo('bcs');
                PopulateData.setPhoneInfo('ws');
            }
            
            if($('#contact')) {
                PopulateData.setContactInfo();
            }
            
            if($('#sitemap')) {
                PopulateData.setRinkPageUrl('bcs');
                PopulateData.setRinkPageUrl('ws');
            }
        });
    },
    
    getCouponData: function() {
        $.getJSON("data/coupons.json", function(data) {
            PopulateData.pageData.coupons = data;
            
            PopulateData.setCouponData();
        });
    },
    
    getUsedGearData: function() {
        $.getJSON("data/used-gear.json", function(data) {
            PopulateData.pageData.gear = data;
            
            $.each(data, function(key, value) {
                var id = key + "-list";
                
                PopulateData.setUsedGearMenu(id, value);
                PopulateData.setUsedGearList(id, value);
            });
        });
    },
    
    setHeaderInfo: function(id) {
        var info  = PopulateData.pageData.store[id],
            title = "<strong><a href=\"" + info.url + "\" target=\"_blank\">" + info.title + "</a></strong>",
            addr  = info.address,
            hours = "<span data-toggle=\"modal\" data-id=\"" + id + "\" onclick=\"PopulateData.setHours($(this));\">Hours</span>",
            phone = "<h3>" + info.phone + "</h3>";
        
        $('#' + id).append(
            "<p>" + title + "<br />" + addr + "<br />" + hours + "</p>" + phone
        );
    },
    
    setHours: function(e) {
        var id    = e.data('id'),
            info  = PopulateData.pageData.store[id],
            title = info.title + " Hours",
            hours = info.hours;
        
        $('#hoursModal .modal-header h3').html(title);
        $('#hoursModal .modal-body table').html('');
        
        $.each(hours, function(key, value) {
            var day  = PopulateData.dayRef[key];
            
            $('#hoursModal .modal-body table').append(
                "<tr><td class=\"day\">" + day + ":</td>" +
                "<td class=\"time\">" + value + "</td></tr>"
            );
        });
        $('#hoursModal').modal();
    },
    
    setAlertBox: function() {
        var alertData = PopulateData.pageData.store['alert'];
        
        $("#alert-box").html(alertData);
    },
    
    setPhoneInfo: function(id) {
        var info  = PopulateData.pageData.store[id],
            title = "<h3><a href=\"" + info.url + "\" target=\"_blank\">" + info.title + "</a></h3>",
            phone = "<h3><a href=\"tel:" + info.phone + "\">" + info.phone + "</a></h3>",
            hours = "<span data-toggle=\"modal\" data-id=\"" + id + "\" onclick=\"PopulateData.setHours($(this));\">Hours</span>",
            addr  = "<a href=\"http://maps.google.com/maps?daddr=" + PopulateData.generateMapAddr(info.address) + "\" target=\"_blank\">Get Directions</a>";
            
        
        $('#phone-info').append(
            title + phone + "<h5>" + hours + "&nbsp;&nbsp;&bull;&nbsp;&nbsp;" + addr + "</h5><br />"
        );
    },
    
    setCouponData: function() {
        var coupons = PopulateData.pageData.coupons;
        
        $.each(coupons, function(key, value) {
            var title = "<h4 class=\"title\">" + value.title + "</h4>",
                info  = "";

            $.each(value.info, function(key, value) {
                info += value + "<br />";
            });

            info += "<br /><p>Expires " + value.expire + "<span class=\"right\">ID: " + value.id + "</span></p>";
                
            $("#coupons").append(
                "<div class=\"col-sm-4\">" +
                    "<div class=\"coupon\">" +
                        "<div class=\"row\">" +
                            "<div class=\"col-xs-5\"><img src=\"/img/logo.jpg\" alt=\"Mike's Hockey Gear\" /></div>" + 
                            "<div class=\"col-xs-7\">" + title + "</div>" + 
                        "</div>" + info +
                    "</div>" + 
                "</div>"
            );
        });
    },
    
    setPageCounter: function() {
        $.ajax({
            type: "POST",
            url: "session.php",
            dataType: "json",
            success: function(data) {
                $('#counter').html(data.counter);
            }
        });
    },
    
    setContactInfo: function() {
        var about = PopulateData.pageData.store['about'];
        
        $("#about-mhg").html("<p>" + about + "</p>");
        
        PopulateData.setStoreContactInfo('bcs');
        PopulateData.setStoreContactInfo('ws');
    },
    
    setStoreContactInfo: function(id) {
        var info  = PopulateData.pageData.store[id],
            title = "<h4><a href=\"" + info.url + "\" target=\"_blank\">" + info.title + "</a></h4>",
            phone = "<h4>" + info.phone + "</h4>",
            fax   = (info.fax) ? "<p><strong>" + info.fax + " (Fax)</strong></p>" : "",
            addr  = "<p>" + info.address + "</p>",
            hours = "<p><span data-toggle=\"modal\" data-id=\"" + id + "\" onclick=\"PopulateData.setHours($(this));\">Hours</span></p>";
        
        $('#store-contact').append(
            "<div class=\"col-sm-4\">" + title + phone + fax + addr + hours + "</div>"
        );
    },
    
    setRinkPageUrl: function(id) {
        var info = PopulateData.pageData.store[id],
            link = "<p><a href=\"" + info.url + "\" target=\"_blank\">" + info.title + "</a></p>";
            
        $('#sitemap').append(link);
    },
    
    setUsedGearMenu: function(id, content) {
        $('#used-menu').append(
            "<li><a href=\"#" + id + "\">" + content.title + "</a></li>"
        );
    },
    
    setUsedGearList: function(id, content) {
        var node  = "<div id=\"" + id + "\"></div>",
            title = "<h3>" + content.title + "</h3>",
            dir   = content.dir,
            cols  = 3,
            i     = 0,
            list  = '';
            
        $('#used-list').append(node);
        $('#' + id).append(title);
            
        $.each(content.info, function(key, value) {
            var img   = "<img src=\"/" + dir + value.img +"\" alt=\"" + value.name + "\" />",
                name  = "<p class=\"itemName\">" + value.name + "</p>",
                size  = "<p><span class=\"itemSize\">" + value.size + "</span>",
                price = (value.price && value.price.length > 0) ? "<span class=\"itemPrice\">$" + value.price + "</span></p>" : "";    
            
            if(i == 0) list += "<div class=\"row\">";
            
            list += "<div class=\"col-sm-3 col-xs-6 used-item\">" + img + name + size + price + "</div>";
            
            if(i == cols) list += "</div>";
            
            i = (i < cols) ? i + 1 : 0;
        });
        $('#' + id).append(list);
    },
    
    generateMapAddr: function(addr) {
        var removeBr  = addr.replace("<br />", " "),
            nrmlSpace = removeBr.replace("/ +/", /\s/g),
            mapString = nrmlSpace.replace(/\s/g, "+");
            
        return mapString;
    }
}