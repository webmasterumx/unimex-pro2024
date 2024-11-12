// =================================================================================================
// BROWSER SCRIPT DEFINITION
// =================================================================================================
browser = {
    width: function () {
        return (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);
    },
    gotoURL: function (location, blank) {

        if (blank) {
            window.open(location, '_blank');
        } else {
            window.location.href = location;
        }
    }
};
// =================================================================================================
// ELEMENTS SCRIPT DEFINITION
// =================================================================================================
elements = {
    get: function (ID) {

        if ((typeof ID) === "string") {
            return document.getElementById(ID);
        }

        return ID;
    },
    exist: function (ID) {

        var element = this.get(ID);

        if (element !== undefined && element !== null) {
            return true;
        }

        return false;

    },
    fill: function (ID, content) {

        var element = this.get(ID);

        if (this.exist(element)) {
            element.innerHTML = content;
        }


    },
    setStyle: function (ID, style, value) {

        var element = this.get(ID);

        if (this.exist(element)) {

            element = element.style;

            switch (style) {
                case 'backgroundImage':
                    element.backgroundImage = "url('" + value + "')";
                    break;

            }

        }

    },
    checkClick: function (obj, container) {

        if ((!container.is(obj.target) && container.has(obj.target).length === 0)) {

            return true;
        }

    }
};
// =================================================================================================
// NAVIGATION SCRIPT DEFINITION
// =================================================================================================
nav = {
    id: "navigation",
    show: function () {
        console.log('abre nav');
        nav.reset();
        subnav.reset();
        $("#" + this.id).animate({ right: '0' }, { duration: 500, easing: "swing" });
    },
    hide: function () {

        var id = "#" + this.id;
        var move = $(id).outerWidth() + 'px';

        $(id).animate({ right: '-' + move }, { duration: 500, easing: "swing", complete: nav.reset });

    },
    reset: function () {
        $("#" + nav.id).removeAttr("style");
    },
    normalize: function () {
        var width = browser.width();

        if (width > 1024) {
            $("#" + nav.id).removeAttr("style");
        }
    }
};

window.addEventListener("resize", nav.normalize);
// =================================================================================================
// SUB NAVIGATION SCRIPT DEFINITION
// =================================================================================================
subnav = {
    current: undefined,
    show: function (selected) {

        var current = this.current;
        var width = browser.width();

        enrollmentbox.hide();
        loginbox.hide();

        if (width > 1024) {

            if (selected === current) {
                $("#" + selected).slideToggle();

                return;
            }

            $("#" + current).slideUp();
            $("#" + selected).slideDown();

        } else {

            $("#" + selected).animate({ right: '0' }, { duration: 500, easing: "swing" });

        }

        this.current = selected;

    },
    hide: function (selected) {

        var id = "#" + selected;
        var move = $(id).outerWidth() + 'px';

        this.current = selected;

        $(id).animate({ right: '-' + move }, { duration: 500, easing: "swing", complete: subnav.reset });

    },
    hideAll: function () {

        var width = browser.width();

        if (width > 1024) {

            $(".subnav").slideUp();
            this.current = undefined;
        }

    },
    reset: function () {
        $(".subnav").removeAttr("style");
        subnav.current = undefined;
    },
    normalize: function () {
        var width = browser.width();

        if (width > 1024) {
            $(".subnav").removeAttr("style");
            $('.subnav ul').removeAttr("style");
        }
    },
    list: {
        current: undefined,
        toggle: function (selected) {

            var width = browser.width();

            if (width <= 1024) {

                if (this.current !== selected) {
                    $('#' + this.current).next().slideUp();
                    this.current = selected;
                }

                $('#' + selected).next().slideToggle();

            }

        }

    }
};

window.addEventListener("resize", subnav.normalize);


$(document).click(function (e) {

    if (elements.checkClick(e, $(".navigation .menu a")) && elements.checkClick(e, $(".subnav"))) {

        if (subnav.current !== undefined) {
            subnav.hideAll();
        }

    }


});
// =================================================================================================
// ENROLLMENT SCRIPT DEFINITION
// =================================================================================================
enrollmentbox = {
    id: "enrollmentbox",
    overlay: false,
    toggle: function () {

        var width = browser.width();

        if (width > 1024) {

            subnav.hideAll();
            loginbox.hide();

            $("#" + this.id).slideToggle();

        } else {

            overlay.toggle(this.id);
            this.overlay = true;

            $("#" + this.id).fadeToggle();

        }

    },
    hide: function () {

        var width = browser.width();

        if (width > 1024) {

            $("#" + this.id).slideUp();

        } else {

            $("#" + this.id).fadeOut();

        }

    }
};


