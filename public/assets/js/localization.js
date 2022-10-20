var localizeKey = {
    en : {
        request : "Request an Appointment",
        home : "Home",
        services : "Services",
        blog : "Blog",
        about :"About",
        contact :"Contact",
        manage :"Manage",
    },

    pa : {
        request : "د ملاقات غوِشتنه",
        home : "کور",
        services : "خدمات",
        blog : "مقالی",
        about :"زموژ په اره",
        contact :"اریکی",
        manage :"مدیریت",
    },

    dr : {
        request : "درخواست اوقات ملاقات",
        home : "خانه",
        services : "خدمات",
        blog : "مقالات",
        about :"درباره ما",
        contact :"تماس",
        manage :"مدیریت",
    }
};


function localizeSite(value){
    localStorage.setItem('lang',value);
    $(".localize").each(function(){
        let currentKeys = $(this).attr("key");
        let localizationKeys = localizeKey[value][currentKeys];
        $(this).text(localizationKeys);
    });
}

var lang = localStorage.getItem('lang');
if(!lang){
    lang = "en";
}
localizeSite(lang);
