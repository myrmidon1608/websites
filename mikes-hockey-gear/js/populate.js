
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
        $.getJSON("/data/store-info.json", function(data) {
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
        $.getJSON("/data/coupons.json", function(data) {
            PopulateData.pageData.coupons = data;
            
            PopulateData.setCouponData();
        });
    },
    
    getUsedGearData: function() {
        $.getJSON("/data/used-gear.json", function(data) {
            PopulateData.pageData.gear = data;
            
            //$.each(data, function(key, value) {
                var id = "used-carousel";
                
                //PopulateData.setUsedGearMenu(id, value);
                PopulateData.setUsedGearList(id, data);
            //});
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
        console.log(id);
        $('#hoursModal .modal-header h3').html(title);
        $('#hoursModal .modal-body').html('');
        
        // Summer Hours
        if(id == 'bcs') {
            $('#hoursModal .modal-body').append("<p><strong><a href=\"/media/bci-summer-calendar.xls\">Summer Hours</a></strong></p>");
        }
        $('#hoursModal .modal-body').append('<table></table>');
        
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
        var couponData       = PopulateData.pageData.coupons,
            couponContainers = $('.coupon');

        for(var i = 0; i < couponContainers.length; i++) {
            if(couponData[i]) {
                var title = "<h4 class=\"title\">" + couponData[i].title + "</h4>",
                    info  = "";

                $.each(couponData[i].info, function(key, value) {
                    info += value + "<br />";
                });

                info += "<br /><p>Expires " + couponData[i].expire;
                if(couponData[i].id) info += "<span class=\"right\">ID: " + couponData[i].id + "</span></p>";

                couponContainers[i].innerHTML =
                    "<div class=\"row\">" +
                        "<div class=\"col-xs-5\"><img src=\"/img/logo.jpg\" alt=\"Mike's Hockey Gear\" /></div>" + 
                        "<div class=\"col-xs-7\">" + title + "</div>" + 
                    "</div>" + info;
            }
        }
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
        for(var i = 0; i < content.length; i++) {
            var value = content[i],
                img = "<img src=\"/img/used/carousel/" + value.img +".JPG\" alt=\"" + value.title + "\" />",
                title = "<h1>" + value.title + "</h1>",
                subtitle = "<p>" + value.subtitle + "</p>";
                
            var cls = (i == 0) ? "item active" : "item";
                
            $("#" + id + " .carousel-inner").append(
                "<div class=\"" + cls + "\">" +
                img +
                "<div class=\"carousel-caption\">" +
                title +
                //subtitle +
                "</div>" +
                "</div>"
            );
        }
    },
    
    generateMapAddr: function(addr) {
        var removeBr  = addr.replace("<br />", " "),
            nrmlSpace = removeBr.replace("/ +/", /\s/g),
            mapString = nrmlSpace.replace(/\s/g, "+");
            
        return mapString;
    }
}