$(document).click(function (e) {

    if (elements.checkClick(e, $(".navigation .menu a")) && elements.checkClick(e, $("#" + enrollmentbox.id))) {

        var width = browser.width();

        if (width > 1024) {
            enrollmentbox.hide();
        }

    }

});

// =================================================================================================
// LOGINBOX SCRIPT DEFINITION
// =================================================================================================
loginbox = {
    id: "loginbox",
    toggle: function () {
        subnav.hideAll();
        enrollmentbox.hide();

        $('#' + this.id).slideToggle();
    },
    hide: function () {
        $('#' + this.id).slideUp();
    }
};

$(document).click(function (e) {

    if (elements.checkClick(e, $(".tools a")) && elements.checkClick(e, $("#" + loginbox.id))) {

        loginbox.hide();

    }

});
// =================================================================================================
// MODALBOX SCRIPT DEFINITION
// =================================================================================================
modalbox = {
    toggle: function (selected) {

        if (selected !== undefined) {

            var top = $(document).scrollTop() + 30 + "px";

            subnav.hideAll();
            loginbox.hide();
            enrollmentbox.hide();

            overlay.toggle(selected);

            $("#" + selected).css({ "top": top });
            $("#" + selected).fadeToggle();

        }

    }
};
// =================================================================================================
// OVERLAY SCRIPT DEFINITION
// =================================================================================================
overlay = {
    id: "overlay",
    toggle: function (selected) {

        var action = "";

        if (elements.exist(this.id)) {
            $("#" + this.id).remove();
        } else {

            if (selected !== "enrollmentbox") {
                action = 'onclick="modalbox.toggle(\'' + selected + '\')"';
            }

            $("#" + selected).before('<div class="overlay" id="' + this.id + '" ' + action + '></div>');
        }

    },
    detroy: function () {

        var width = browser.width();

        if (width > 1024 && enrollmentbox.overlay === true) {
            $("#" + overlay.id).remove();
            enrollmentbox.overlay = false;
        }

    }
};

nav1 = {
    id: "navigation",
    show: function () {
        console.log('abre nav');
        nav.reset();
        subnav1.reset();
        $("#" + this.id).animate({ right: '0' }, { duration: 500, easing: "swing" });
    },
    hide: function () {

        var id = "#" + this.id;
        var move = $(id).outerWidth() + 'px';

        $(id).animate({ right: '-' + move }, { duration: 500, easing: "swing", complete: nav.reset });

    },
    reset: function () {
        $("#" + nav.id).removeAttr("style");
    },
    normalize: function () {
        var width = browser.width();

        if (width > 1024) {
            $("#" + nav.id).removeAttr("style");
        }
    }
};

window.addEventListener("resize", nav.normalize);
// =================================================================================================
// SUB NAVIGATION SCRIPT DEFINITION
// =================================================================================================
subnav1 = {
    current: undefined,
    show: function (selected) {

        var current = this.current;
        var width = browser.width();

        enrollmentbox.hide();
        loginbox.hide();

        if (width > 1024) {

            if (selected === current) {
                $("#" + selected).slideToggle();

                return;
            }

            $("#" + current).slideUp();
            $("#" + selected).slideDown();

        } else {

            $("#" + selected).animate({ right: '0' }, { duration: 500, easing: "swing" });

        }

        this.current = selected;

    },
    hide: function (selected) {

        var id = "#" + selected;
        var move = $(id).outerWidth() + 'px';

        this.current = selected;

        $(id).animate({ right: '-' + move }, { duration: 500, easing: "swing", complete: subnav.reset });

    },
    hideAll: function () {

        var width = browser.width();

        if (width > 1024) {

            $(".subnav").slideUp();
            this.current = undefined;
        }

    },
    reset: function () {
        $(".subnav").removeAttr("style");
        subnav.current = undefined;
    },
    normalize: function () {
        var width = browser.width();

        if (width > 1024) {
            $(".subnav").removeAttr("style");
            $('.subnav ul').removeAttr("style");
        }
    },
    list: {
        current: undefined,
        toggle: function (selected) {

            var width = browser.width();

            if (width <= 1024) {

                if (this.current !== selected) {
                    $('#' + this.current).next().slideUp();
                    this.current = selected;
                }

                $('#' + selected).next().slideToggle();

            }

        }

    }
};


