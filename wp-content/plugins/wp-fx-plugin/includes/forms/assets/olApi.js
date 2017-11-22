var olApi = function(apiUrl, tpUrl){
    this.apiUrl = apiUrl;
    this.tpUrl = tpUrl;
    this.logined = false;
};

(function($){
    olApi.prototype.connectLoginForm = function(args){
        var self = this;
        $form = args.$form;
        $form.on('submit', function(e){
            $login = args.$login.val();
            $password = args.$password.val();
            self.login($login, $password, args.success, args.error);
            e.preventDefault();
        });
    };

    olApi.prototype.connectRegistrationForm = function(args){
        var self = this;
        $form = args.$form;

        $.ajax({
            method: "GET",
            url: self.apiUrl + 'options'
        }).done(function(response) {
            if(args.appendCountries){
                $.each(response.countries, function(i, element){
                    $('<option/>').appendTo(args.$country).val(element).text(element);
                })
            }
            if(args.appendLanguages){
                $.each(response.languages, function(i, element){
                    $('<option/>').appendTo(args.$language).val(element).text(element);
                })
            }

            if(args.appendCurrencies){
                $.each(response.currencies, function(i, element){
                    $('<option/>').appendTo(args.$currency).val(element).text(element);
                })
            }
        })

        $form.on('submit', function(e){
            $firstName = args.$firstName.val();
            $lastName = args.$lastName.val();
            $email = args.$email.val();
            $country = args.$country.val();
            $currency = args.$currency.val();
            $language = args.$language.val();
            $phone = args.$phone.val();
            $password = args.$password.val();
           $campaign = args.$campaign.val();
           $a_aid = args.$a_aid.val();
           $b_bid = args.$b_bid.val();
            self.register({
                fname: $firstName,
                lname: $lastName,
                email: $email,
                country: $country,
                language: $language,
                currency: $currency,
                country: $country,
                phone: $phone,
                password: $password,
                a_aid: $a_aid,
                b_bid: $b_bid,
                campaign_id: $campaign,
            }, args.success, args.error);

            e.preventDefault();
        });
    };

    olApi.prototype.connectLogout = function($element, callback){
        var self = this;
        $element.on('click', function(e){
            self.logout(callback);
        });
    };


    olApi.prototype.detectPlatform = function(onPageCallback, notOnPageCallback){
        if(window['optionlift_callbacks']){
            onPageCallback();
        }else{
            notOnPageCallback();
        }
    };

    olApi.prototype.getMenuLinks = function(callback){
        var self = this;
        var add = '';
        // if(!window['optionlift_callbacks']){
        //     add = self.tpUrl;
        // }
         add = self.tpUrl;
        var links = {
            'tp' : self.tpUrl,
            'deposit' : add + '#!/account/deposit/',
            'account' : add + '#!/account/editProfile/'
        };
        callback(links);
    };

    olApi.prototype.login = function (email, password, successCallback, errorCallback){
        var self = this;

        $.ajax({
            method: "POST",
            data: {email: email, password: password},
            url: self.apiUrl + 'auth',
            xhrFields: {
                withCredentials: true
            }
        }).done(function(response) {
        
            if(response && response.token){
                localStorage.setItem('id_token', JSON.stringify(response.token));
            }
    
            successCallback(response);
        }).error(function(response) {
            errorCallback(response);
        });

    };

    olApi.prototype.register = function (data, successCallback, errorCallback){
        var self = this;

        $.ajax({
            method: "POST",
            data: data,
            url: self.apiUrl + 'peoples',
            xhrFields: {
                withCredentials: true
            }
        }).done(function(response) {
           
            self.login(data.email, data.password, function(){},function(){})
            successCallback(response);
        }).error(function(response) {
            errorCallback(response);
        });

    };

    olApi.prototype.logout = function (callback){
        var self = this;

        $.ajax({
            method: "POST",
            url: self.apiUrl + 'logout',
            xhrFields: {
                withCredentials: true
            }
        }).always(function(response) {
            localStorage.setItem('id_token', '-');
            callback(response);
        });

    };

    olApi.prototype.user = function (successCallback, errorCallback){
        var self = this;
        $.ajax({
            url: self.apiUrl + 'user?token='+localStorage.getItem('id_token'),
            xhrFields: {
                withCredentials: true
            }
        }).done(function(response) {
 
            successCallback(response.user);
        }).error(function(response) {
            
            errorCallback(response);
        });
    };
})(jQuery);

