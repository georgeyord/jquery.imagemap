<?php
/**
 * JS FILES PRODUCER
 */

$debug = true;
$j14 = false;
?>
<script language="javascript">
/**
 * ImageMap class adds elements (images) to the appropriate positions on the target element and
 * executes some effect (default: animated resize when the mouse passes over (or click or any other event set) these elements
 *
 * -- USAGE --
$('#example1').imageMap(
{
    elements: [
        {
            image: "image1.png",
            link: "image1.htm",
            position: { top: 20,  left: 30 },
            size: { width: 50,  height: 100 },
            effect: { resize: { factor: 40 } }
        }
    ]
});
 **/
(function($) {
    // Defaults settings - do not edit
    var defaultOptions = {
        effect: {
            resize: {
                active: true, // By default resize animation will be active
                factor: 30 // Default value in percentage
            },
            style: {
                active: false, // By default css styling will be inactive
                css: {
                    borderRadius: '1000px',
                    '-webkit-box-shadow': '0px 0px 15px 5px rgba(255, 255, 190, .75)',
                    '-moz-box-shadow': '0px 0px 15px 5px rgba(255, 255, 190, .75)',
                    boxShadow: '0px 0px 15px 5px rgba(255, 255, 190, .75)',
                    boxSizing: "border-box"
                }
            }
        },
        event: {
            on: 'mouseenter',
            off: 'mouseout',
            duration: 500
        },
        preloadImages: true,
<?php if($debug): ?>
        debug: false,
<?php endif; ?>
        elements: {},
        zIndex: 'auto',

        /*** Class Names ***/
        mainPrefix: 'imageMap-',
        containerClass: 'container',
        imageClass: 'image',
        additionalImageClass: ''
    };
    var _options;

    $.fn.imageMap = function(customOptions) {
        _options = $.extend({}, defaultOptions, customOptions);
        var $this = $(this);

        if(_options.elements.length > 0) {
            // Initialize container element
            var oContainer = $("<div></div>")
            .css({
                position: 'relative'
            })
            .addClass(_options.mainPrefix+_options.containerClass);
<?php if($debug): ?>
            if(_options.debug){
                oContainer.css({
                    border: 'blue 1px dashed'
                });
                console.log('Target element created successfully');
            }
<?php endif; ?>

            // Preload images
            if(_options.preloadImages) {
<?php if($debug): ?>
                if(_options.debug)
                    console.log('Images preloading was activated');
<?php endif; ?>
                $.each(_options.elements,function(index,imageConfig){
                    $('<img/>')[0].src = imageConfig.image;
                    // Alternatively way:
                    (new Image()).src = imageConfig.image;
                });
            }

            // Create the image elements with the appropriate positions,
            // append them to container element
            $.each(_options.elements,function(index,imageConfig){
                if(typeof imageConfig.image != 'undefined' && typeof imageConfig.position != 'undefined' && typeof imageConfig.position.top != 'undefined' && typeof imageConfig.position.left != 'undefined'){

                    var oImage = $("<image></image>");
                    oImage.css({
                        display: 'block',
                        position: 'absolute',
                        top: imageConfig.position.top,
                        left: imageConfig.position.left
                    })
                    .data('config',imageConfig)
                    .attr('src','./'+imageConfig.image)
                    .addClass(_options.mainPrefix+_options.imageClass);
<?php if($debug): ?>
                    if(_options.debug)
                        oImage.css({
                            border: 'red 1px dashed'
                        });
<?php endif; ?>
                    if(typeof imageConfig.size != 'undefined'){
                        if(typeof imageConfig.size.width != 'undefined')
                            oImage.css({
                                width: imageConfig.size.width
                            });
                        else
                            oImage.css({
                                width: 'auto'
                            });
                        if(typeof imageConfig.size.height != 'undefined')
                            oImage.css({
                                height: imageConfig.size.height
                            });
                        else
                            oImage.css({
                                height: 'auto'
                            });
                    } else {
                        oImage.css({
                            height: 'auto',
                            width: 'auto'
                        });
                    }
                    if(typeof imageConfig.zIndex != 'undefined')
                        oImage.css({
                            zIndex: imageConfig.zIndex
                        });

                    var oElement = (typeof imageConfig.link != 'undefined')?$("<a></a>"):$("<div></div>");
                    oElement.css({
                        outline: 'none'
                    })
                    .attr('href',imageConfig.link)
                    .append(oImage);
                    oContainer.append(oElement);

                    // Bind the effect
                    var effect = false;
                    if(typeof imageConfig.effect == 'undefined')
                        imageConfig.effect = _options.effect; // Use default config as a fallback
                    if(typeof imageConfig.effect.resize != 'undefined'
                        && ((typeof imageConfig.effect.resize.active == 'undefined' && _options.effect.resize.active === true)
                            || (typeof imageConfig.effect.resize.active != 'undefined' && imageConfig.effect.resize.active=== true)
                            )) {
                        oElement.<?php echo $j14?'bind':'on'; ?>(_options.event.on,function(e) {
                            effect = 'resize';
                            e.preventDefault();
<?php if($debug): ?>
                            if(_options.debug)
                                console.log('Event triggered: '+_options.event.on+' - effect: '+effect);
<?php endif; ?>
                            var link = $(this);
                            var image = link.children('.'+_options.mainPrefix+_options.imageClass);
                            var imageStyle = {
                                zIndex: image.css('z-index')
                            };

                            // Prepare image element and animate
                            image.css({
                                zIndex:_options.zIndex
                            }).stop(false/*clearQueue*/,true/*jumpToEnd*/);
                            if(typeof imageConfig.effect.resize == 'undefined')
                                imageConfig.effect.resize = _options.effect.resize; // Use default config as a fallback
                            if(typeof imageConfig.effect.resize.factor == 'undefined' && typeof imageConfig.effect.resize.width == 'undefined')
                                imageConfig.effect.resize.factor = _options.effect.resize.factor; // Use default config as a fallback
                            if(typeof imageConfig.effect.resize.factor != 'undefined'){
                                var widthChange = parseInt(imageConfig.size.width*imageConfig.effect.resize.factor/100);
                                var heightChange = parseInt(imageConfig.size.height*imageConfig.effect.resize.factor/100);

                                var animation = {
                                    top: '-=' + parseInt(heightChange/2),
                                    left: '-=' + parseInt(widthChange/2),
                                    width: imageConfig.size.width + widthChange,
                                    height: imageConfig.size.height + heightChange
                                };
                            } else if(typeof imageConfig.effect.resize.width != 'undefined') {
                                var width = imageConfig.effect.resize.width;
                                var height = parseInt(imageConfig.size.height*(width/imageConfig.size.width));
                                var left = parseInt(width-imageConfig.size.width)/2;
                                var top = parseInt(height-imageConfig.size.height)/2;
                                var animation = {
                                    top: '-=' + top,
                                    left: '-=' + left,
                                    width: width,
                                    height: height
                                };
                            }
<?php if($debug): ?>
                            if(_options.debug)
                                console.log('Resize config: ',imageConfig.effect.resize," - Animation: ", animation);
<?php endif; ?>
                            image.animate(animation,_options.event.duration);

                            // Bind reverse event
                            link.<?php echo $j14?'bind':'on'; ?>(_options.event.off,function(){
<?php if($debug): ?>
                                if(_options.debug)
                                    console.log('Event triggered: '+_options.event.off+' - effect: '+effect);
<?php endif; ?>

                                // Reverse animate
                                var animation = {
                                    top: imageConfig.position.top,
                                    left: imageConfig.position.left,
                                    width: imageConfig.size.width,
                                    height: imageConfig.size.height
                                };
                                $(this).children('.'+_options.mainPrefix+_options.imageClass)
                                .css(imageStyle)
                                .stop(false/*clearQueue*/,false/*jumpToEnd*/)
                                .animate(animation,_options.event.duration)
                                .<?php echo $j14?'unbind':'off'; ?>(_options.event.off);
                            });
                        });
                    }

                    if(typeof imageConfig.effect.style != 'undefined'
                        && ((typeof imageConfig.effect.style.active == 'undefined' && _options.effect.style.active === true)
                            || (typeof imageConfig.effect.style.active != 'undefined' && imageConfig.effect.style.active=== true)
                            )) {
                        oElement.<?php echo $j14?'bind':'on'; ?>(_options.event.on,function(e) {
                            effect = 'styling';
                            e.preventDefault();
<?php if($debug): ?>
                            if(_options.debug)
                                console.log('Event triggered: '+_options.event.on+' - effect: '+effect);
<?php endif; ?>

                            var link = $(this);
                            var image = link.children('.'+_options.mainPrefix+_options.imageClass);

                            if(typeof imageConfig.effect.style.css == 'undefined')
                                imageConfig.effect.style.css = _options.effect.style.css; // Use default config as a fallback
                            var imageStyle = {};
                            $.each(imageConfig.effect.style.css,function(index, value){
                                imageStyle[index] = image.css(index);
                            });
                            image.css(imageConfig.effect.style.css);

                            // Bind reverse event
                            link.<?php echo $j14?'bind':'on'; ?>(_options.event.off,function(){
<?php if($debug): ?>
                                if(_options.debug)
                                    console.log('Event triggered: '+_options.event.off+' - effect: '+effect+' - style: ',imageStyle);
<?php endif; ?>

                                // Reverse styling
                                $(this).children('.'+_options.mainPrefix+_options.imageClass)
                                .css(imageStyle)
                                .<?php echo $j14?'unbind':'off'; ?>(_options.event.off);
                            });
                        });
                    }
                    if(typeof _options.effect == 'function') {
                        effect = 'function';
<?php if($debug): ?>
                        if(_options.debug)
                            console.log('Callback function was binded.');
<?php endif; ?>
                        oElement.<?php echo $j14?'bind':'on'; ?>(_options.event.on, _options.effect);
                    }
<?php if($debug): ?>
                    if(effect == false && _options.debug)
                        console.log('Effect is inactive ('+_options.effect+').');
<?php endif; ?>
                }
<?php if($debug): ?>
                else if(_options.debug)
                    console.log('Element\'s '+index+' top and left position, image is not defined.');
<?php endif; ?>
            });
<?php if($debug): ?>
            if(_options.debug)
                console.log('Image elements created successfully');
<?php endif; ?>

            $this.prepend(oContainer);
        } else {
            alert('ImageMap was not initialized because no elements were set.');
        }
        return $this.each(function() {});
    };
})(jQuery);
</script>