window.addEventListener("resize", overlay.detroy);
// =================================================================================================
// SLIDER SCRIPT DEFINITION
// =================================================================================================
slider = {
    id: undefined,
    vars: {},
    slides: [],
    init: function (start) {

        if (this.id !== undefined && this.slides.length > 0) {

            if (start === undefined) {
                start = 0;
            }

            slider.vars[this.id] = {};
            slider.slide.set(start, "none");
        }
    },
    slide: {
        previous: undefined,
        current: undefined,
        next: undefined,
        destroyID: undefined,
        set: function (selected, direction) {

            var sliderID = slider.id;

            if (selected !== this.current) {

                this.destroyID = this.visible();
                var current = this.current = this.valid(selected);

                if (current !== undefined) {

                    var slideID = sliderID + "-slide-" + current;
                    var captionID = sliderID + "-caption-" + current;
                    var navigationID = sliderID + "-navigation-" + current;
                    var loaderID = sliderID + "-loader-" + current;
                    var imageID = sliderID + "-image-" + current;
                    var imageName = slider.slides[current].img;
                    var captionText = slider.slides[current].caption;
                    this.previous = this.valid(current - 1);
                    this.next = this.valid(current + 1);

                    if (imageName !== undefined) {

                        if (direction === undefined) {
                            direction = "none";
                        }

                        slider.image.render(imageID, imageName, true, true);
                        slider.slide.render(slideID, captionID, navigationID, loaderID, imageName);
                        slider.caption.render(captionID, captionText);
                        slider.navigation.render(navigationID);
                        slider.slide.animate(slideID, direction);
                    }

                }

            }

        },
        render: function (slideID, captionID, navigationID, loaderID, image) {

            var sliderID = slider.id;
            var path = slider.image.path + image;
            var slide = document.createElement("div");
            var loader = '<div class="loader" id="' + loaderID + '"></div>';
            var caption = '<div class="caption" id="' + captionID + '"></div>';
            var navigation = '<div class="navigator" id="' + navigationID + '"></div>';
            var wrapper = '<div class="wrapper">' + caption + navigation + '</div>';

            slider.vars[sliderID].loaderID = loaderID;

            slide.setAttribute("id", slideID);
            slide.setAttribute("class", "slide");
            elements.get(sliderID).appendChild(slide);
            elements.fill(slideID, wrapper + loader);
            elements.setStyle(slideID, "backgroundImage", path);

        },
        animate: function (id, direction) {

            var move = browser.width() + "px";
            var incoming = "#" + id;

            switch (direction) {
                case "none":
                    $(incoming).css({ "opacity": "0" });
                    $(incoming).animate({ opacity: "1" }, 1000, this.destroy);
                    break;
                case "left":
                    $(incoming).css({ "left": "auto", "right": "-" + move });
                    $(incoming).animate({ right: '0' }, 1000, this.destroy);
                    break;
                case "right":
                    $(incoming).css({ "left": "-" + move, "right": "auto" });
                    $(incoming).animate({ left: '0' }, 1000, this.destroy);
                    break;
            }

        },
        visible: function () {

            var sliderID = elements.get(slider.id);

            if (sliderID.childNodes.length > 0) {
                return sliderID.firstChild.id;
            } else {
                return undefined;
            }

        },
        valid: function (key) {

            if (slider.slides[key] !== undefined) {
                return key;
            } else {
                return undefined;
            }

        },
        destroy: function () {

            var sliderID = slider.id;
            var destroyID = slider.slide.destroyID;

            if (destroyID !== undefined) {
                var parent = elements.get(sliderID);
                var child = elements.get(destroyID);

                if (elements.exist(child)) {
                    parent.removeChild(child);
                }

            }

        }
    },
    image: {
        path: undefined,
        render: function (id, name, hideLoader, loadQueue) {

            var imgboxID = id + '-box';

            if (this.path !== undefined && elements.exist(imgboxID) === false && elements.exist(id) === false) {

                var imgbox = document.createElement("div");
                var imgSrc = this.path + name;
                var imgEvents = 'slider.image.destroy(\'' + imgboxID + '\',' + loadQueue + ');' + ((hideLoader === true) ? 'slider.hideLoader();' : '');
                var imgTag = '<img src="' + imgSrc + '" id="' + id + '" onload="' + imgEvents + '">';

                imgbox.setAttribute("id", imgboxID);
                imgbox.setAttribute("class", "hidden");
                document.body.appendChild(imgbox);
                elements.fill(imgboxID, imgTag);
            }

        },
        destroy: function (id, queue) {

            var child = elements.get(id);

            if (queue) {
                slider.image.queue(slider.slide.previous, "previous");
                slider.image.queue(slider.slide.next, "next");
            }

            if (elements.exist(child)) {
                document.body.removeChild(child);
            }

        },
        queue: function (slide, direction) {

            var slides = slider.slides;
            var imageID = "queue-image-";
            var imageName;

            if (direction === "previous" && slide === undefined) {
                slide = (slides.length - 1);
            }

            if (direction === "next" && slide === undefined) {
                slide = 0;
            }

            imageID += slide;
            imageName = slider.slides[slide].img;

            if (elements.exist(imageID) === false) {
                slider.image.render(imageID, imageName, false, false);
            }

        }
    },
    caption: {
        render: function (id, caption) {

            var content = '';
            var i = 0;

            for (i; i < caption.length; i++) {
                content += caption[i];
            }

            if (elements.exist(id)) {
                elements.fill(id, content);
            }

        }
    },
    navigation: {
        render: function (id) {

            var slides = slider.slides;
            var previousSlide = slider.slide.previous;
            var nextSlide = slider.slide.next;
            var content = '';

            if (previousSlide === undefined) {
                previousSlide = (slides.length - 1);
            }

            content += '<a class="previous" onclick="slider.slide.set(' + previousSlide + ',\'left\')"></a>';

            content += '<ul class="indicator">';

            for (i = 0; i < slides.length; i++) {

                if (slider.slide.current === i) {
                    content += '<li class="selected"></li>';
                } else {
                    content += '<li onclick="slider.slide.set(' + i + ',\'none\')"></li>';
                }

            }

            content += '</ul>';

            if (nextSlide === undefined) {
                nextSlide = 0;
            }

            content += '<a class="next" onclick="slider.slide.set(' + nextSlide + ',\'right\')"></a>';

            if (elements.exist(id)) {
                elements.fill(id, content);
            }

        }
    },
    hideLoader: function () {

        var sliderID = slider.id;
        var loaderID = slider.vars[sliderID].loaderID;

        $("#" + loaderID).fadeOut(1000);
    }
};
// =================================================================================================
// TESTIMONIALS SCRIPT DEFINITION
// =================================================================================================
testimonials = {
    current: "testimonial1",
    show: function (selected) {

        $("#" + selected).show();
        $("#" + this.current).hide();
        this.current = selected;

    }
};
// =================================================================================================
//  ESTIMATE FEE SCRIPT DEFINITION
// =================================================================================================
estimateFee = {
    current: "step1",
    step: function (selected) {

        var tab = '#' + selected + '-tab';
        $('.step-tabs ul li').removeAttr('class');
        $(tab).addClass('selected');

        if (selected === 'step4') {
            $(tab).next().addClass('selected-penultimate');
        } else {
            $(tab).next().addClass('selected-next');
        }

        $("#" + selected).show();
        $("#" + this.current).hide();
        this.current = selected;

    },
    check: function (selected) {

        if (selected.search('Location') > 1) {
            $('.school-location .item-checked').removeClass('d-block');
        }

        if (selected.search('Level') > 1) {
            $('.school-level .item-checked').removeClass('d-block');
        }

        $("#" + selected + ' .item-checked').addClass('d-block');

    }
};
// =================================================================================================
// CARD CAROUSEL SCRIPT DEFINITION
// =================================================================================================
cardCarousel = {
    id: {},
    set: function (selected) {

        var windowWidth = browser.width();
        var carouselID = "#" + selected;
        var wrapperWidth = 0;
        var listWidth = 0;
        var itemWidth = 0;
        var itemCount = 0;
        var displayItems = 0;
        var applyStyle = true;
        var defaultwrapper = true;

        if (elements.exist(selected)) {

            if (cardCarousel.id[selected] === undefined) {

                cardCarousel.id[selected] = {
                    scrolling: 0,
                    left: 0,
                    overflow: 0
                };

            }

            $(carouselID + " .wrapper > ul > li").each(function () {
                itemCount++;
                itemWidth = $(this).outerWidth(true);
            });

            switch (selected) {
                case "hsCarousel":

                    displayItems = 3;
                    defaultwrapper = false;

                    if (windowWidth < 1660) {

                        defaultwrapper = true;

                        if (windowWidth < 1200) {
                            displayItems = 2;
                        }

                    } else {
                        applyStyle = false;
                    }

                    break;
                case "bdCarousel":

                    displayItems = 5;

                    if (windowWidth < 1660) {
                        displayItems = 4;
                    }

                    if (windowWidth < 1400) {
                        displayItems = 3;
                    }

                    break;
                case "mdCarousel1":

                    if (windowWidth > 1024) {
                        applyStyle = false;
                    }

                    break;
                case "mdCarousel2":

                    displayItems = 3;
                    applyStyle = false;

                    if (windowWidth < 1660) {
                        applyStyle = true;
                    }

                    break;
            }

            if (windowWidth < 1024) {
                displayItems = 2;
            }

            if (windowWidth < 760) {
                displayItems = 1;
            }


            if (defaultwrapper) {
                wrapperWidth = itemWidth * displayItems;
                listWidth = Math.ceil(itemCount / displayItems) * wrapperWidth;
            } else {
                wrapperWidth = $(carouselID + " .wrapper").outerWidth();
                listWidth = $(carouselID + " .wrapper > ul").outerWidth();
            }

            cardCarousel.id[selected].scrolling = wrapperWidth;
            cardCarousel.id[selected].left = 0;
            cardCarousel.id[selected].overflow = listWidth - wrapperWidth;

            if (applyStyle) {
                $(carouselID + " .wrapper").outerWidth(wrapperWidth);
                $(carouselID + " .wrapper > ul").outerWidth(listWidth);
                $(carouselID + " .wrapper > ul").css("left", 0);
            } else {
                $(carouselID + " .wrapper").removeAttr("style");
                $(carouselID + " .wrapper > ul").removeAttr("style");
            }

        }

    },
    move: function (direction, selected) {

        if (elements.exist(selected) && cardCarousel.id[selected] !== undefined) {

            var carouselID = "#" + selected;
            var left = cardCarousel.id[selected].left;
            var scrolling = cardCarousel.id[selected].scrolling;
            var overflow = cardCarousel.id[selected].overflow;
            var move = left + scrolling;

            if (direction === "forward" && overflow >= (move)) {

                $(carouselID + " .wrapper > ul").animate(
                    { left: - (move) },
                    { duration: 900, easing: "swing" }
                );

                cardCarousel.id[selected].left += scrolling;

            }

            move = left - scrolling;

            if (direction === "back" && (overflow >= (move) && (move) >= 0)) {

                $(carouselID + " .wrapper > ul").animate(
                    { left: - (move) },
                    { duration: 900, easing: "swing" }
                );

                cardCarousel.id[selected].left -= scrolling;
            }

        }

    }
};

// =================================================================================================
// ACADEMIC OFFER SCRIPT DEFINITION
// =================================================================================================
requirement = {
    current: 'requirement1',
    show: function (selected) {

        var current = this.current;

        if (selected !== current) {

            $("#" + current + "Ind").removeClass('selected');
            $("#" + selected + "Ind").addClass('selected');

            $("#" + selected).show();
            $("#" + current).hide();

            this.current = selected;

        }

    }
};

workFieldCarousel = {
    id: 'workFieldCarousel',
    set: function () {
        var windowWidth = browser.width();
        var carouselID = "#" + workFieldCarousel.id;
        var carouselWidth = Math.floor(($(carouselID).outerWidth(true)));
        var wrapperWidth = 0;
        var navWidth = 60;
        var listWidth = 0;
        var itemWidth = 0;
        var itemCount = 0;
        var displayItems = 4;

        $(carouselID + " .wrapper > ul > li").each(function () {
            itemCount++;
        });

        if (windowWidth < 1450) {
            displayItems = 3;
        }

        if (windowWidth < 700) {
            displayItems = 1;
        }

        if (itemCount > displayItems) {

            wrapperWidth = Math.floor(carouselWidth - navWidth);
            itemWidth = Math.floor(wrapperWidth / displayItems);
            listWidth = Math.ceil(itemCount / displayItems) * wrapperWidth;

            workFieldCarousel.scrolling = wrapperWidth;
            workFieldCarousel.left = 0;
            workFieldCarousel.overflow = listWidth - wrapperWidth;

            $(carouselID + " .wrapper").show();
            $(carouselID + " .move-prev").show();
            $(carouselID + " .move-next").show();
            $(carouselID + " .wrapper").outerWidth(wrapperWidth);
            $(carouselID + " .wrapper > ul").css({ "position": "relative", "display": "block", "left": 0 });
            $(carouselID + " .wrapper > ul").outerWidth(listWidth);
            $(carouselID + " .wrapper > ul > li").outerWidth(itemWidth);
            $(carouselID + " .wrapper > ul > li").css("float", "left");

        } else {

            $(carouselID + " .move-prev").hide();
            $(carouselID + " .move-next").hide();
            $(carouselID + " .wrapper").removeAttr("style");
            $(carouselID + " .wrapper > ul").removeAttr("style");
            $(carouselID + " .wrapper > ul > li").removeAttr("style");
        }

    },
    move: function (direction) {

        var carouselID = "#" + workFieldCarousel.id;
        var left = workFieldCarousel.left;
        var scrolling = workFieldCarousel.scrolling;
        var overflow = workFieldCarousel.overflow;
        var move = left + scrolling;

        if (direction === "forward" && overflow >= (move)) {

            console.log("forward");

            $(carouselID + " .wrapper > ul").animate(
                { left: - (move) },
                { duration: 600, easing: "swing" }
            );

            workFieldCarousel.left += scrolling;

        }

        move = left - scrolling;

        if (direction === "back" && (overflow >= (move) && (move) >= 0)) {

            console.log("back");

            $(carouselID + " .wrapper > ul").animate(
                { left: - (move) },
                { duration: 600, easing: "swing" }
            );

            workFieldCarousel.left -= scrolling;
        }

    }
};

// =================================================================================================
// JOBS SCRIPT DEFINITION
// =================================================================================================
jobs = {
    close: function () {
        $("#jobs").slideUp();
    }
};
// =================================================================================================
// BLOG SCRIPT DEFINITION
// =================================================================================================
blog = {
    category: {
        id: 'blogCategory',
        toggle: function () {
            var width = browser.width();

            if (width < 1300) {
                $("#" + blog.category.id + " ul").slideToggle();
            }
        },
        normalize: function () {
            var width = browser.width();

            if (width > 1300) {
                $("#" + blog.category.id + " ul").removeAttr("style");
            }
        }
    }
};

window.addEventListener("resize", blog.category.normalize);
// =================================================================================================
// TEST SCRIPT DEFINITION
// =================================================================================================
test = {
    id: "#testBtn",
    hidden: true,
    toggle: function () {

        if (this.hidden) {
            $(test.id).animate({ right: '0' }, { duration: 150, easing: "swing" });
            this.hidden = false;
        } else {
            $(test.id).animate({ right: '-110px' }, { duration: 100, easing: "swing" });
            this.hidden = true;
        }

    }
};
// =================================================================================================
// SCHOOL SCRIPT DEFINITION
// =================================================================================================
campusCarousel = {
    id: 'campusCarousel',
    scrolling: 0,
    left: 0,
    overflow: 0,
    set: function () {

        var windowWidth = browser.width();
        var carouselID = "#" + campusCarousel.id;
        var listWidth = 0;
        var itemWidth = 0;
        var itemCount = 0;
        var run = true;

        if (windowWidth > 700) {
            run = false;
            $(carouselID).removeAttr("style");
            $(carouselID + " ul").removeAttr("style");
        }

        if (run) {

            $(carouselID + " ul li").each(function () {
                itemCount++;
                itemWidth = $(this).outerWidth(true);
            });

            listWidth = itemCount * itemWidth;
            campusCarousel.overflow = listWidth - itemWidth;
            campusCarousel.left = 0;
            campusCarousel.scrolling = itemWidth;


            $(carouselID).outerWidth(itemWidth);
            $(carouselID + " ul").outerWidth(listWidth);
            $(carouselID + " ul").css("left", 0);
        }

    },
    move: function (direction) {

        var carouselID = "#" + campusCarousel.id;
        var left = campusCarousel.left;
        var scrolling = campusCarousel.scrolling;
        var overflow = campusCarousel.overflow;
        var move = left + scrolling;


        if (direction === "forward" && overflow >= (move)) {

            $(carouselID + " ul").animate(
                { left: - (move) },
                { duration: 400, easing: "swing" }
            );

            campusCarousel.left += scrolling;

        }

        move = left - scrolling;

        if (direction === "back" && (overflow >= (move) && (move) >= 0)) {

            $(carouselID + " ul").animate(
                { left: - (move) },
                { duration: 400, easing: "swing" }
            );

            campusCarousel.left -= scrolling;
        }

    }

};  
